<?php
/*
Plugin Name: Mobile Login
Description: Allows users to log in using their mobile number.
*/

// Register the shortcode for user registration form
// Register the shortcode for user registration form
add_shortcode('user-registration', 'custom_user_registration_shortcode');
function custom_user_registration_shortcode() {
    ob_start();
    custom_registration_form();
    $form = ob_get_clean();
    return $form;
}

function custom_registration_form() {
    ?>
    <form id="registration-form" action="<?php echo esc_url(wp_registration_url()); ?>" method="post" autocomplete="off">
        <p>
            <label for="username"><?php _e('Username'); ?><br />
                <input type="text" name="username" id="username" class="input" value="<?php echo esc_attr(wp_unslash($_POST['username'] ?? '')); ?>" size="25" /></label>
        </p>
        <p>
            <label for="email"><?php _e('Email'); ?><br />
                <input type="email" name="email" id="email" class="input" value="<?php echo esc_attr(wp_unslash($_POST['email'] ?? '')); ?>" size="25" /></label>
        </p>
        <p>
            <label for="mobile_number"><?php _e('Mobile Number'); ?><br />
                <input type="tel" name="mobile_number" id="mobile_number" class="input" value="<?php echo esc_attr(wp_unslash($_POST['mobile_number'] ?? '')); ?>" size="25" /></label>
        </p>
        <?php do_action('register_form'); ?>
        <p class="submit">
            <input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="<?php esc_attr_e('Register'); ?>" />
        </p>
    </form>
    <?php
}

// Save the mobile number in user meta on registration
add_action('user_register', 'custom_registration_save', 10, 1);
function custom_registration_save($user_id) {
    if (!empty($_POST['mobile_number'])) {
        update_user_meta($user_id, 'mobile_number', sanitize_text_field($_POST['mobile_number']));
    }

    // Bypass username and email validation
    remove_action('register_new_user', 'wp_send_new_user_notifications');
    remove_action('edit_user_created_user', 'wp_send_new_user_notifications', 10, 2);
}

// Add custom registration validation
add_filter('registration_errors', 'custom_registration_validation', 10, 3);
function custom_registration_validation($errors, $sanitized_user_login, $user_email) {
    if (!empty($_POST['mobile_number']) && !preg_match('/^\+?\d{10,14}$/', $_POST['mobile_number'])) {
        $errors->add('invalid_mobile', __('Invalid mobile number'));
    }

    return $errors;
}

// Redirect to home page after registration
add_filter('registration_redirect', 'custom_registration_redirect');
function custom_registration_redirect($redirect_to) {
    return home_url(); // Redirect to the home page after registration
}

// Enable registration without username or email
add_filter('wpmu_validate_user_signup', 'custom_allow_no_username_email', 10, 4);
function custom_allow_no_username_email($result, $username, $email, $usermeta) {
    if (empty($username) && empty($email)) {
        $result['user_name'] = $username = preg_replace('/[^a-z0-9]/', '', strtolower($usermeta['mobile_number']));
        $result['user_email'] = $email = $usermeta['mobile_number'] . '@example.com';
    }

    if (!empty($result['errors']->errors['user_name']) || !empty($result['errors']->errors['user_email'])) {
        unset($result['errors']->errors['user_name']);
        unset($result['errors']->errors['user_email']);
        if (empty($result['errors']->errors)) {
            $result['user'] = array_merge($result['user'], $usermeta);
        }
    }
    return $result;
}

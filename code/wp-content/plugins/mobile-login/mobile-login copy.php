<?php
/*
Plugin Name: Mobile Login
Description: Allows users to log in using their mobile number.
*/

// Register the shortcode for user registration form
add_shortcode('user-registration', 'custom_user_registration_shortcode');
function custom_user_registration_shortcode() {
    ob_start();
    custom_registration_form();
    $form = ob_get_clean();
    return $form;
}


// Register the shortcode for user login form
add_shortcode('user-login', 'custom_user_login_shortcode');
function custom_user_login_shortcode() {
    ob_start();
    custom_login_form();
    $form = ob_get_clean();
    return $form;
}

// Hook into the login form
add_action('login_form_user-login', 'custom_login_form');

// Process the login form submission
add_filter('authenticate', 'custom_authenticate_user', 10, 3);

// Modify the login form
function custom_login_form() {
    // Add a new field for the mobile number
    ?>
    <p>
        <label for="mobile_number">Mobile Number<br />
        <input type="text" name="mobile_number" id="mobile_number" class="input" value="" size="20" /></label>
    </p>
    <p>
        <label for="user_pass">Password<br />
        <input type="password" name="pwd" id="user_pass" class="input" value="" size="20" /></label>
    </p>
    <p class="submit">
        <input type="submit" name="wp-submit" id="wp-submit" class="button button-primary" value="Log In" />
    </p>
    <?php
}

// Authenticate the user using their mobile number
function custom_authenticate_user($user, $username, $password) {
    // Check if the mobile number field is set
    if (!empty($_POST['mobile_number'])) {
        // Attempt to find the user by their mobile number
        $user_by_mobile = get_users(array(
            'meta_key' => 'mobile_number',
            'meta_value' => $_POST['mobile_number'],
            'number' => 1,
            'count_total' => false,
        ));

        // If a user is found, use their account for authentication
        if (!empty($user_by_mobile)) {
            $user = get_user_by('ID', $user_by_mobile[0]);
        }
    }

    return $user;
}

// Add a registration option for users without an account
add_action('login_form_user-login', 'custom_registration_form');

// Process the registration form submission
add_action('user_register', 'custom_register_user');


// Modify the registration form
function custom_registration_form() {
    // Add a new field for the mobile number during registration
    ?>
    <p>
        <label for="reg_mobile_number">Mobile Number<br />
        <input type="text" name="reg_mobile_number" id="reg_mobile_number" class="input" value="" size="20" /></label>
    </p>
    <p class="submit">
        <input type="submit" name="wp-submit" id="wp-submit" class="button button-primary" value="Register" />
    </p>
    <?php
}
    // Check if the mobile number field is set during registration
    if (!empty($_POST['reg_mobile_number'])) {
        // Save the mobile number as user meta
        update_user_meta($user_id, 'mobile_number', $_POST['reg_mobile_number']);
    }

    // Redirect the user to the homepage after registration
    wp_redirect(home_url());
    exit();


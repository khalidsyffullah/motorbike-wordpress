<?php
function activated_insurance_shortcode()
{
	ob_start();
    if ( is_user_logged_in() ) {
        include dirname(__FILE__) . '/../custom-templates/activated-insurance.php';
    } else {
        wp_redirect( home_url( '/login-registration/' ) );
        exit;
    }
	return ob_get_clean();
}
add_shortcode('activated_insurance', 'activated_insurance_shortcode');


add_action('wp_ajax_get_helmet_data', 'get_helmet_data');
add_action('wp_ajax_nopriv_get_helmet_data', 'get_helmet_data');

function get_helmet_data() {
    global $wpdb;

    $helmet = $_GET['helmet'];
    $data = $wpdb->get_row($wpdb->prepare("SELECT dealer_name, purchasedate, activation_code, is_verified, name FROM wp_activation_form WHERE helmet_model = %s", $helmet));

    echo json_encode($data);
    wp_die();
}

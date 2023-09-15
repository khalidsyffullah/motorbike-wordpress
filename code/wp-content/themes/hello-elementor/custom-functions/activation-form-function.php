<?php
/*
Template Name: Activation Form
*/
function activation_form_shortcode()
{

global $wpdb;
$error_message = ''; // Define the variable

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $name = $_POST['name-11'];
    $birthdate = $_POST['birthdate-11'];
    $mobile = $_POST['mob-11'];
    $email = $_POST['email-11'];
    $dealer_name = $_POST['dealer-name-11'];
    $purchasedate = $_POST['purchasedate-11'];
    $helmet_model = $_POST['helmet-11'];
    $activation_code = $_POST['activationcode-11'];

    // Check if activation code exists
    $activation_code_id = $wpdb->get_var($wpdb->prepare("SELECT id FROM wp_activation_code WHERE activation_code = %s", $activation_code));

    if ($activation_code_id) {
        // Insert form data into database
        $wpdb->insert('wp_activation_form', array(
            'name' => $name,
            'birthdate' => $birthdate,
            'mobile' => $mobile,
            'email' => $email,
            'dealer_name' => $dealer_name,
            'purchasedate' => $purchasedate,
            'helmet_model' => $helmet_model,
            'activation_code' => $activation_code,
            'activation_code_id' => $activation_code_id,
            'is_verified' => 1
        ));

        wp_redirect(home_url('/registered-insurance/?error=' . urlencode($error_message)));
        exit;
    } else {
        $error_message = "Wrong activation code!";
        echo "<h2>$error_message</h2>";
    }
}

	ob_start();
    include dirname(__FILE__) . '/../custom-templates/activation-form.php';

	// include 'activation-form.php';
	return ob_get_clean();
}
add_shortcode('activation-form', 'activation_form_shortcode');
?>


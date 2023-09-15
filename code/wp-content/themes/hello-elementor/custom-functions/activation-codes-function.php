<?php
/*
Template Name: Activation code function
*/
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
}

global $wpdb;
$activation_codes = $wpdb->get_results("SELECT * FROM wp_activation_code");

function activation_code_shortcode()
{
    ob_start();
    include dirname(__FILE__) . '/../custom-templates/activation-code.php';
    return ob_get_clean();
}
add_shortcode('activation-code', 'activation_code_shortcode');

add_action('wp_loaded', 'insert_activation_code');
function insert_activation_code()
{
    if (isset($_POST['activation_code']) && !empty($_POST['activation_code'])) {
        global $wpdb;

        $table_name = $wpdb->prefix . 'activation_code';

        $activation_code = sanitize_text_field($_POST['activation_code']);
        $existing_code =$wpdb->get_var($wpdb->prepare("SELECT activation_code FROM $table_name WHERE activation_code = %s", $activation_code));
            if($existing_code){
                $message = "<h2>tHE CODE ALREADY EXISTS</h2>";
                echo $message;

            }
        
        else{

        $wpdb->insert($table_name, array('activation_code' => $activation_code));
        $meessage =  "Activation code successfully added.";
        echo "<p>$meessage</p>";
        
    }

    }
}

add_action('admin_post_process_csv_file', 'process_csv_file');
add_action('admin_post_nopriv_process_csv_file', 'process_csv_file');
function process_csv_file($error_message)
{
	if (!current_user_can('manage_options')) {
		wp_die('You do not have permission to access this page.');
	}
	if (isset($_FILES['csv_file']) && $_FILES['csv_file']['error'] == 0) {
		$csv_file = fopen($_FILES['csv_file']['tmp_name'], 'r');
		while (($data = fgetcsv($csv_file, 1000, ',')) !== false) {
			$activation_code = $data[0];
			global $wpdb;
			$table_name = $wpdb->prefix . 'activation_code';
			$existing_code_list =[];

        $existing_code =$wpdb->get_var($wpdb->prepare("SELECT activation_code FROM $table_name WHERE activation_code = %s", $activation_code));
            if($existing_code){
                $existing_code_list == $existing_code;
				echo "<h2> $existing_code_list is already exist ";

            }
			else{
			$wpdb->insert($table_name, array('activation_code' => $activation_code));
		}
		}
		fclose($csv_file);
		wp_redirect($_SERVER['HTTP_REFERER']);
		exit;
	} else {
		$error_message =  "<h2> no file selected for upload. Please try again ";
        wp_redirect(home_url('/activation-codes/'));
		return $error_message;

	}
}

add_action('activation_codes_page_content', 'display_activation_codes');
?>
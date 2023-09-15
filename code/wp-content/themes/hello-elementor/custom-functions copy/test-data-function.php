<?php
/**
 * Custom function for form data upload in WordPress.
 * This function is also a shortcode.
 */
include_once ABSPATH . 'wp-admin/includes/file.php'; // Include the necessary file for handling uploads
include_once ABSPATH . 'wp-admin/includes/image.php'; // Include the necessary file for image processing
include_once ABSPATH . 'wp-admin/includes/media.php'; // Include the necessary file for media handling

require_once get_template_directory() . '/custom-functions/fileuploaderfunction.php'; // Include the fileuploader.php file

if (!function_exists('test_data_shortcode')) {
    function test_data_shortcode() {
        global $wpdb;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Retrieve form data
            $name = $_POST['name-11'];
            $birthdate = $_POST['birthdate-11'];
            $mobile = $_POST['mob-11'];
            $helmet_model = $_POST['helmet-11'];
            $gender = $_POST['gender-11'];
            $file1 = $_FILES['file-11'];
            $file2 = $_FILES['file-12'];
            $userId = get_current_user_id(); // Get the logged-in user's ID

            // Upload file 1
            $uploaded_file1 = handle_file_uploads($file1, $userId);
            
            // Upload file 2
            $uploaded_file2 = handle_file_uploads($file2, $userId);

            if ($uploaded_file1 && $uploaded_file2) {
                // Insert form data into the database
                $wpdb->insert('wp_test_table', array(
                    'name' => $name,
                    'birthdate' => $birthdate,
                    'mobile' => $mobile,
                    'helmet_model' => $helmet_model,
                    'gender' => $gender,
                    'file' => $uploaded_file1, // Save the file path
                    'file2' => $uploaded_file2 // Save the file 2 path
                ));

                echo "Form submitted successfully!";
            } else {
                echo "File type unsupported. Please try again!";
            }
        }

        ob_start();
        include dirname(__FILE__) . '/../test-data.php';
        return ob_get_clean();
    }
}

add_shortcode('test_data', 'test_data_shortcode');

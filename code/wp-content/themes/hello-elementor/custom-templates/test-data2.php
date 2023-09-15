<?php
/*
Template Name: Activation Form
*/
global $wpdb;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $name = $_POST['name-11'];
    $birthdate = $_POST['birthdate-11'];
    $mobile = $_POST['mob-11'];
    $helmet_model = $_POST['helmet-11'];
    $gender = $_POST['gender-11'];

    $file = $_FILES['file-11'];
    $file_name = $file['name'];
    $file_tmp = $file['tmp_name'];
    $file_type = $file['type'];
    $file_size = $file['size'];

    // Retrieve the logged-in user ID or email
    $user_id = get_current_user_id();
    $user_email = wp_get_current_user()->user_email;

    // Create the main directory (testfolder) if it doesn't exist
    $upload_dir = wp_upload_dir();
    $main_dir = $upload_dir['basedir'] . '/testfolder/';
    if (!file_exists($main_dir)) {
        mkdir($main_dir);
    }

    // Create the user-specific subdirectory based on ID or email
    $sub_dir = '';
    if (!empty($user_id)) {
        $sub_dir = $main_dir . $user_id . '/';
    } elseif (!empty($user_email)) {
        // Sanitize email to create a valid subdirectory name
        $sanitized_email = sanitize_file_name($user_email);
        $sub_dir = $main_dir . $sanitized_email . '/';
    }

    if (!empty($sub_dir)) {
        if (!file_exists($sub_dir)) {
            mkdir($sub_dir);
        }

        $target_file = $sub_dir . basename($file_name);
        move_uploaded_file($file_tmp, $target_file);

        // Insert form data into database
        $wpdb->insert('wp_test_table', array(
            'name' => $name,
            'birthdate' => $birthdate,
            'mobile' => $mobile,
            'helmet_model' => $helmet_model,
            'gender' => $gender,
            'file' => $target_file
        ));

        echo "Form submitted successfully!";
        wp_redirect(home_url('/testpage/'));
        exit;
    } else {
        echo "Unable to create subdirectory for the user!";
    }
}

?>
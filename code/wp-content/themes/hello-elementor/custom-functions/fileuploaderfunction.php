<?php
/**
 * Custom function for handling file uploads in WordPress.
 */

function handle_file_uploads($file, $userId) {
    // Get the user's upload directory
    $upload_dir = wp_upload_dir();

    // Create the user's subfolder if it doesn't exist
    $user_dir = $upload_dir['basedir'] . '/all-uploaded-files/' . $userId;
    if (!file_exists($user_dir)) {
        wp_mkdir_p($user_dir);
    }

    // Define the allowed file types and corresponding subfolders
    $allowed_file_types = array(
        'pdf' => 'pdf-documents',
        'jpg' => 'images',
        'jpeg' => 'images',
        'png' => 'images'
    );

    // Get the file extension
    $file_extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

    // Check if the file type is allowed
    if (!isset($allowed_file_types[$file_extension])) {
        // Invalid file type
        return false;
    }

    // Get the subfolder for the file type
    $subfolder = $allowed_file_types[$file_extension];

    // Create the subfolder if it doesn't exist
    $subfolder_dir = $user_dir . '/' . $subfolder;
    if (!file_exists($subfolder_dir)) {
        wp_mkdir_p($subfolder_dir);
    }

    // Generate a unique filename for the uploaded file
    $filename = wp_unique_filename($subfolder_dir, $file['name']);

    // Move the uploaded file to the user's subfolder
    $new_file_path = $subfolder_dir . '/' . $filename;
    $moved = move_uploaded_file($file['tmp_name'], $new_file_path);

    if ($moved) {
        // File upload successful
        return $new_file_path;
    } else {
        // File upload failed
        return false;
    }
}

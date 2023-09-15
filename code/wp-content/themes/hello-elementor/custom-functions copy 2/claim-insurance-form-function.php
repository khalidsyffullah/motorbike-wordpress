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
            $name = $_POST['cname'];
            $nid_file = $_FILES['nid'];
            $driving_license_file = $_FILES['driving-license'];
            $location = $_POST['claim-location'];
            $accident_time = $_POST['accident-time'];
            $incident_details = $_POST['incedent-details'];
            $prescription_file = $_FILES['prescription'];
            $hospital_bills_file = $_FILES['hospital-bills'];
            $medical_report_file = $_FILES['medical-report'];
            $discharge_certificate_file = $_FILES['discharge-certificate'];
            $payment_option = $_POST['payment-options'];
            $account_holdername = $_POST['account-holdername'];
            $bank_account_number = $_POST['bank-account-number'];
            $bank_name = $_POST['bank-name'];
            $branch_name = $_POST['branch-name'];
            $bank_routing_number = $_POST['bank-routing-number'];
            $mobile_account_number = $_POST['mobile-account-number'];
            $mobile_account_number = $_POST['mobile-payment-options'];

            $userId = get_current_user_id(); // Get the logged-in user's ID

            // Upload files
            $uploaded_nid = handle_file_uploads($nid_file, $userId);
            $uploaded_driving_license = handle_file_uploads($driving_license_file, $userId);
            $uploaded_prescription = handle_file_uploads($prescription_file, $userId);
            $uploaded_hospital_bills = handle_file_uploads($hospital_bills_file, $userId);
            $uploaded_medical_report = handle_file_uploads($medical_report_file, $userId);
            $uploaded_discharge_certificate = handle_file_uploads($discharge_certificate_file, $userId);

            // if ($uploaded_nid && $uploaded_driving_license && $uploaded_prescription && $uploaded_hospital_bills && $uploaded_medical_report && $uploaded_discharge_certificate) {
                // Insert form data into the database
                $wpdb->insert('wp_claim_application', array(
                    'name' => $name,
                    'nid_file' => $uploaded_nid,
                    'driving_license_file' => $uploaded_driving_license,
                    'location' => $location,
                    'accident_time' => $accident_time,
                    'incident_details' => $incident_details,
                    'prescription_file' => $uploaded_prescription,
                    'hospital_bills_file' => $uploaded_hospital_bills,
                    'medical_report_file' => $uploaded_medical_report,
                    'discharge_certificate_file' => $uploaded_discharge_certificate,
                    'payment_option' => $payment_option,
                    'account_holdername' => $account_holdername,
                    'bank_account_number' => $bank_account_number,
                    'bank_name' => $bank_name,
                    'branch_name' => $branch_name,
                    'bank_routing_number' => $bank_routing_number,
                    'mobile_account_number' => $mobile_account_number,
                    'mobile_account_number' => $mobile_account_number

                ));

                echo "Form submitted successfully!";
            // } else {
            //     echo "File type unsupported. Please try again!";
            // }
        }

        ob_start();
        // include dirname(__FILE__) . '/../claim-insurance-form.php';
        return ob_get_clean();
    }
}

// add_shortcode('test_data', 'test_data_shortcode');

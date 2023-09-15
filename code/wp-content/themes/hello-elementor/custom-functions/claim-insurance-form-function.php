<?php

/**
 * Custom function for form data upload in WordPress.
 * This function is also a shortcode.
 */
include_once ABSPATH . 'wp-admin/includes/file.php'; // Include the necessary file for handling uploads
include_once ABSPATH . 'wp-admin/includes/image.php'; // Include the necessary file for image processing
include_once ABSPATH . 'wp-admin/includes/media.php'; // Include the necessary file for media handling

require_once ABSPATH . 'wp-includes/PHPMailer/Exception.php';
require_once ABSPATH . 'wp-includes/PHPMailer/PHPMailer.php';
require_once ABSPATH . 'wp-includes/PHPMailer/SMTP.php';

require_once get_template_directory() . '/custom-functions/fileuploaderfunction.php'; // Include the fileuploader.php file

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


if (!function_exists('claim_insurance_form_shortcode')) {
    function claim_insurance_form_shortcode()
    {
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
            $mobile_payment_option = $_POST['mobile-payment-options'];

            $userId = get_current_user_id(); // Get the logged-in user's ID

            // Upload files
            $uploaded_nid = handle_file_uploads($nid_file, $userId);
            $uploaded_driving_license = handle_file_uploads($driving_license_file, $userId);
            $uploaded_prescription = handle_file_uploads($prescription_file, $userId);
            $uploaded_hospital_bills = handle_file_uploads($hospital_bills_file, $userId);
            $uploaded_medical_report = handle_file_uploads($medical_report_file, $userId);
            $uploaded_discharge_certificate = handle_file_uploads($discharge_certificate_file, $userId);

            // Insert form data into the database
            if (!empty($incident_details)) {
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

                $result = $wpdb->get_row($wpdb->prepare("SELECT email FROM wp_activation_form WHERE name = %s", $name));
                if ($result) {
                    $useremail = $result->email;
                }


                // Configure SMTP settings
               $smtpHost = 'smtp.gmail.com';
                $smtpPort = 587;
                $smtpEncryption = 'tls';
                $smtpUsername = 'khalid.nafstech@gmail.com'; // Your Gmail email address
                $smtpPassword = 'icplzvygdcthpgwi'; // Your Gmail password

                // // Set up PHPMailer
                // require_once get_template_directory() . '/PHPMailer/src/PHPMailer.php';
                // require_once get_template_directory() . '/PHPMailer/src/SMTP.php';
                // require_once get_template_directory() . '/PHPMailer/src/Exception.php';

                $email = $useremail;

                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host = $smtpHost;
                $mail->Port = $smtpPort;
                $mail->SMTPSecure = $smtpEncryption;
                $mail->SMTPAuth = true;
                $mail->Username = $smtpUsername;
                $mail->Password = $smtpPassword;

                // Send confirmation email
               $mail->setFrom($smtpUsername, 'Your Name'); // Sender's email address and name
                $mail->addAddress($email); // Recipient's email address
                $mail->Subject = 'Form Submission Confirmation';
                $mail->Body = "Dear $name,\n\nThank you for submitting the form. Your submission was successful.";


                try {
                   $mail->send();
                    echo "Form submitted successfully. Confirmation email sent.";
                } catch (Exception $e) {
                   echo "Form submitted successfully. Failed to send confirmation email. Error: " . $mail->ErrorInfo;
                }



                echo "Form submitted successfully!";
            }
            
        }

        ob_start();
        include dirname(__FILE__) . '/../custom-templates/claim-insurance-form.php';
        return ob_get_clean();
    }
}

add_shortcode('claim-insurance-form', 'claim_insurance_form_shortcode');

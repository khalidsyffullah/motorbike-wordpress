<?php
if (isset($_POST['claim_form_submit_button'])) {
    global $wpdb;
    $table_name = $wpdb->prefix . '_claim_form';
    $name = $_POST['name'];
    $nid = $_POST['nid'];
    $driving_license = $_POST['driving_license'];
    $location = $_POST['location'];
    $accident_time = $_POST['accident_time'];
    $incedent_details = $_POST['incedent_details'];
    $payment_method = $_POST['payment_method'];
    $account_holder_name = $_POST['account_holder_name'];
    $account_number = $_POST['account_number'];
    $activation_form_id = $_POST['activation_form_id'];
    $wpdb->insert(
        $table_name,
        array(
            'name' => $name,
            'claim_location' => $claim_location,
            'accident_time' => $accident_time,
            'incident_details' => $incedent_details,
            'account_holdername' => $account_holder_name,
            'bank_name' => $bank_name,
            'branch_name' => $branch_name,
            'bank_account_number' => $bank_account_number,
            'bank_routing_number' => $bank_routing_number,
            'payment_options' => $payment_options,
            'mobile_payment_options' => $mobile_payment_options,
            'mobile_account_number' => $mobile_account_number,
            'nid' => $nid,
            'prescription' => $prescription,
            'driving_license' => $driving_license,
            'hospital_bills' => $hospital_bills,
            'medical_report' => $medical_report,
            'discharge_certificate' => $discharge_certificate
        )
    );

    $wpdb->insert($table, $data);
    $redirect_url = home_url(''); // Replace with your desired URL

}
?>
<form id="claim-insurance-form" method="post" enctype="multipart/form-data">
<input type="text" name="cname" id="claim-name" class="form-field" value="<?php echo isset($_POST['cname']) ? esc_attr($_POST['cname']) : ''; ?>" readonly>
    <input type="file" id="claim-nid" class="form-field file-input" name="nid">
    <input type="email" id="claim-email" class="form-field" name="customer-email">
    <input type="file" id="claim-driving-license" class="form-field file-input" name="driving-license">
    <input type="text" name="claim-location" class="form-field" id="claim-location">
    <input type="datetime-local" id="claim-time" class="form-field" name="accident-time">
    <textarea name="incedent-details" id="claim-incedent-details" class="form-field" cols="30" rows="10"></textarea>
    <input type="file" id="claim-prescription" class="form-field file-input" name="prescription">
    <input type="file" id="claim-hospital-bills" class="form-field file-input" name="hospital-bills">
    <input type="file" id="claim-medical-report" class="form-field file-input" name="medical-report">
    <input type="file" id="claim-discharge-certificate" class="form-field file-input" name="discharge-certificate">
    <input type="radio" id="bank_payment" name="payment-options" value="bank" onclick="showBankPayment()">
    <label for="bank_payment">Bank Payment</label>
    <input type="radio" id="mobile_payment" name="payment-options" value="mobile" onclick="showMobilePayment()">
    <input type="text" id="claim-holdername" class="form-field file-input" name="account-holdername">
    <input type="text" id="claim-account-number" class="form-field file-input" name="bank-account-number">
    <input type="text" id="claim-bank-name" class="form-field file-input" name="bank-name">
    <input type="text" id="claim-branch-name" class="form-field file-input" name="branch-name">
    <input type="text" id="claim-bank-routing-number" class="form-field file-input" name="bank-routing-number">
    <input type="text" id="claim-mobile-account-number" class="form-field file-input" name="mobile-account-number">
    <input type="radio" id="bkash_payment" name="mobile-payment-options" value="bkash">
    <input type="radio" id="nagad_payment" name="mobile-payment-options" value="nagad">
    <input type="radio" id="rocket_payment" name="mobile-payment-options" value="rocket">
    <input type="submit" name="claim_form_submit_button" id="claim_form_submit_button" value="Submit">

</form>
    <script>
        // Get the bank and mobile payment sections
        var bankPaymentSection = document.getElementById("bank-payment");
        var mobilePaymentSection = document.getElementById("mobile-payment");

        // Get the bank and mobile payment radio buttons
        var bankPaymentRadio = document.getElementById("bank_payment");
        var mobilePaymentRadio = document.getElementById("mobile_payment");

        // Add event listeners to the radio buttons
        bankPaymentRadio.addEventListener("click", function() {
            bankPaymentSection.style.display = "block";
            mobilePaymentSection.style.display = "none";
        });

        mobilePaymentRadio.addEventListener("click", function() {
            mobilePaymentSection.style.display = "block";
            bankPaymentSection.style.display = "none";
        });
    </script>
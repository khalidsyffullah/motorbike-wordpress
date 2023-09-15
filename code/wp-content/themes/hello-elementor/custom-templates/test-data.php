

<form id="claim-insurance-form" method="post" enctype="multipart/form-data">

    <div class="claim-form-container claim-form-shortcode">


        <label>
            <div>Name:</div>
            <input type="text" name="cname" id="claim-name" class="form-field" >
        </label>

        <div class="row">
            <div class="column">
                <label class="label">
                    <div>Copy of NID *</div>
                    <input type="file" id="claim-nid" class="form-field file-input" name="nid">
                </label>
            </div>
            <div class="column">
                <label>
                    <div class="label">Valid Driving License *</div>
                    <input type="file" id="claim-driving-license" class="form-field file-input" name="driving-license">
                </label>
            </div>
        </div>


        <div class="row">
            <div class="column">
                <label class="label">
                    <div>Incedent Location:</div>
                    <input type="text" name="claim-location" class="form-field" id="claim-location">
                </label>
            </div>
            <div class="column">
                <label>
                    <div class="label">Incedent Date and time:</div>
                    <input type="datetime-local" id="claim-time" class="form-field" name="accident-time">
                </label>
            </div>
        </div>

        <div>
            <label>
                <div class="label">Incedent Details</div>
                <textarea name="incedent-details" id="claim-incedent-details" class="form-field" cols="30" rows="10"></textarea>
            </label>
        </div>

        <h3>Medical Documents</h3>

        <div class="claim-card">

            <div class="row">
                <div class="column">
                    <label class="label">
                        <div>Doctor’s Prescription/Advice for hospitalization (in
                            applicable cases)*</div>
                        <input type="file" id="claim-prescription" class="form-field file-input" name="prescription">
                    </label>
                </div>
                <div class="column">
                    <label>
                        <div class="label">All Bills from hospital/clinic/doctor's chamber *</div>
                        <input type="file" id="claim-hospital-bills" class="form-field file-input" name="hospital-bills">
                    </label>
                </div>
            </div>

            <div class="row">
                <div class="column">
                    <label class="label">
                        <div>All medical reports such as X-Ray, City Scan, MRI, or such relevant reports*</div>
                        <input type="file" id="claim-medical-report" class="form-field file-input" name="medical-report">
                    </label>
                </div>
                <div class="column">
                    <label>
                        <div class="label">Discharge Certificate (in applicable cases) *</div>
                        <input type="file" id="claim-discharge-certificate" class="form-field file-input" name="discharge-certificate">
                    </label>
                </div>
            </div>
        </div>

        <H3>Payment Information:</H3>

        <h4>Payment Mode</h4>


        <div class="claim-card">
            <div>
                <input type="radio" id="bank_payment" name="payment-options" value="bank" onclick="showBankPayment()">
                <label for="bank_payment">Bank Payment</label>
            </div>
            <div>
                <input type="radio" id="mobile_payment" name="payment-options" value="mobile" onclick="showMobilePayment()">
                <label for="mobile_payment">Mobile Payment</label>
            </div>

            <!-- Bank Payment section -->
            <div id="bank-payment" style="display: none;">
                <div class="row">
                    <div class="column">
                        <label class="label">
                            <div>Account Holder Name*</div>
                            <input type="text" id="claim-holdername" class="form-field file-input" name="account-holdername">
                        </label>
                    </div>
                    <div class="column">
                        <label>
                            <div class="label">Account Number *</div>
                            <input type="text" id="claim-account-number" class="form-field file-input" name="bank-account-number">
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="column">
                        <label class="label">
                            <div>Bank Name*</div>
                            <input type="text" id="claim-bank-name" class="form-field file-input" name="bank-name">
                        </label>
                    </div>
                    <div class="column">
                        <label>
                            <div class="label">Branch Name *</div>
                            <input type="text" id="claim-branch-name" class="form-field file-input" name="branch-name">
                        </label>
                    </div>
                    <div class="column">
                        <label>
                            <div class="label">Bank Routing Number(if available)</div>
                            <input type="text" id="claim-bank-routing-number" class="form-field file-input" name="bank-routing-number">
                        </label>
                    </div>
                </div>
            </div>

            <!-- Mobile Payment section -->
            <div id="mobile-payment" style="display: none;">
                <div class="row">
                    <div class="column">
                        <label class="label">
                            <div>Mobile Account Number*</div>
                            <input type="text" id="claim-mobile-account-number" class="form-field file-input" name="mobile-account-number">
                        </label>
                    </div>
                    <div class="column">
                        <label>
                            <div class="label">Mobile Account Type *</div>
                            <div>
                                <input type="radio" id="bkash_payment" name="mobile-payment-options" value="bkash">
                                <label for="bkash">Bkash</label>
                            </div>
                            <div>
                                <input type="radio" id="nagad_payment" name="mobile-payment-options" value="nagad">
                                <label for="nagad">Nagad</label>
                            </div>
                            <div>
                                <input type="radio" id="rocket_payment" name="mobile-payment-options" value="rocket">
                                <label for="rocket">Rocket</label>
                            </div>
                        </label>
                    </div>
                </div>
            </div>







            <div id="activation_form_submit_button" class="row form_submit_button">
                <input type="submit" name="claim_form_submit_button" id="claim_form_submit_button" value="Submit">
            </div>
        </div>


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
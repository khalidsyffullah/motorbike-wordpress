<form id="claim-insurance-form" method="post" enctype="multipart/form-data">

    <div class="claim-form-container claim-form-shortcode">

        <div class="card">



            <div class="row">
                <div class="column claim-name-column">
                    <label>
                        <div class="claim-form-label">Name:</div>
                        <input type="text" name="cname" id="claim-name" class="form-field full-width-input" value="<?php echo isset($_POST['cname']) ? esc_attr($_POST['cname']) : ''; ?>" readonly>
                    </label>
                </div>
            </div>

            <div class="row">
                <div class="column">
                    <label>
                        <div class="claim-form-label">Copy of NID *</div>
                        <input type="file" id="claim-nid" class="form-field full-width-input file-input" name="nid">
                    </label>
                </div>
                <div class="column">
                    <label>
                        <div class="claim-form-label">Valid Driving License *</div>
                        <input type="file" id="claim-driving-license" class="form-field full-width-input file-input" name="driving-license">
                    </label>
                </div>
            </div>


            <div class="row">
                <div class="column">
                    <label>
                        <div class="claim-form-label">Incedent Location:</div>
                        <input type="text" name="claim-location" class="form-field full-width-input" id="claim-location">
                    </label>
                </div>
                <div class="column">
                    <label>
                        <div class="claim-form-label" id="date-time-label">Incedent Date and time:</div>
                        <input type="datetime-local" id="claim-time" class="form-field full-width-input" name="accident-time">
                    </label>
                </div>
            </div>

            <div class="textareacolumn">
                <label>
                    <div class="claim-form-label" id="incedent-details-label">Incedent Details</div>
                    <textarea name="incedent-details" id="claim-incedent-details" class="form-field full-width-input" cols="30" rows="10"></textarea>
                </label>
            </div>
        </div>



        <h3 class="claim-heading">Medical Documents</h3>

        <div class="card">

            <div class="row">
                <div class="column">
                    <label>
                        <div class="claim-form-label">Doctor’s Prescription/Advice for hospitalization*</div>
                        <input type="file" id="claim-prescription" class="form-field full-width-input file-input" name="prescription">
                    </label>
                </div>
                <div class="column">
                    <label>
                        <div class="claim-form-label">All Bills from hospital/clinic/doctor's chamber *</div>
                        <input type="file" id="claim-hospital-bills" class="form-field full-width-input file-input" name="hospital-bills">
                    </label>
                </div>
            </div>

            <div class="row">
                <div class="column">
                    <label>
                        <div class="claim-form-label">All medical reports *</div>
                        <input type="file" id="claim-medical-report" class="form-field full-width-input file-input" name="medical-report">
                    </label>
                </div>
                <div class="column">
                    <label>
                        <div class="claim-form-label">Discharge Certificate (in applicable cases) *</div>
                        <input type="file" id="claim-discharge-certificate" class="form-field full-width-input file-input" name="discharge-certificate">
                    </label>
                </div>
            </div>
        </div>

        <H3 class="claim-heading">Payment Information:</H3>

        <div class="card">

            <h4>Select your payment method</h4>


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
                        <label>
                            <div class="claim-form-label">Account Holder Name*</div>
                            <input type="text" id="claim-holdername" class="form-field full-width-input file-input" name="account-holdername">
                        </label>
                    </div>
                    <div class="column">
                        <label>
                            <div class="claim-form-label">Account Number *</div>
                            <input type="text" id="claim-account-number" class="form-field full-width-input file-input" name="bank-account-number">
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="column">
                        <label>
                            <div class="claim-form-label">Bank Name*</div>
                            <input type="text" id="claim-bank-name" class="form-field full-width-input" name="bank-name">
                        </label>
                    </div>
                    <div class="column">
                        <label>
                            <div class="claim-form-label">Branch Name *</div>
                            <input type="text" id="claim-branch-name" class="form-field full-width-input file-input" name="branch-name">
                        </label>
                    </div>

                </div>
                <div class="row">
                    <div class="column claim-name-column">
                        <label>
                            <div class="claim-form-label">Bank Routing Number(if available)</div>
                            <input type="text" id="claim-bank-routing-number" class="form-field full-width-input" name="bank-routing-number">
                        </label>
                    </div>
                </div>
            </div>

            <!-- Mobile Payment section -->
            <div id="mobile-payment" style="display: none;">
                <div class="row">
                    <div class="column">
                        <label>
                            <div class="claim-form-label">Mobile Account Number*</div>
                            <input type="text" id="claim-mobile-account-number" class="form-field full-width-input file-input" name="mobile-account-number">
                        </label>
                    </div>
                    <div class="column">
                        <label>
                            <div class="claim-form-label">Mobile Account Type *</div>
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
        </div>





        <div id="claim_form_submit_button" class="row form_submit_button">
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


    <style>

        
        .claim-form-label {
            padding-bottom: 15px;
            display: flex;
        }

        .column {
            text-align: center;
        }

        .full-width-input {
            width: 100%;
            box-sizing: border-box;
            /* include padding and border in the width */
        }

        /* .claim-form-container {
        text-align: center;
    } */

        .column.claim-name-column {
            margin-left: 30px;
        }

        .textareacolumn {
            width: 100%;
            margin-left: 30px;
        }

        textarea#claim-incedent-details {
            min-width: 66vw;
        }

        .claim-heading {
            margin: 30px 0;
        }

        input#claim-bank-routing-number {
            min-width: 66vw;
        }


        @media (max-width: 600px) {
            .row {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
                align-items: flex-start;
            }

            .column {
                width: 100%;
                display: inline-flex;
            }


            input.full-width-input,
            #claim-name,
            textarea#claim-incedent-details,
            input#claim-bank-routing-number {
                min-width: 80vw;
            }

            .column.claim-name-column {
                margin-left: 0px;
            }

            #incedent-details-label {
                padding: 15px 0;
            }

            input#claim-time {
                padding: 10px;
                border: 1px solid;
            }

            .textareacolumn {
                width: 100%;
                margin-left: 8px;
            }
        }
    </style>

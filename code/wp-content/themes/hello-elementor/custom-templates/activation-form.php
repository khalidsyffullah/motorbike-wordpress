<style>
    .activation-form-label {
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
        #claim-name {

            min-width: 80vw;
        }

        .column.claim-name-column {
            margin-left: 0px;
        }
    }
</style>


<form method="POST">
    <div class="activation-form-container">
        <div class="row">
            <div class="column">
                <label>
                    <div class="activation-form-label">
                        Name (NID/Passport/Birth Certificate) *
                    </div>
                    <input type="text" name="name-11" id="name-11" class="form-field full-width-input" placeholder="Enter Your Full Name Here" required>
                </label>
            </div>
            <div class="column">
                <label>
                    <div class="activation-form-label">
                        Date of Birth *
                    </div>
                    <input type="date" name="birthdate-11" id="birthdate-11" class="form-field full-width-input" placeholder="Select Date of birth" required>
                </label>
            </div>
        </div>

        <div class="row">
            <div class="column">
                <label>
                    <div class="activation-form-label">
                        Mobile *
                    </div>
                    <input type="tel" name="mob-11" id="mobile_number-11" class="form-field full-width-input" placeholder="Enter Your Mobile Number Here" required>
                </label>
            </div>
            <div class="column">
                <label>
                    <div class="activation-form-label">
                        Email (Optional)
                    </div>
                    <input type="email" name="email-11" id="email-11" class="form-field full-width-input" placeholder="Enter Your Email Address Here">
                </label>
            </div>
        </div>

        <div class="row">
            <div class="column">
                <label>
                    <div class="activation-form-label">
                        Dealer Name *
                    </div>
                    <input type="text" name="dealer-name-11" id="dealer_name-11" class="form-field full-width-input" placeholder="Enter Dealer Name Here" required>
                </label>
            </div>

            <div class="column">
                <label>
                    <div class="activation-form-label">
                        Purchase Date *
                    </div>
                    <input type="date" name="purchasedate-11" id="purchasedate-11" class="form-field full-width-input" placeholder="Select Date of birth" required>
                </label>
            </div>
        </div>

        <div class="row">
            <div class="column">
                <label>
                    <div class="activation-form-label">
                        Helmet Model *
                    </div>
                    <input type="text" name="helmet-11" id="helmet-11" class="form-field full-width-input" placeholder="Enter Your Helmet Model Here" required>
                </label>
            </div>

            <div class="column">
                <label>
                    <div class="activation-form-label">
                        Activation Code *
                    </div>
                    <input type="text" name="activationcode-11" id="activationcode-11" class="form-field full-width-input" placeholder="Enter Your Activation Code Here" required>
                </label>
            </div>
        </div>

        <div id="activation_form_submit_button" class="row form_submit_button">
            <input type="submit" name="activation_form_submit_button" id="activation_form_submit_button" value="Submit">
        </div>
    </div>
</form>
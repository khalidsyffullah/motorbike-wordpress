<?php
global $wpdb;
$models = $wpdb->get_results("SELECT DISTINCT helmet_model FROM wp_activation_form");

foreach ($models as $model) {
    $helmet = $model->helmet_model;
    $data = $wpdb->get_row($wpdb->prepare("SELECT dealer_name, purchasedate, name, activation_code, is_verified FROM wp_activation_form WHERE helmet_model = %s", $helmet));
    ?>

    <div class="helmet-card">
        <div class="helmet-name"><?php echo $model->helmet_model; ?></div>
        <button class="details-button" data-helmet="<?php echo $model->helmet_model; ?>">See Details</button>
    </div>

    <dialog>
        <div class="modal-content">
            <button id="close-button">Close</button>
            <h2>Helmet Details</h2>
            <div class="helmet-details" style="display:none;">
                <p>Dealer Name: <span class="dealer-name"></span></p>
                <p>Purchase Date: <span class="purchase-date"></span></p>
                <p>Activation Code: <span class="activation-code"></span></p>
                <p>Is Verified: <span class="is-verified"></span></p>
                <p>Customer Name: <span class="name"></span></p>
            </div>

            <button class="claim-button">Claim Your Insurance Now</button>
        </div>
    </dialog>

<?php } ?>

<script>
    var modal = document.querySelector('dialog');
    var closeButton = document.querySelector('#close-button');

    document.querySelectorAll('.details-button').forEach(item => {
        item.addEventListener('click', event => {
            var helmet = event.target.dataset.helmet;
            modal.showModal();
            fetchHelmetData(helmet);
        })
    });

    closeButton.addEventListener('click', () => {
        modal.close();
    });

    document.querySelectorAll('.claim-button').forEach(button => {
        button.addEventListener('click', () => {
            var name = document.querySelector('.name').textContent;
            claimInsuranceForm(name);
        });
    });

    function claimInsuranceForm(name) {
        var form = document.createElement('form');
        form.action = '<?php echo home_url('/claim-form/'); ?>';
        form.method = 'POST';

        var nameInput = document.createElement('input');
        nameInput.type = 'hidden';
        nameInput.name = 'cname';
        nameInput.value = name;
        form.appendChild(nameInput);

        document.body.appendChild(form);
        form.submit();
    }

    function fetchHelmetData(helmet) {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var data = JSON.parse(this.responseText);
                document.querySelector('.dealer-name').innerHTML = data.dealer_name;
                document.querySelector('.purchase-date').innerHTML = data.purchasedate;
                document.querySelector('.activation-code').innerHTML = data.activation_code;
                document.querySelector('.is-verified').innerHTML = data.is_verified == 1 ? 'Yes' : 'No';
                document.querySelector('.helmet-details').style.display = 'block';
                document.querySelector('.name').innerHTML = data.name;
            }
        };
        xhr.open('GET', '<?php echo admin_url('admin-ajax.php'); ?>?action=get_helmet_data&helmet=' + encodeURIComponent(helmet));
        xhr.send();
    }
</script>


<style>
    .helmet-card {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 30px;
        padding: 30px;
        border: 1px solid #fff;
        border-radius: 4px;
        min-height: 100px;
        
        box-shadow: 0px -1px 29px 11px rgba(213,213,213,0.75);
-webkit-box-shadow: 0px -1px 29px 11px rgba(213,213,213,0.75);
-moz-box-shadow: 0px -1px 29px 11px rgba(213,213,213,0.75);    }

    .helmet-name {
        margin-right: auto;
        font-size: 20px;
        font-weight: 600;
        text-transform: capitalize;
    }

    .details-button {
        margin-left: auto;
    }
    dialog{
        margin-top: 40px;
    }
</style>
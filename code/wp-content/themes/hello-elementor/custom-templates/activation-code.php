<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

<div id="root" class="container">


    


    <h2>Enter Activation Code here</h2>

    <form method="post">
    <div class="mb-3">

        <label for="activation-code" class="form-label">Activation Code:</label>
        <input type="text" id="activation-code" class="form-control" name="activation_code">
    </div>
        <input type="submit" class="btn btn-primary" value="Submit">
    </form>

    <h2>Activation codes csv file upload:</h2>


    <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post" enctype="multipart/form-data">
    <div class="input-group mb-3">

        <input type="hidden" name="action" value="process_csv_file">
        <input type="file" class="form-control" id="file-upload" aria-label="File Upload" name="csv_file" hidden>
        <label class="input-group-text" for="file-upload">
        <i class="fas fa-file-upload"></i> Choose file
      </label>

        <input type="submit" value="Upload CSV File">
    </form>



    

    



    <?php if ($message) : ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>


    <?php

    global $wpdb;
    $activation_codes = $wpdb->get_results("SELECT * FROM wp_activation_code");

    // Display the activation codes in a table
    if ($activation_codes) {
        echo "<table>";
        echo "<thead><tr><th>ID</th><th>Activation Code</th></tr></thead>";
        echo "<tbody>";
        foreach ($activation_codes as $code) {
            echo "<tr><td>{$code->id}</td><td>{$code->activation_code}</td></tr>";
        }
        echo "</tbody>";
        echo "</table>";
    } else {
        echo "No activation codes found.";
    }
    ?>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>

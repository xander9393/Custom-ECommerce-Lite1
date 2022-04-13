<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once 'includes/head.php' ?>
    <?php
    $query = "SELECT * FROM tbl_meta WHERE id = 3";
    $data = mysqli_query($con, $query);

    while ($row = mysqli_fetch_assoc($data)) {
    ?>
        <!-- meta tag -->
        <meta charset="UTF-8">
        <title><?php echo $row['meta_title_content'] ?></title>
        <meta name="title" content="<?php echo $row['meta_title_content'] ?>">
        <meta name="description" content="<?php echo $row['meta_description_content'] ?>">

        <meta property="og:type" content="website">
        <meta property="og:title" content="<?php echo $row['meta_title_content'] ?>">
        <meta property="og:description" content="<?php echo $row['meta_description_content'] ?>">
    <?php
    }
    ?>
</head>

<body>
    <a id="button"></a>

    <?php include 'includes/nav.php' ?>

    <section class="contact-section">
        <div class="container">
            <div class="contact-body">
                <p class="optimus">GCash Payment Gateway</p>
                <CENTER> SEND YOUR PAYMENT IN THIS NUMBER (0917XXXXXXX) </CENTER>

                <form action="./handler/gcashhandler.php" method="post">
                    <div class="mb-3">
                        <label for="customername" class="form-label">Name</label>
                        <input type="text" class="form-control" id="customername" name="customername_form" required>
                    </div>
                    <div class="mb-3">
                        <label for="gcash" class="form-label">GCash Number </label>
                        <input type="number" class="form-control" id="gcash" name="gcash_form" required>
                    </div>
                    <div class="mb-3">
                        <label for="ref" class="form-label">Reference Number</label>
                        <input type="number" class="form-control" id="ref" name="ref_form" required>
                    </div>
               <div>
                    </div>
                    <input type="submit" value="Submit" class="contact-btn">
                </form>

            </div>
        </div>
    </section>

    <?php include 'includes/footer.php' ?>
<?php include 'includes/script.php' ?>
</body>



</html>
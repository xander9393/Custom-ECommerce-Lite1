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
                <p class="optimus">contact us</p>

                <form action="./handler/contact_us.php" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name_form" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email_form" required>
                    </div>
                    <div class="mb-3">
                        <label for="contact-no" class="form-label">Contact No.</label>
                        <input type="text" class="form-control" id="contact-no" name="contactno_form" required>
                    </div>
                    <div class="mb-3">
                        <label for="concern" class="form-label">Concern</label>
                        <textarea class="form-control" id="concern" rows="3" name="concern_form" required></textarea>
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
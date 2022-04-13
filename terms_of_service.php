<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once 'includes/head.php' ?>
    <?php
    $query = "SELECT * FROM tbl_meta WHERE id = 5";
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

    <section class="terms-section">
        <div class="container">
            <div class="terms-body">
                <p class="optimus">terms of services</p>

                <?php
                $sql = "SELECT * FROM tbl_terms WHERE id = 1";
                $data = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_assoc($data)) {
                    $return_content = $row['content'];
                }

                echo $return_content;
                ?>

            </div>
        </div>
    </section>

    <?php include 'includes/footer.php' ?>
<?php include 'includes/script.php' ?>
</body>



</html>
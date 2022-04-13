<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once 'includes/head.php' ?>
    <?php
    $query = "SELECT * FROM tbl_meta WHERE id = 4";
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

    <section class="faq-section">
        <div class="container">
            <div class="faq-body">
                <p class="optimus">faq's</p>
                <div class="accordion accordion-flush" id="accordionFlushExample">

                    <?php
                    $sql = "SELECT * FROM tbl_faq";
                    $data = mysqli_query($con, $sql);

                    $num_row = 1;
                    $target_row = 1;

                    while ($row = mysqli_fetch_assoc($data)) {
                        $return_title = $row['title'];
                        $return_content = $row['content'];
                    ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?php echo $num_row++ ?>">
                                    <?php echo $return_title ?>
                                </button>
                            </h2>
                            <div id="flush-collapse<?php echo $target_row++ ?>" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body"><?php echo $return_content ?></div>
                            </div>
                        </div>

                    <?php
                    }
                    ?>

                </div>
            </div>
    </section>

    <?php include 'includes/footer.php' ?>
<?php include 'includes/script.php' ?>
</body>



</html>
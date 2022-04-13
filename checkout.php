<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once 'includes/head.php' ?>
    <?php
    $query = "SELECT * FROM tbl_meta WHERE id = 9";
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
<?php include 'handler/customer_session.php' ?>

<body>
    <a id="button"></a>

    <?php include 'includes/nav.php' ?>

    <?php
    if (empty($_SESSION['cart'])) {
        echo
        "<script>
        
        alert('Cart is empty');
        window.location.href='shop.php';

        </script>";
    }

    if (isset($_GET['step'])) {
        $opt = $_GET['step'];
    } else {
        $opt = '';
    }

    switch ($opt) {
        case 'shipping';
            require_once('shipping.php');
            break;
        case 'paypal';
            require_once('paypal_payment.php');
            break;
        default:
            require_once('contact_information.php');
            break;
    }

    ?>

    <?php include 'includes/footer.php' ?>
    <?php include 'includes/script.php' ?>
</body>
</html>
<?php
session_start();
include_once('includes/db.php');

$query = "SELECT * FROM tbl_favicon";
$data = mysqli_query($con, $query);

while ($row = mysqli_fetch_assoc($data)) {
?>
    <!-- favicon -->
    <link rel="apple-touch-icon" href="./assets/img/favicon/<?php echo $row['apple_touch_icon'] ?>">
    <link rel="shortcut icon" href="./assets/img/favicon/<?php echo $row['shortcut_icon'] ?>" type="image/x-icon">
<?php
}
?>

<!-- responsive tag -->
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome,safari=1">
<meta name="HandheldFriendly" content="true">

<!-- font -->
<link rel="preconnect" href="//fonts.gstatic.com">
<link href="//fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
<link href="//fonts.cdnfonts.com/css/optimus-princeps" rel="stylesheet">

<!-- Bootstrap -->
<link rel="stylesheet" href="./assets/css/bootstrap.min.css">

<!-- SLICK JS  -->
<link rel="stylesheet" href="./assets/css/slick.css">
<link rel="stylesheet" href="./assets/css/slick-theme.css">

<!-- custom  -->
<link rel="stylesheet" href="./assets/css/style.css">
<link rel="stylesheet" href="./assets/css/product_page.css">
<link rel="stylesheet" href="./assets/css/contact.css">
<link rel="stylesheet" href="./assets/css/faq.css">
<link rel="stylesheet" href="./assets/css/shop.css">
<link rel="stylesheet" href="./assets/css/cart.css">
<link rel="stylesheet" href="./assets/css/signin.css">
<link rel="stylesheet" href="./assets/css/media.css">


<script src="//code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Animate css -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
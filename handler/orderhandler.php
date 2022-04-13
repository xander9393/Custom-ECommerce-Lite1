<?php
session_start();
include('../includes/db.php');

$customerID = $_SESSION['customerId'];

$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$address = $_POST['address'];
$city = $_POST['city'];
$postalcode = $_POST['postalcode'];
$region = $_POST['region'];
$country = $_POST['country'];
$phone = $_POST['phone'];
$total = $_POST['total'];

$payment = $_POST['payment'];

if ($payment === "COD") {

    $sql = "INSERT INTO orders (customer_id,lname,fname,address,city,postal,region,country,phone,total,payment_method,order_status) VALUE ('$customerID','$lastname','$firstname','$address','$city','$postalcode','$region','$country','$phone','$total','$payment','Processing')";
    $result = mysqli_query($con, $sql);

    $sql2 = "SELECT id FROM orders ORDER BY id DESC LIMIT 1";
    $result2 = mysqli_query($con, $sql2);

    while ($row = mysqli_fetch_assoc($result2)) {
        $orderID = $row['id'];
    }

    foreach ($_SESSION['cart'] as $key => $value) {
        $item_id = $value['id'];
        $quantity = $value['quantity'];

        $sql3 = "INSERT INTO order_details (order_id,product_id,quantity) VALUE ('$orderID','$item_id','$quantity')";
        $connect = mysqli_query($con, $sql3);

        echo
        "<script> 
            window.location.href='../orderplaced.php';
            
            </script>";

        unset($_SESSION['cart']);
    }

} elseif ($payment === 'Paypal') {
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $postalcode = $_POST['postalcode'];
    $region = $_POST['region'];
    $country = $_POST['country'];
    $phone = $_POST['phone'];
    $total = $_POST['total'];
    $_SESSION['total'] = $total;
    header('location: ../checkout.php?step=paypal');
}



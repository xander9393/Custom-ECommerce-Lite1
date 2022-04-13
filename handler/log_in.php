<?php
session_start();
include_once('../includes/db.php');

$email = mysqli_real_escape_string($con, $_POST['form_customer_email']);
$password = mysqli_real_escape_string($con, $_POST['form_customer_password']);
$password = md5($password);

$query = "SELECT * FROM customer WHERE email = '$email'";
$data = mysqli_query($con, $query);
while ($row = mysqli_fetch_assoc($data)) {

    $db_customer_id = $row['id'];
    $db_customer_email = $row['email'];
    $db_customer_password = $row['password'];
}

if ($email === $db_customer_email && $password === $db_customer_password) {

    $_SESSION['customerEmail'] = $db_customer_email;
    $_SESSION['customerId'] = $db_customer_id;

    echo
    "<script> 
    
    window.location.href='../index.php';

    </script>";
} else {
    echo
    "<script> 
    
    alert('Wrong Credentials');
    window.location.href='../index.php';

    </script>";
}

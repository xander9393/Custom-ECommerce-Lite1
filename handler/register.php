<?php
include_once('../includes/db.php');

$customer_email = $_POST['form_customer_email'];
$customer_password1 = $_POST['form_customer_password1'];
$customer_password2 = $_POST['form_customer_password2'];
$password = 'user-input-pass';

// Validate password strength
$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$number    = preg_match('@[0-9]@', $password);
$specialChars = preg_match('@[^\w]@', $password);

if ($customer_password1 === $customer_password2) {
    $sql = "INSERT INTO customer (email, password) VALUE ('$customer_email',MD5('$customer_password1'))";
    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "<script> 
        alert('Register Successfully'); 
        window.location.href='../index.php';
        </script>";
    }
} else {
    echo "<script> 
        alert('Password did not match'); 
        window.location.href='../index.php';
        </script>";
}

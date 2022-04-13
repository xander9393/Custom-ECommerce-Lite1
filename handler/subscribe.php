<?php
include_once('../includes/db.php');

$subscribe_email = $_POST['subscribe_email_form'];


$sql = "INSERT INTO tbl_subscribers (email,date) VALUE ('$subscribe_email',now())";
$result = mysqli_query($con, $sql);

if ($result) {
    echo "<script> 
        alert('Subscribe Successfully'); 
        window.location.href='../index.php';
        </script>";
} else {
    echo "<script> 
        alert('Error'); 
        window.location.href='../index.php';
        </script>";
}

<?php
include_once('../includes/db.php');

$name = $_POST['name_form'];
$email = $_POST['email_form'];
$contact_no = $_POST['contactno_form'];
$concern = $_POST['concern_form'];


$sql = "INSERT INTO tbl_contactus (name,email,contact_no,concern,date) VALUE ('$name','$email','$contact_no','$concern',now())";
$result = mysqli_query($con, $sql);

if ($result) {
    echo "<script> 
        alert('Submitted'); 
        window.location.href='../index.php';
        </script>";
} else {
    echo "<script> 
        alert('Error'); 
        window.location.href='../index.php';
        </script>";
}

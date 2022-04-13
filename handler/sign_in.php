<?php
session_start();
include_once('../includes/db.php');

$username = mysqli_real_escape_string($con, $_POST['username_form']);
$password = mysqli_real_escape_string($con, $_POST['password_form']);
$password = md5($password);

$query = "SELECT * FROM admin WHERE username = '$username'";
$data = mysqli_query($con, $query);
while ($row = mysqli_fetch_assoc($data)) {

    $db_admin_id = $row['id'];
    $db_admin_username = $row['username'];
    $db_admin_password = $row['password'];
}

if ($username === $db_admin_username && $password === $db_admin_password) {

    $_SESSION['adminUsername'] = $db_admin_username;

    echo
    "<script> 
    
    window.location.href='../backend/index.php';

    </script>";
} else {
    echo
    "<script> 
    
    alert('Wrong Credentials');
    window.location.href='../signin.php';

    </script>";
}

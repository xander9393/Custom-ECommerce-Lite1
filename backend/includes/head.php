<?php
include_once('../includes/db.php');
ob_start();
session_start();
if (!isset($_SESSION['adminUsername'])) {
    echo
    "<script> 
    
    window.location.href='../index.php';

    </script>";
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS</title>

    <!-- bootstrap -->
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">

    <!-- custom css -->
    <link rel="stylesheet" href="./assets/css/style.css">

    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
</head>
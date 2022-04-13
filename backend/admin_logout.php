<?php
session_start();
session_destroy();

$_SESSION['userName'] = null;
$_SESSION['userRole'] = null;
header("location: ../signin.php");

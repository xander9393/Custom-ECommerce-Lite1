<?php
error_reporting(0);
$con = mysqli_connect("localhost", "root", "", "custom_ecom");
if ($con) {
} else {
    die('Database Not Connected');
}
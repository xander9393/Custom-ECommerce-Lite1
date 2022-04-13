<?php
if (empty($_SESSION['customerEmail'])) {
    echo "<script> 
            alert ('Please Log In');
            window.location.href='modal.php';
            </script>";
}
// if (empty($_SESSION['cart'])) {
//     echo "<script> 
//     alert ('Cart is empty');
//     window.location.href='shop.php';
//     </script>";
// }

<?php
session_start();
if (isset($_SESSION['cart'])) {
    $checker = array_column($_SESSION['cart'], 'id');
    $checker1 = array_column($_SESSION['cart'], 'price');
    if (in_array($_POST['id_form'], $checker) && in_array($_POST['price_form'], $checker1)) {
        echo
        "<script>
        
     
        window.location.href='shop.php';

        </script>";
    } else {

        $count = count($_SESSION['cart']);
        $_SESSION['cart'][$count] = array('id' => $_POST['id_form'], 'img' => $_POST['image_form'], 'name' => $_POST['name_form'], 'color' => $_POST['color_form'], 'price' => $_POST['price_form'], 'quantity' => $_POST['quantity_form'], 'weight' => $_POST['weight_form']);
        echo
        "<script> 
    

        window.location.href='shop.php';

        </script>";
    }
} else {
    $_SESSION['cart'][0] = array('id' => $_POST['id_form'], 'img' => $_POST['image_form'], 'name' => $_POST['name_form'], 'color' => $_POST['color_form'], 'price' => $_POST['price_form'], 'quantity' => $_POST['quantity_form'], 'weight' => $_POST['weight_form']);
    echo
    "<script> 

    
    window.location.href='shop.php';

    </script>";
}

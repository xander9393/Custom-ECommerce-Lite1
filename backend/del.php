<?php
include 'includes/head.php';


$query = "SELECT * FROM tbl_item";
$data = mysqli_query($con, $query);

while ($row = mysqli_fetch_assoc($data)) {

    if (isset($_GET['del_id']) && ($_GET['img_id'])) {
        $img_id = $_GET['img_id'];
        $id = $_GET['del_id'];
        $sql = "DELETE FROM tbl_item_gallery WHERE id ='$id' AND img_id ='$img_id'";
        $result = mysqli_query($con, $sql);

        if ($result) {
            header("location: item_gallery.php?p_id=$img_id");
        }
    }

    if (isset($_GET['d_id']) && ($_GET['i_id'])) {
        $id = $_GET['d_id'];
        $item_id = $_GET['i_id'];
        $sql = "DELETE FROM tbl_variations WHERE id ='$id' AND item_id ='$item_id'";
        $result = mysqli_query($con, $sql);

        if ($result) {
            header("location: item_variation.php?p_id=$item_id");
        }
    }
}

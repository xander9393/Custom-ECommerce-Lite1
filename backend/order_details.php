<!DOCTYPE html>
<html lang="en">

<?php include 'includes/head.php' ?>

<body>
    <?php include 'includes/sidebar.php' ?>

    <?php include 'includes/topbar.php' ?>
    <section id="dashboard">

        <h1 class="welcome-text">Order Details Page</h1>

        <?php
        if (isset($_GET['d_id'])) {
            $d_id = $_GET['d_id'];
        }
        $sql = "SELECT * FROM orders WHERE id = '$d_id'";
        $query = mysqli_query($con, $sql);

        while ($row = mysqli_fetch_assoc($query)) {
            $id = $row['id'];
            $lastname = $row['lname'];
            $firstname = $row['fname'];
            $address = $row['address'];
            $city = $row['city'];
            $postalcode = $row['postal'];
            $region = $row['region'];
            $country = $row['country'];
            $phone = $row['phone'];
            $total = $row['total'];
        ?>
            <div>Name: <?php echo $lastname ?> <?php echo $firstname ?></div>
            <div>Address: <?php echo $address, " ", $city, " ", $postalcode, " ", $region, " ", $country ?></div>
            <div>Contact No. <?php echo $phone ?></div>
            <?php
            $slq2 = "SELECT * FROM order_details WHERE order_id = '$id'";
            $query2 = mysqli_query($con, $slq2);

            while ($value = mysqli_fetch_assoc($query2)) {
                $product_id = $value['product_id'];
                $quantity = $value['quantity'];
            ?>
                <?php
                $slq3 = "SELECT * FROM tbl_item WHERE id = '$product_id'";
                $query3 = mysqli_query($con, $slq3);

                while ($output = mysqli_fetch_assoc($query3)) {
                ?>
                    <div>Items: <?php echo $output['name'] ?> (<?php echo $output['color'] ?>) Qty: <?php echo $quantity ?> </div>
                <?php
                }
                ?>
            <?php
            }
            ?>
            <div>Total: &#8369; <?php echo number_format($total, 2)  ?></div>
        <?php
        }
        ?>




</body>

<?php include './includes/script.php' ?>

</html>
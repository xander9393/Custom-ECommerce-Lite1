<!DOCTYPE html>
<html lang="en">

<?php include 'includes/head.php' ?>

<body>
    <?php include 'includes/sidebar.php' ?>

    <?php include 'includes/topbar.php' ?>
    <section id="dashboard">

        <h1 class="welcome-text">Orders Page</h1>
        <a class="btn btn-info" href="export_orders.php">Export</a>
		


        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th style="width: 100px;">Order Date</th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th style="width: 300px;">Address</th>
                        <th>Phone no.</th>
                        <th>Mode of Payment</th>
                        <th style="width: 90px;">Total</th>
                        <th colspan="3">Order Status</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    if (isset($_GET['pageno'])) {
                        $pageno = $_GET['pageno'];
                    } else {
                        $pageno = 1;
                    }
                    $no_of_records_per_page = 8;
                    $offset = ($pageno - 1) * $no_of_records_per_page;


                    $total_pages_sql = "SELECT COUNT(*) FROM orders";
                    $result = mysqli_query($con, $total_pages_sql);
                    $total_rows = mysqli_fetch_array($result)[0];
                    $total_pages = ceil($total_rows / $no_of_records_per_page);

                    $sql = "SELECT * FROM orders ORDER BY order_date DESC LIMIT $offset, $no_of_records_per_page ";
                    $result = mysqli_query($con, $sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $lastname = $row['lname'];
                        $firstname = $row['fname'];
                        $address = $row['address'];
                        $city = $row['city'];
                        $postalcode = $row['postal'];
                        $region = $row['region'];
                        $country = $row['country'];
                        $phone = $row['phone'];
                        $payment_method = $row['payment_method'];
                        $total = $row['total'];
                        $date = $row['order_date'];
                        $status = $row['order_status'];

                    ?>
                        <tr>
                            <td><?php echo $date ?></td>
                            <td><?php echo $lastname ?></td>
                            <td><?php echo $firstname ?></td>
                            <td><?php echo $address, " ", $city, " ", $postalcode, " ", $region, " ", $country ?></td>
                            <td><?php echo $phone ?></td>
                            <td><?php echo $payment_method ?></td>
                            <td>&#8369; <?php echo number_format($total, 2) ?></td>
                            <td style="width: 90px;"><?php echo $status ?></td>
                            <td><a class="btn btn-warning" href="admin_order.php?shipped=<?php echo $id ?>"><span class="fas fa-shipping-fast"></span></a></td>
                            <td><a class="btn btn-success" href="admin_order.php?done=<?php echo $id ?>"><span class="fas fa-check"></span></a></td>
							  <td><a class="btn btn-danger" href="?delete=<?php echo $id ?>"><span class="fa fa-trash"></span></a></td>
                            <td><a class="btn btn-secondary" href="order_details.php?d_id=<?php echo $id ?>">View</a></td>

                        </tr>
                    <?php
                        if (isset($_GET['shipped'])) {
                            $done = $_GET['shipped'];
                            $sql_setTo_shipped = "UPDATE orders SET order_status = 'Shipped' WHERE id ='$done'";
                            $result = mysqli_query($con, $sql_setTo_shipped);

                            if ($result) {
                                header("location: admin_order.php");
                            }
                        }

                        if (isset($_GET['done'])) {
                            $cancel = $_GET['done'];
                            $sql_setTo_done = "UPDATE orders SET order_status = 'Done' WHERE id ='$cancel'";
                            $result = mysqli_query($con, $sql_setTo_done);

                            if ($result) {
                                header("location: admin_order.php");
                            }
                        }
                    }
					    

                    if (isset($_GET['delete'])) {
                        $del = $_GET['delete'];
                        $sql = "DELETE FROM orders WHERE id ='$del'";
                        $result = mysqli_query($con, $sql);

                        if ($result) {
                            echo "<script>window.location.href='admin_order.php'</script>";
                        } else {
                            echo "<script> alert('Please empty the VARIATIONS and GALLERY before deleting the item'); window.location.href='admin_products.php'</script>";
                        }
                    }
                    ?>					    
                </tbody>
            </table>
        </div>

        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-end">
                <li class="page-item <?php
                                        if ($pageno <= 1) {
                                            echo 'disabled';
                                        } ?>">
                    <a class="page-link" href="<?php
                                                if ($pageno > 1) {
                                                    echo "?pageno=" . ($pageno - 1);
                                                } ?>">Previous</a>
                </li>


                <?php

                for ($i = 1; $i <= $total_pages; $i++) {
                    if ($pageno == $i) {
                        $c = " active";
                    } else {
                        $c = "";
                    }
                    echo '<li class="page-item' . $c . '"><a class="page-link" href="?pageno=' . $i . '">' . $i . '</a></li>';
                }
                ?>

                <li class="page-item <?php if ($pageno >= $total_pages) {
                                            echo 'disabled';
                                        } ?>">
                    <a class="page-link" href="<?php if ($pageno < $total_pages) {
                                                    echo "?pageno=" . ($pageno + 1);
                                                } ?>">Next</a>
                </li>
            </ul>
        </nav>

    </section>

</body>

<?php include 'includes/script.php' ?>

</html>
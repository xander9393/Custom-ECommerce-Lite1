<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once 'includes/head.php' ?>
    <?php
    $query = "SELECT * FROM tbl_meta WHERE id = 9";
    $data = mysqli_query($con, $query);

    while ($row = mysqli_fetch_assoc($data)) {
    ?>
        <!-- meta tag -->
        <meta charset="UTF-8">
        <title><?php echo $row['meta_title_content'] ?></title>
        <meta name="title" content="<?php echo $row['meta_title_content'] ?>">
        <meta name="description" content="<?php echo $row['meta_description_content'] ?>">

        <meta property="og:type" content="website">
        <meta property="og:title" content="<?php echo $row['meta_title_content'] ?>">
        <meta property="og:description" content="<?php echo $row['meta_description_content'] ?>">
    <?php
    }
    ?>
</head>

<body>
    <a id="button"></a>

    <?php include 'includes/nav.php' ?>

    <section class="cart-section">
        <div class="container">
            <div class="cart-body">
                <div class="product-table">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Item</th>
                                <th scope="col">Color</th>
                                <th scope="col">Unit Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col" colspan="2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total = 0;
                            if (isset($_SESSION['cart'])) {
                                foreach ($_SESSION['cart'] as $key => $value) {
                                    $total = $total + $value['price'] * $value['quantity'];
                            ?>
                                    <tr>
                                        <td><img src="./assets/img/<?php echo $value['img'] ?>" alt="image" style="width: 50px;"></td>
                                        <td><?php echo $value['name'] ?></td>
                                        <td><?php echo $value['color'] ?></td>
                                        <td><span>&#8369;<?php echo number_format($value['price'], 2) ?></span></td>
                                        <td style="width: 100px;">
                                            <form action="update_cart_item.php" method="POST">
                                                <div class="num-block skin-2">
                                                    <div class="num-in">
                                                        <span class="minus dis"></span>
                                                        <input name="quantity" type="text" class="in-num" value="<?php echo $value['quantity'] ?>">
                                                        <span class="plus"></span>
                                                    </div>
                                                </div>
                                        </td>
                                        <td>
                                            <input type="submit" value="Update Item" name="btn_updatecartitem" class="btn btn-warning">
                                            <input type="hidden" name="item_name" value="<?php echo $value['id'] ?>">
                                            </form>
                                        </td>
                                        <td>
                                            <form action="delete_cart_item.php" method="POST">
                                                <input type="submit" value="Remove" name="btn_deletecartitem" class="btn btn-danger">
                                                <input type="hidden" name="item_name" value="<?php echo $value['name'] ?>">
                                            </form>
                                        </td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="total-price">
                    <h1>Cart total</h1>
                    <p>subtotal: <span>&#8369; <?php echo number_format($total, 2) ?></span> </p>
                    <input onclick="location.href='checkout.php'" type="button" value="Proceed to checkout" class="checkout-btn">
                </div>
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php' ?>
<?php include 'includes/script.php' ?>
</body>



</html>
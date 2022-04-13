<section class="contact-information">
    <div class="container">
        <div class="contact-information-content">

            <div class="contact-information-body">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item" aria-current="page"><a href="checkout.php">Information</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="checkout.php?step=shipping">Shipping</a></li>
                        <li class="breadcrumb-item active">Payment</li>
                    </ol>
                </nav>


                <!-- Set up a container element for the button -->

                <div id="paypal-button-container"></div>

            </div>

            <div class="side-cart">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Item</th>
                            <th scope="col">Color</th>
                            <th scope="col">Unit Price</th>
                            <th scope="col">Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $total = 0;
                        $total_weight = 0;
                        $shipping = 0;
                        $region = $_POST['region'];
                        if (isset($_SESSION['cart'])) {
                            foreach ($_SESSION['cart'] as $key => $value) {
                                $total = $total + $value['price'] * $value['quantity'];
                        ?>
                                <tr>
                                    <td><img src="./assets/img/<?php echo $value['img'] ?>" alt="image" style="width: 50px;"></td>
                                    <td><?php echo $value['name'] ?></td>
                                    <td><?php echo $value['color'] ?></td>
                                    <td><span>&#8369;<?php echo $value['price'] ?></span></td>
                                    <td><?php echo $value['quantity'] ?></td>
                                </tr>
                        <?php
                                if ($region === "Metro Manila" && $total_weight <= 3) {
                                    $shipping = 80;
                                } elseif ($region === "Metro Manila" && $total_weight <= 5) {
                                    $shipping = 100;
                                } elseif ($region === "Metro Manila" && $total_weight > 5) {
                                    $shipping = 120;
                                } elseif ($region !== "Metro Manila" && $total_weight <= 3) {
                                    $shipping = 140;
                                } elseif ($region !== "Metro Manila" && $total_weight <= 5) {
                                    $shipping = 170;
                                } elseif ($region !== "Metro Manila" && $total_weight > 5) {
                                    $shipping = 220;
                                }
                            }
                        }
                        ?>
                    </tbody>
                </table>
                <div class="calc">
                    <div class="pre-total">
                        <div class="sub-total">
                            <p class="cart-total-text">Subtotal: </p>
                            <p class="cart-total-number">&#8369; <?php echo number_format($total, 2) ?></p>
                        </div>
                        <div class="shipping">
                            <p class="cart-total-text">Shipping: </p>
                            <p class="cart-total-number">&#8369; <?php echo number_format($shipping, 2) ?></p>
                        </div>
                    </div>
                    <div class="total">
                        <p class="cart-total-text">Total: </p>
                        <p class="cart-total-number">&#8369; <?php echo number_format($total + $shipping, 2) ?></p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<?php
$customerID = $_SESSION['customerId'];

$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$address = $_POST['address'];
$city = $_POST['city'];
$postalcode = $_POST['postalcode'];
$region = $_POST['region'];
$country = $_POST['country'];
$phone = $_POST['phone'];
$total = $_POST['total'];
?>
<section class="contact-information">
    <div class="container">
        <div class="contact-information-content">

            <div class="cart-shipping-body">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item" aria-current="page"><a href="checkout.php">Information</a></li>
                        <li class="breadcrumb-item active">Shipping</li>
                        <li class="breadcrumb-item" aria-current="page">Payment</li>
                    </ol>
                </nav>
                <div class="cart-shipping-table">
                    <div class="cart-shipping-contact">
                        <div class="row-cart-shipping-table">Contact</div>
                        <div class="row-information"><?php echo $phone ?></div>
                        <div class="row-change-link"><a href="checkout.php">change</a></div>
                    </div>
                    <div class="cart-shipping-to">
                        <div class="row-cart-shipping-table">Ship to</div>
                        <div class="row-information"><?php echo $address ?> <?php echo $city ?> <?php echo $postalcode ?> <?php echo $region ?> <?php echo $country ?></div>
                        <div class="row-change-link"><a href="checkout.php">change</a></div>
            </div>
</div>
                <form action="handler/orderhandler.php" method="POST">
                    <input type="hidden" name="lastname" value="<?php echo $lastname ?>">
                    <input type="hidden" name="firstname" value="<?php echo $firstname ?>">
                    <input type="hidden" name="address" value="<?php echo $address ?>">
                    <input type="hidden" name="city" value="<?php echo $city ?>">
                    <input type="hidden" name="postalcode" value="<?php echo $postalcode ?>">
                    <input type="hidden" name="region" value="<?php echo $region ?>">
                    <input type="hidden" name="country" value="<?php echo $country ?>">
                    <input type="hidden" name="phone" value="<?php echo $phone ?>">

                    <div class="form-floating mb-3 mt-3">
                        <select class="form-select" id="payment" name="payment" aria-label="Floating label select example">
						 <option value="Paypal" selected>Pay by Paypal</option>
                            <option value="COD">Cash On Delivery</option>							
							 	<option value="Gcash">Gcash</option>	
									 							
 
                            <!-- <option value="Paypal">PayPal</option> -->
							  <!-- <option value="Gcash">Gcash</option> -->
                        </select>
                        <label for="payment">Payment Method</label>
                    </div>
                    <input type="submit" value="Proceed to payment" class="login-btn">

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
                        $final_total = 0;
                        if (isset($_SESSION['cart'])) {
                            foreach ($_SESSION['cart'] as $key => $value) {
                                $total = $total + $value['price'] * $value['quantity'];
                                $total_weight = $total_weight + $value['weight'] * $value['quantity'];
                        ?>
                                <tr>
                                    <td><img src="./assets/img/<?php echo $value['img'] ?>" alt="image" style="width: 50px;"></td>
                                    <td><?php echo $value['name'] ?></td>
                                    <td><?php echo $value['color'] ?></td>
                                    <td><span>&#8369;<?php echo number_format($value['price'], 2) ?></span></td>
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
                                $final_total = $total + $shipping;
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
                        <p class="cart-total-number">&#8369; <?php echo number_format($final_total, 2) ?></p>
                    </div>
                </div>
                <input type="hidden" name="total" value="<?php echo $final_total ?>">
                </form>

            </div>
        </div>
    </div>
</section>
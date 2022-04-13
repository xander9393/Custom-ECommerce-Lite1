<section class="contact-information">
    <div class="container">
        <div class="contact-information-content">

            <div class="contact-information-body">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">Information</li>
                        <li class="breadcrumb-item" aria-current="page">Shipping</li>
                        <li class="breadcrumb-item" aria-current="page">Payment</li>
                    </ol>
                </nav>
                <form action="checkout.php?step=shipping" method="POST">
                    <div class="row g-2">
                        <div class="col-md">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="name@example.com" required>
                                <label for="lastname">Last Name</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Password" required>
                                <label for="firstname">First Name</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="address" name="address" placeholder="name@example.com" required>
                        <label for="address">Address</label>
                    </div>
                    <div class="row g-2">
                        <div class="col-md">
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="postalcode" name="postalcode" placeholder="name@example.com" required>
                                <label for="postalcode">Postal code</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="city" name="city" placeholder="Password" required>
                                <label for="city">City</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" id="region" name="region" aria-label="Floating label select example" required>
                            <option value="Abra">Abra</option>
                            <option value="Agusan del Norte">Agusan del Norte</option>
                            <option value="Agusan del Sur">Agusan del Sur</option>
                            <option value="Aklan">Aklan</option>
                            <option value="Albay">Albay</option>
                            <option value="Antique">Antique</option>
                            <option value="Apayao">Apayao</option>
                            <option value="Aurora">Aurora</option>
                            <option value="Basilan">Basilan</option>
                            <option value="Bataan">Bataan</option>
                            <option value="Batanes">Batanes</option>
                            <option value="Batangas">Batangas</option>
                            <option value="Biliran">Biliran</option>
                            <option value="Benguet">Benguet</option>
                            <option value="Bohol">Bohol</option>
                            <option value="Bukidnon">Bukidnon</option>
                            <option value="Bulacan">Bulacan</option>
                            <option value="Cagayan">Cagayan</option>
                            <option value="Camarines Norte">Camarines Norte</option>
                            <option value="Camarines Sur">Camarines Sur</option>
                            <option value="Camiguin">Camiguin</option>
                            <option value="Capiz">Capiz</option>
                            <option value="Catanduanes">Catanduanes</option>
                            <option value="Cavite">Cavite</option>
                            <option value="Cebu">Cebu</option>
                            <option value="Compostela">Compostela</option>
                            <option value="Davao del Norte">Davao del Norte</option>
                            <option value="Davao del Sur">Davao del Sur</option>
                            <option value="Davao Oriental">Davao Oriental</option>
                            <option value="Eastern Samar">Eastern Samar</option>
                            <option value="Guimaras">Guimaras</option>
                            <option value="Ifugao">Ifugao</option>
                            <option value="Ilocos Norte">Ilocos Norte</option>
                            <option value="Ilocos Sur">Ilocos Sur</option>
                            <option value="Iloilo">Iloilo</option>
                            <option value="Isabela">Isabela</option>
                            <option value="Kalinga">Kalinga</option>
                            <option value="Laguna">Laguna</option>
                            <option value="Lanao del Norte">Lanao del Norte</option>
                            <option value="Lanao del Sur">Lanao del Sur</option>
                            <option value="La Union">La Union</option>
                            <option value="Leyte">Leyte</option>
                            <option value="Maguindanao">Maguindanao</option>
                            <option value="Marinduque">Marinduque</option>
                            <option value="Masbate">Masbate</option>
                            <option value="Metro Manila">Metro Manila</option>
                            <option value="Mindoro Occidental">Mindoro Occidental</option>
                            <option value="Mindoro Oriental">Mindoro Oriental</option>
                            <option value="Misamis Occidental">Misamis Occidental</option>
                            <option value="Misamis Oriental">Misamis Oriental</option>
                            <option value="Mountain Province">Mountain Province</option>
                            <option value="Negros Occidental">Negros Occidental</option>
                            <option value="Negros Oriental">Negros Oriental</option>
                            <option value="North Cotabato">North Cotabato</option>
                            <option value="Northern Samar">Northern Samar</option>
                            <option value="Nueva Ecija">Nueva Ecija</option>
                            <option value="Nueva Vizcaya">Nueva Vizcaya</option>
                            <option value="Palawan">Palawan</option>
                            <option value="Pampanga">Pampanga</option>
                            <option value="Pangasinan">Pangasinan</option>
                            <option value="Quezon">Quezon</option>
                            <option value="Quirino">Quirino</option>
                            <option value="Rizal">Rizal</option>
                            <option value="Romblon">Romblon</option>
                            <option value="Samar">Samar</option>
                            <option value="Sarangani">Sarangani</option>
                            <option value="Siquijor">Siquijor</option>
                            <option value="Sorsogon">Sorsogon</option>
                            <option value="South Cotabato">South Cotabato</option>
                            <option value="Southern Leyte">Southern Leyte</option>
                            <option value="Sultan Kudarat">Sultan Kudarat</option>
                            <option value="Sulu">Sulu</option>
                            <option value="Surigao del Norte">Surigao del Norte</option>
                            <option value="Surigao del Sur">Surigao del Sur</option>
                            <option value="Tarlac">Tarlac</option>
                            <option value="Tawi-Tawi">Tawi-Tawi</option>
                            <option value="Zambales">Zambales</option>
                            <option value="Zamboanga del Norte">Zamboanga del Norte</option>
                            <option value="Zamboanga del Sur">Zamboanga del Sur</option>
                            <option value="Zamboanga Sibugay">Zamboanga Sibugay</option>
                        </select>
                        <label for="region">Region</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" id="country" name="country" aria-label="Floating label select example" required>
                            <option selected value="Philippines">Philippines</option>
                        </select>
                        <label for="country">Country</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="form-select" class="form-control" id="phonenumber" name="phone" placeholder="Password" required>
                        <label for="phonenumber">Phone No.</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="checkbox" required>
                        <label class="form-check-label" for="checkbox">
                            I agree to the <a href="terms_of_service.php">terms of service </a>
                        </label>
                    </div>
                    <input type="hidden" name="total" value="<?php echo $total ?>">
                    <input type="submit" value="Proceed to shipping" class="login-btn">
                </form>
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
                        $shipping = 80;
                        if (isset($_SESSION['cart'])) {
                            foreach ($_SESSION['cart'] as $key => $value) {
                                $total = $total + $value['price'] * $value['quantity'];
                        ?>
                                <tr>
                                    <td><img src="./assets/img/<?php echo $value['img'] ?>" alt="image" style="width: 50px;"></td>
                                    <td><?php echo str_replace('_', ' ', $value['name']) ?></td>
                                    <td><?php echo $value['color'] ?></td>
                                    <td><span>&#8369;<?php echo number_format($value['price'], 2) ?></span></td>
                                    <td><?php echo $value['quantity'] ?></td>
                                </tr>
                        <?php
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
                            <p class="cart-total-number">Calculating...</p>
                        </div>
                    </div>
                    <div class="total">
                        <p class="cart-total-text">Total: </p>
                        <p class="cart-total-number">&#8369; <?php echo number_format($total, 2) ?></p>
                    </div>
                </div>



            </div>
        </div>
    </div>
</section>
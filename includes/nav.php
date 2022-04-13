<?php
$total = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $key => $value) {
        $total = $total + $value['price'] * $value['quantity'];
    }
}
?>
<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <?php
            $sql = "SELECT * FROM tbl_favicon WHERE id = 2";
            $query = mysqli_query($con, $sql);

            while ($data = mysqli_fetch_assoc($query)) {
                $nav_brand_img = $data['apple_touch_icon'];
                $footer_brand_img = $data['shortcut_icon'];;
            }
            ?>
            <img src="./assets/img/<?php echo $nav_brand_img ?>" alt="ad-astra-img" class="d-inline-block align-text-top">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
            <ul class="navbar-nav">
                 <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="shop.php">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="faq.php">FAQ'S</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <?php if (isset($_SESSION['customerEmail'])) {
                ?>
                    <li class="nav-item"><a class="nav-link"><i class="fas fa-user"> <?php echo $_SESSION['customerEmail'] ?></i></a></li>
                <?php
                } else {
                ?>
                    <li class="nav-item"><a class="nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-user"></i></a></li>
                <?php
                }
                ?>
                <li class="nav-item"><a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i> /<span class="peso-sign"> ₱ </span><?php echo number_format($total, 2) ?></a></li>
                <?php if (isset($_SESSION['customerEmail'])) {
                ?>
                    <li class="nav-item"><a class="nav-link" href="./handler/logout.php">Log Out</a></li>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>
</nav>

<section class="modal-section">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered signin-modal">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container">
                        <div class="sign-in-up">

                            <div class="sign-in">
                                <p class="modal-header">log in</p>
                                <form action="./handler/log_in.php" method="POST">
                                    <div class="mb-3">
                                        <label for="email1" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email1" name="form_customer_email" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password1" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password1" name="form_customer_password" required>
                                    </div>
                                    <input type="submit" value="Log in" class="login-btn">
                                </form>
                            </div>

                            <div class="sign-up">
                                <p class="modal-header">Register</p>
                                <form action="handler/register.php" method="POST">
                                    <div class="mb-3">
                                        <label for="email2" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email2" name="form_customer_email" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="reg-password1" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="reg-password1" name="form_customer_password1" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="reg-password2" class="form-label">Re Enter Password</label>
                                        <input type="password" class="form-control" id="reg-password2" name="form_customer_password2" required>
                                    </div>
                                    <p class="register-text">Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our <a href="privacy_policy.php">privacy policy</a>.</p>
                                    <input type="submit" value="Submit" class="register-btn">
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
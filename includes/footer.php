<footer class="footer">
    <div class="mainfooter-bg">
        <div class="container">
            <div class="mainfooter">
                <div class="col-brand">
                    <?php
                    $sql = "SELECT * FROM tbl_favicon WHERE id = 2";
                    $query = mysqli_query($con, $sql);

                    while ($data = mysqli_fetch_assoc($query)) {
                        $nav_brand_img = $data['apple_touch_icon'];
                        $footer_brand_img = $data['shortcut_icon'];
                    }
                    ?>
                    <a href="index.php"><img src="./assets/img/<?php echo $footer_brand_img ?>" alt=""></a>
                </div>
                <div class="col-subscribe">
                    <p class="footer-col-header">subscribe</p>
                    <p>Receive product news and updates in your inbox.</p>
                    <form action="./handler/subscribe.php" method="post">
                        <input type="email" class="email-input" placeholder="Email Address" name="subscribe_email_form" required>
                        <input type="submit" value="Submit" class="email-btn">
                    </form>
                </div>
                <div class="col-support">
                    <p class="footer-col-header">support</p>
                    <div class="col-support-divider">
                        <ul>
                            <li><a href="contact.php">Contact Support</a></li>
                            <li><a href="terms_of_service.php">Terms of Service</a></li>
                            <li><a href="returns.php">Returns</a></li>
                        </ul>
                        <ul>
                            <li><a href="faq.php">FAQ’s</a></li>
                            <li><a href="privacy_policy.php">Privacy Policy</a></li>
                            <li><a href="shipping_information.php">Shipping Information</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="subfooter-bg">
        <div class="container">
            <div class="subfooter">
                <p class="copyright">Copyright 2021 MyEcommerce PH All rights reserved</p>
                <p class="made-by">Powered by<a href="https://chimesconsulting.com/"> Chimes Consulting</a></p>
            </div>
        </div>
    </div>
</footer>
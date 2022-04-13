<!DOCTYPE html>
<html lang="en">

<?php include 'includes/head.php' ?>

<script>
    $(document).ready(function() {
        $("#staticBackdrop").modal('show');
    });
</script>

<body>
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
    <?php include 'includes/script.php' ?>
</body>



</html>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php' ?>

<body>
    <section class="admin-sign-in">
        <div class="sign-in-body">
            <div class="sign-in-icon">
                <span class="fas fa-user"></span>
            </div>
            <div class="sign-in-form">
                <form action="./handler/sign_in.php" method="post">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="username_form">
                        <label for="floatingInput">Username</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password_form">
                        <label for="floatingPassword">Password</label>
                    </div>
                    <button type="submit" class="btn btn-secondary sign-in-btn">Sign In</button>
                </form>
            </div>
        </div>

    </section>
    <?php include 'includes/script.php' ?>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<?php include 'includes/head.php' ?>

<body>
    <?php include 'includes/sidebar.php' ?>

    <?php include 'includes/topbar.php' ?>
    <section id="dashboard">

        <h1 class="welcome-text">Administrators</h1>
        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Administrator</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <?php
                    if (isset($_POST['btn_save'])) {

                        $user = $_POST['form_username'];
                        $pass = $_POST['form_password'];


                        $sql = "INSERT INTO admin (username,password) VALUE ('$user',MD5('$pass'))";

                        $result = mysqli_query($con, $sql);

                        if ($result) {
                            header("location: admin_user.php");
                        } else {
                            $failed_msg = "Error";
                            echo "<script type='text/javascript'>alert('$failed_msg');</script>";
                        }
                    }
                    ?>

                    <form method="post" enctype="multipart/form-data" method="post">
                        <div class="modal-body">

                            <div class="col-6">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="form_username">
                            </div>
                            <div class="col-6">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="form_password">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button class="btn btn-success" type="submit" name="btn_save">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM admin";
                    $result = mysqli_query($con, $sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $username = $row['username'];
                        $password = $row['password'];
                    ?>
                        <tr>
                            <td><?php echo $username ?></td>
                            <td><?php echo $password ?></td>
                            <td><a class="btn btn-danger" href="?delete=<?php echo $id ?>"><span class="fa fa-trash"></span></a></td>
                        </tr>
                    <?php
                    }

                    if (isset($_GET['delete'])) {
                        $del = $_GET['delete'];
                        $sql = "DELETE FROM admin WHERE id ='$del'";
                        $result = mysqli_query($con, $sql);

                        if ($result) {
                            header("location: admin_user.php");
                        }
                    }
                    ?>

                </tbody>
            </table>
        </div>

    </section>

</body>

<?php include 'includes/script.php' ?>

</html>
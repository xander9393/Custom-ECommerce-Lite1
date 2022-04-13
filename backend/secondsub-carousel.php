<!DOCTYPE html>
<html lang="en">

<?php include 'includes/head.php' ?>

<body>
    <?php include 'includes/sidebar.php' ?>

    <?php include 'includes/topbar.php' ?>
    <section id="dashboard">

        <h1 class="welcome-text">Second Sub Carousel</h1>
        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Image (450 x 300)</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <?php
                    if (isset($_POST['btn_save'])) {

                        $image = $_FILES['form_image']['name'];
                        $image_tmp = $_FILES['form_image']['tmp_name'];

                        $sql = "INSERT INTO carousel_3 (img) VALUE ('$image')";

                        $result = mysqli_query($con, $sql);

                        if ($result) {
                            header("location: Secondsub-carousel.php");
                            move_uploaded_file($image_tmp, "../assets/img/$image");
                        } else {
                            $failed_msg = "Error";
                            echo "<script type='text/javascript'>alert('$failed_msg');</script>";
                        }
                    }
                    ?>

                    <form method="post" enctype="multipart/form-data">
                        <div class="modal-body">

                            <div class="col-12">
                                <label for="inputGroupFile01" class="form-label">Image</label>
                                <input type="file" class="form-control" id="inputGroupFile01" name="form_image">
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
                        <th>Image</th>
                        <th>Operation</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM carousel_3";
                    $result = mysqli_query($con, $sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                        $carousel_img = $row['img'];
                    ?>
                        <tr>
                            <td><img src="../assets/img/<?php echo $carousel_img ?>" width="100" height="100" alt=""></td>
                            <td><a class="btn btn-danger" href="?delete=<?php echo $row['id'] ?>"><span class="fa fa-trash"></span></a></td>
                        </tr>
                    <?php
                    }

                    if (isset($_GET['delete'])) {
                        $del = $_GET['delete'];
                        $sql = "DELETE FROM carousel_3 WHERE id ='$del'";
                        $result = mysqli_query($con, $sql);

                        if ($result) {
                            header("location: secondsub-carousel.php");
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
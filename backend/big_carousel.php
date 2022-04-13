<!DOCTYPE html>
<html lang="en">

<?php include 'includes/head.php' ?>

<body>
    <?php include 'includes/sidebar.php' ?>

    <?php include 'includes/topbar.php' ?>
    <section id="dashboard">

        <h1 class="welcome-text">Main Carousel</h1>
        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Image (1200 x 600)</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <?php
                    if (isset($_POST['btn_save'])) {

                        $header = $_POST['form_header'];
                        $sub_header = $_POST['form_sub_header'];
                        $btn_name = $_POST['form_button_name'];
                        $btn_link = $_POST['form_link'];
                        $image = $_FILES['form_image']['name'];
                        $image_tmp = $_FILES['form_image']['tmp_name'];

                        $sql = "INSERT INTO carousel_1 (img,header,sub_header,btn_name,btn_link) VALUE ('$image','$header','$sub_header','$btn_name','$btn_link')";

                        $result = mysqli_query($con, $sql);

                        if ($result) {
                            header("location: big_carousel.php");
                            move_uploaded_file($image_tmp, "../assets/img/$image");
                        } else {
                            $failed_msg = "Error";
                            echo "<script type='text/javascript'>alert('$failed_msg');</script>";
                        }
                    }
                    ?>

                    <div class="modal-body">
                        <form class="row g-3" method="post" enctype="multipart/form-data">
                            <div class="col-12">
                                <label for="inputGroupFile01" class="form-label">Image</label>
                                <input type="file" class="form-control" id="inputGroupFile01" name="form_image">
                            </div>
                            <div class="col-md-6">
                                <label for="header" class="form-label">Header</label>
                                <input type="text" class="form-control" id="header" name="form_header">
                            </div>
                            <div class="col-md-6">
                                <label for="sub-header" class="form-label">Sub Header</label>
                                <input type="text" class="form-control" id="sub-header" name="form_sub_header">
                            </div>
                            <div class="col-md-6">
                                <label for="button" class="form-label">Button Name</label>
                                <input type="text" class="form-control" id="button" name="form_button_name">
                            </div>
                            <div class="col-md-6">
                                <label for="link" class="form-label">Button Link</label>
                                <input type="text" class="form-control" id="link" name="form_link">
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
                        <th>Header</th>
                        <th>Sub Header</th>
                        <th>Button Name</th>
                        <th>Button Link</th>
                        <th colspan="2">Operation</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM carousel_1";
                    $result = mysqli_query($con, $sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                        $header = $row['header'];
                        $sub_header = $row['sub_header'];
                        $btn_name = $row['btn_name'];
                        $btn_link = $row['btn_link'];
                        $img = $row['img'];
                    ?>
                        <tr>
                            <td><img src="../assets/img/<?php echo $img ?>" width="100" height="100" alt=""></td>
                            <td><?php echo $header ?></td>
                            <td><?php echo $sub_header ?></td>
                            <td><?php echo $btn_name ?></td>
                            <td><?php echo $btn_link ?></td>
                            <td><a class="btn btn-success" href="edit_big_carousel.php?b_id=<?php echo $row['id'] ?>"><span class="fa fa-edit"></span></a></td>
                            <td><a class="btn btn-danger" href="?delete=<?php echo $row['id'] ?>"><span class="fa fa-trash"></span></a></td>
                        </tr>
                    <?php
                    }

                    if (isset($_GET['delete'])) {
                        $del = $_GET['delete'];
                        $sql = "DELETE FROM carousel_1 WHERE id ='$del'";
                        $result = mysqli_query($con, $sql);

                        if ($result) {
                            header("location: big_carousel.php");
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
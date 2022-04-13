<!DOCTYPE html>
<html lang="en">

<?php include 'includes/head.php' ?>

<body>
    <?php include 'includes/sidebar.php' ?>

    <?php include 'includes/topbar.php' ?>
    <section id="dashboard">
        <?php
        if (isset($_GET['p_id'])) {
            $id = $_GET['p_id'];
            $sql = "SELECT * FROM tbl_item WHERE id ='$id'";
            $result = mysqli_query($con, $sql);

            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $name = $row['name'];
                $color = $row['color'];
            }
        }

        if (isset($_POST['btn_save'])) {

            $img_id = $_POST['form_id'];

            $img = $_FILES['form_image']['name'];
            $item_temp = $_FILES['form_image']['tmp_name'];

            $sql = "INSERT INTO tbl_item_gallery (img_id ,img) VALUE ('$img_id','$img')";

            $result = mysqli_query($con, $sql);

            if ($result) {
                move_uploaded_file($item_temp, "../assets/img/$img");
                header("location: item_gallery.php?p_id=$id");
            } else {
                echo "Query Failed";
            }
        }
        ?>

        <h1 class="welcome-text">Item Gallery for <?php echo $name ?> <?php echo $color ?></h1>
        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add Image
        </button>
For best image display the recommended image dimensions should be at 600 by 600 pixels!
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Gallery Image</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form class="row g-3" method="POST" enctype="multipart/form-data">

                            <input class="form-control" type="hidden" name="form_id" value="<?php echo $id ?> ">
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
                    $sql = "SELECT tbl_item_gallery.id, tbl_item_gallery.img_id, tbl_item_gallery.img FROM tbl_item RIGHT JOIN tbl_item_gallery ON tbl_item.id = tbl_item_gallery.img_id WHERE tbl_item_gallery.img_id = $id ";
                    $result = mysqli_query($con, $sql);

                    while ($row = mysqli_fetch_assoc($result)) {

                    ?>
                        <tr>
                            <td><img width="100" height="100" src="../assets/img/<?php echo $row['img'] ?>"></td>
                            <td><a class="btn btn-danger" href="del.php?del_id=<?php echo $row['id'] ?>&img_id=<?php echo $row['img_id'] ?>"><span class="fa fa-trash"></span></a></td>
                        </tr>
                    <?php

                    }

                    ?>

                </tbody>
            </table>
        </div>

    </section>

</body>

<?php include 'includes/script.php' ?>

</html>
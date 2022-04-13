<!DOCTYPE html>
<html lang="en">

<?php include 'includes/head.php' ?>

<body>
    <?php include 'includes/sidebar.php' ?>

    <?php include 'includes/topbar.php' ?>
    <section id="dashboard">

        <h1 class="welcome-text">Categories</h1>
        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <?php
                    if (isset($_POST['btn_save'])) {

                        $category = $_POST['form_category'];


                        $sql = "INSERT INTO category (name) VALUE ('$category')";

                        $result = mysqli_query($con, $sql);

                        if ($result) {
                            header("location: category.php");
                        } else {
                            $failed_msg = "Error";
                            echo "<script type='text/javascript'>alert('$failed_msg');</script>";
                        }
                    }
                    ?>

                    <form method="post" enctype="multipart/form-data">
                        <div class="modal-body">

                            <div class="col-12">
                                <label for="inputGroupFile01" class="form-label">Category</label>
                                <input type="text" class="form-control" id="inputGroupFile01" name="form_category">
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
                        <th>Category</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM category";
                    $result = mysqli_query($con, $sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $name = $row['name'];
                    ?>
                        <tr>
                            <td><?php echo $name ?></td>
                            <td><a class="btn btn-success" href="edit_category.php?c_id=<?php echo $id ?>"><span class="fa fa-edit"></span></a></td>
                            <td><a class="btn btn-danger" href="?delete=<?php echo $id ?>"><span class="fa fa-trash"></span></a></td>
                        </tr>
                    <?php
                    }

                    if (isset($_GET['delete'])) {
                        $del = $_GET['delete'];
                        $sql = "DELETE FROM category WHERE id ='$del'";
                        $result = mysqli_query($con, $sql);

                        if ($result) {
                            header("location: category.php");
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
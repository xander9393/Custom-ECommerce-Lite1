<!DOCTYPE html>
<html lang="en">

<?php include 'includes/head.php' ?>

<body>
    <?php include 'includes/sidebar.php' ?>

    <?php include 'includes/topbar.php' ?>
    <section id="dashboard">

        <h1 class="welcome-text">FAQ's Page</h1>
        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add FAQ</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <?php
                    if (isset($_POST['btn_save'])) {

                        $faq_title = $_POST['form_faq_title'];
                        $faq_content = $_POST['form_faq_content'];

                        $sql = "INSERT INTO tbl_faq (title,content) VALUE ('$faq_title','$faq_content')";

                        $result = mysqli_query($con, $sql);

                        if ($result) {
                            header("location: admin_faq.php");
                        } else {
                            $failed_msg = "Error";
                            echo "<script type='text/javascript'>alert('$failed_msg');</script>";
                        }
                    }
                    ?>

                    <form method="post" enctype="multipart/form-data">
                        <div class="modal-body">

                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="form_faq_title">
                            </div>

                            <div class="mb-3">
                                <textarea class="editor" name="form_faq_content"></textarea>
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
                        <th>Header</th>
                        <th style="width: 75%;">Sub Header</th>
                        <th colspan="2">Operation</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM tbl_faq";
                    $result = mysqli_query($con, $sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                        $faq_title = $row['title'];
                        $faq_content = $row['content'];
                    ?>
                        <tr>
                            <td><?php echo $faq_title ?></td>
                            <td><?php echo $faq_content ?></td>
                            <td><a class="btn btn-success" href="edit_faq.php?f_id=<?php echo $row['id'] ?>"><span class="fa fa-edit"></span></a></td>
                            <td><a class="btn btn-danger" href="?delete=<?php echo $row['id'] ?>"><span class="fa fa-trash"></span></a></td>
                        </tr>
                    <?php
                    }

                    if (isset($_GET['delete'])) {
                        $del = $_GET['delete'];
                        $sql = "DELETE FROM tbl_faq WHERE id ='$del'";
                        $result = mysqli_query($con, $sql);

                        if ($result) {
                            header("location: admin_faq.php");
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
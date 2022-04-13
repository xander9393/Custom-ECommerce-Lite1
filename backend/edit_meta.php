<!DOCTYPE html>
<html lang="en">

<?php include 'includes/head.php' ?>

<body>
    <?php include 'includes/sidebar.php' ?>

    <?php include 'includes/topbar.php' ?>
    <section id="dashboard">

        <h1 class="welcome-text">Edit Meta Tag</h1>

        <?php
        // show content
        if (isset($_GET['m_id'])) {
            $id = $_GET['m_id'];
            $sql = "SELECT * FROM tbl_meta WHERE id ='$id'";
            $data = mysqli_query($con, $sql);

            while ($row = mysqli_fetch_assoc($data)) {
                $title = $row['meta_title_content'];
                $description = $row['meta_description_content'];
            }
        }

        // edit
        if (isset($_POST['btn_save'])) {

            $edit_title = $_POST['form_title'];
            $edit_description = $_POST['form_description'];

            $sql = "UPDATE tbl_meta SET meta_title_content='$edit_title',meta_description_content='$edit_description' WHERE id ='$id'";

            $result = mysqli_query($con, $sql);

            if ($result) {
                header("location: admin_meta.php");
            } else {
                $failed_msg = "Error";
                echo "<script type='text/javascript'>alert('$failed_msg');</script>";
            }
        }


        ?>
        <form action="" method="post">
            <div class="col-12 mb-3">
                <label for="inputGroupFile01" class="form-label">Title</label>
                <input type="text" class="form-control" id="inputGroupFile01" name="form_title" value="<?php echo $title ?>">
            </div>
            <div class="col-12 mb-3">
                <label for="inputGroupFile01" class="form-label">Description</label>
                <textarea type="text" class="form-control" id="inputGroupFile01" name="form_description" rows="5"><?php echo $description ?></textarea>
            </div>

            <button class="btn btn-success" type="submit" name="btn_save">Save</button>
        </form>

    </section>

</body>

<?php include 'includes/script.php' ?>

</html>
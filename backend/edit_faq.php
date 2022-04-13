<!DOCTYPE html>
<html lang="en">

<?php include 'includes/head.php' ?>

<body>
    <?php include 'includes/sidebar.php' ?>

    <?php include 'includes/topbar.php' ?>
    <section id="dashboard">


        <?php
        // show content
        if (isset($_GET['f_id'])) {
            $faq_id = $_GET['f_id'];
            $sql = "SELECT * FROM tbl_faq WHERE id ='$faq_id'";
            $data = mysqli_query($con, $sql);

            while ($row = mysqli_fetch_assoc($data)) {
                $faq_title = $row['title'];
                $faq_content = $row['content'];
            }
        }

        // edit
        if (isset($_POST['btn_save'])) {

            $edit_faq_title = $_POST['form_faq_title'];
            $edit_faq_content = $_POST['form_faq_content'];

            $sql = "UPDATE tbl_faq SET title='$edit_faq_title',content='$edit_faq_content' WHERE id ='$faq_id'";

            $result = mysqli_query($con, $sql);

            if ($result) {
                header("location: admin_faq.php");
                $success_msg = "Changes Saved";
                echo "<script type='text/javascript'>alert('$success_msg');</script>";
            } else {
                $failed_msg = "Error";
                echo "<script type='text/javascript'>alert('$failed_msg');</script>";
            }
        }


        ?>
        <h1 class="welcome-text">FAQ's Page</h1>

        <form method="post" enctype="multipart/form-data">

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="form_faq_title" value="<?php echo $faq_title ?>">
            </div>

            <div class="mb-3">
                <textarea class="editor" name="form_faq_content"><?php echo $faq_content ?></textarea>
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-success" type="submit" name="btn_save">Save</button>
            </div>

        </form>

    </section>

</body>

<?php include './includes/script.php' ?>

</html>
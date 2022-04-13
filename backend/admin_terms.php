<!DOCTYPE html>
<html lang="en">

<?php include 'includes/head.php' ?>

<body>
    <?php include 'includes/sidebar.php' ?>

    <?php include 'includes/topbar.php' ?>
    <section id="dashboard">

        <?php
        // show content
        $sql = "SELECT * FROM tbl_terms WHERE id = 1 ";
        $data = mysqli_query($con, $sql);

        while ($row = mysqli_fetch_assoc($data)) {
            $terms_content = $row['content'];
        }

        if (isset($_POST['btn_save'])) {

            $edit_terms_content = $_POST['form_terms_content'];

            $sql = "UPDATE tbl_terms SET content='$edit_terms_content'";

            $result = mysqli_query($con, $sql);

            if ($result) {
                header("location: admin_terms.php");
                $success_msg = "Changes Saved";
                echo "<script type='text/javascript'>alert('$success_msg');</script>";
            } else {
                $failed_msg = "Error";
                echo "<script type='text/javascript'>alert('$failed_msg');</script>";
            }
        }

        ?>
        <h1 class="welcome-text">Terms of Service Page</h1>

        <form action="" method="post">

            <div class="mb-3">
                <textarea class="editor" name="form_terms_content"><?php echo $terms_content ?></textarea>
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-success" type="submit" name="btn_save">Save</button>
            </div>
        </form>

    </section>

</body>

<?php include 'includes/script.php' ?>

</html>
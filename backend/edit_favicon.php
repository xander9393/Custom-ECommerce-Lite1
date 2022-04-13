<!DOCTYPE html>
<html lang="en">

<?php include 'includes/head.php' ?>

<body>
    <?php include 'includes/sidebar.php' ?>

    <?php include 'includes/topbar.php' ?>
    <section id="dashboard">

        <h1 class="welcome-text">Edit favicon</h1>

        <?php
        // show content
        if (isset($_GET['f_id'])) {
            $id = $_GET['f_id'];
            $sql = "SELECT * FROM tbl_favicon WHERE id ='$id'";
            $data = mysqli_query($con, $sql);

            while ($row = mysqli_fetch_assoc($data)) {
                $id = $row['id'];
                $apple_icon = $row['apple_touch_icon'];
                $shortcut_icon = $row['shortcut_icon'];
            }
        }

        // edit
        if (isset($_POST['btn_save'])) {

            $edit_apple_icon = $_FILES['form_apple']['name'];
            $edit_apple_icon_temp = $_FILES['form_apple']['tmp_name'];

            $edit_shortcut_icon = $_FILES['form_shortcut']['name'];
            $edit_shortcut_icon_temp = $_FILES['form_shortcut']['tmp_name'];

            if (empty($edit_apple_icon || $edit_shortcut_icon)) {
                $query = "SELECT * FROM tbl_favicon WHERE id ='$id'";
                $result = mysqli_query($con, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    $edit_apple_icon = $row['apple_touch_icon'];
                    $edit_shortcut_icon = $row['shortcut_icon'];
                }
            }

            $sql = "UPDATE tbl_favicon SET apple_touch_icon='$edit_apple_icon',shortcut_icon='$edit_shortcut_icon' WHERE id ='$id'";

            $result = mysqli_query($con, $sql);

            if ($result) {
                header("location: admin_favicon.php");
                move_uploaded_file($edit_apple_icon_temp, "../assets/img/favicon/$edit_apple_icon");
                move_uploaded_file($edit_shortcut_icon_temp, "../assets/img/favicon/$edit_shortcut_icon");
            } else {
                echo
                "<script> 
            
                alert('Error');
                window.location.href='admin_favicon.php';
        
                </script>";
            }
        }


        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="col-12">
                <label for="appleIcon" class="form-label">Apple Touch Icon</label>
                <img width="90" height="90" alt="<?php echo $apple_icon ?>" src="../assets/img/favicon/<?php echo $apple_icon ?>">
                <input type="file" class="form-control" id="appleIcon" name="form_apple">
            </div>
            <div class="col-12 mb-3">
                <label for="shortcutIcon" class="form-label">Shortcut Icon</label>
                <img width="90" height="90" alt="<?php echo $shortcut_icon ?>" src="../assets/img/favicon/<?php echo $shortcut_icon ?>">
                <input type="file" class="form-control" id="shortcutIcon" name="form_shortcut">
            </div>
            <button class="btn btn-success" type="submit" name="btn_save">Save</button>
        </form>

    </section>

</body>

<?php include 'includes/script.php' ?>

</html>
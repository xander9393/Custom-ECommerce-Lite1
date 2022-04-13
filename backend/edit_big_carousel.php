<!DOCTYPE html>
<html lang="en">

<?php include 'includes/head.php' ?>

<body>
    <?php include 'includes/sidebar.php' ?>

    <?php include 'includes/topbar.php' ?>
    <section id="dashboard">


        <?php
        // show content
        if (isset($_GET['b_id'])) {
            $id = $_GET['b_id'];
            $sql = "SELECT * FROM carousel_1 WHERE id ='$id'";
            $data = mysqli_query($con, $sql);

            while ($row = mysqli_fetch_assoc($data)) {
                $header = $row['header'];
                $sub_header = $row['sub_header'];
                $btn_name = $row['btn_name'];
                $btn_link = $row['btn_link'];
                $img = $row['img'];
            }
        }

        // edit
        if (isset($_POST['btn_save'])) {

            $edit_header = $_POST['form_header'];
            $edit_sub_header = $_POST['form_sub_header'];
            $edit_btn_name = $_POST['form_button_name'];
            $edit_btn_link = $_POST['form_link'];

            $edit_image = $_FILES['form_image']['name'];
            $edit_image_tmp = $_FILES['form_image']['tmp_name'];

            if (empty($edit_image)) {
                $query = "SELECT * FROM carousel_1 WHERE id ='$id'";
                $result = mysqli_query($con, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    $edit_image = $row['img'];
                }
            }

            $sql = "UPDATE carousel_1 SET header='$edit_header',sub_header='$edit_sub_header',btn_name='$edit_btn_name',btn_link='$edit_btn_link',img='$edit_image' WHERE id ='$id'";

            $result = mysqli_query($con, $sql);

            if ($result) {
                header("location: big_carousel.php");
                move_uploaded_file($edit_image_tmp, "../assets/img/$edit_image");
            } else {
                echo
                "<script> 
            
                alert('Error');
                window.location.href='edit_big_carousel.php';
        
                </script>";
            }
        }


        ?>
        <h1 class="welcome-text">Edit Product Page</h1>

        <form class="row g-3" method="post" enctype="multipart/form-data">


            <div class="col-md-6">
                <label for="header" class="form-label">Header</label>
                <input type="text" class="form-control" id="header" name="form_header" value="<?php echo $header ?>">
            </div>
            <div class="col-md-6">
                <label for="sub-header" class="form-label">Sub Header</label>
                <input type="text" class="form-control" id="sub-header" name="form_sub_header" value="<?php echo $sub_header ?>">
            </div>
            <div class="col-md-6">
                <label for="button" class="form-label">Button Name</label>
                <input type="text" class="form-control" id="button" name="form_button_name" value="<?php echo $btn_name ?>">
            </div>
            <div class="col-md-6">
                <label for="link" class="form-label">Button Link</label>
                <input type="text" class="form-control" id="link" name="form_link" value="<?php echo $btn_link ?>">
            </div>
            <div class="col-12">
                <label for="inputGroupFile01" class="form-label">Image</label>
                <img width="90" height="90" alt="<?php echo $img ?>" src="..//..//assets/img/<?php echo $img ?>">
                <input type="file" class="form-control" id="inputGroupFile01" name="form_image" value="<?php echo $img ?>">
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-success" type="submit" name="btn_save">Save</button>
            </div>
        </form>

    </section>

</body>

<?php include './includes/script.php' ?>

</html>
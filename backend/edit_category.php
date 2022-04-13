<!DOCTYPE html>
<html lang="en">

<?php include 'includes/head.php' ?>

<body>
    <?php include 'includes/sidebar.php' ?>

    <?php include 'includes/topbar.php' ?>
    <section id="dashboard">

        <h1 class="welcome-text">Edit Category</h1>

        <?php
        // show content
        if (isset($_GET['c_id'])) {
            $id = $_GET['c_id'];
            $sql = "SELECT * FROM category WHERE id ='$id'";
            $data = mysqli_query($con, $sql);

            while ($row = mysqli_fetch_assoc($data)) {

                $name = $row['name'];
            }
        }

        // edit
        if (isset($_POST['btn_save'])) {

            $category = $_POST['form_category'];

            $sql = "UPDATE category SET name='$category' WHERE id ='$id'";

            $result = mysqli_query($con, $sql);

            if ($result) {
                header("location: category.php");
            } else {
                $failed_msg = "Error";
                echo "<script type='text/javascript'>alert('$failed_msg');</script>";
            }
        }


        ?>
        <form action="" method="post">
            <div class="col-4 mb-3">
                <label for="inputGroupFile01" class="form-label">Category</label>
                <input type="text" class="form-control" id="inputGroupFile01" name="form_category" value="<?php echo $name ?>">
            </div>

            <button class="btn btn-success" type="submit" name="btn_save">Save</button>
        </form>

    </section>

</body>

<?php include 'includes/script.php' ?>

</html>
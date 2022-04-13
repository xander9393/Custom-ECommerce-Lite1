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

            $id = $_POST['form_id'];
            $input_size = $_POST['form_size'];
            $inpt_price = $_POST['form_price'];

            $sql = "INSERT INTO tbl_variations (item_id, size, price) VALUE ('$id','$input_size','$inpt_price')";

            $result = mysqli_query($con, $sql);

            if ($result) {
                header("location: item_variation.php?p_id=$id");
            } else {
                echo "Query Failed";
            }
        }
        ?>

        <h1 class="welcome-text">Item Variations for <?php echo $name ?> <?php echo $color ?></h1>
        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add Variation
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Variation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form class="row g-3" method="POST" enctype="multipart/form-data">

                            <input class="form-control" type="hidden" name="form_id" value="<?php echo $id ?> ">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="input_size" class="form-label">Size</label>
                                    <input type="text" class="form-control" id="input_size" name="form_size">
                                </div>
                                <div class="col-md-6">
                                    <label for="input_price" class="form-label">Price</label>
                                    <input type="number" class="form-control" id="input_price" name="form_price">
                                </div>
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
                        <th>Size</th>
                        <th>Price</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT tbl_variations.id, tbl_variations.item_id, tbl_variations.size, tbl_variations.price FROM tbl_item RIGHT JOIN tbl_variations ON tbl_item.id = tbl_variations.item_id WHERE tbl_variations.item_id = $id ";
                    $result = mysqli_query($con, $sql);

                    while ($row = mysqli_fetch_assoc($result)) {

                    ?>
                        <tr>
                            <td><?php echo $row['size'] ?></td>
                            <td><?php echo number_format($row['price'], 2) ?></td>

                            <td><a class="btn btn-danger" href="del.php?d_id=<?php echo $row['id'] ?>&i_id=<?php echo $row['item_id'] ?>"><span class="fa fa-trash"></span></a></td>
                        </tr>
                    <?php

                    }

                    ?>

                </tbody>
            </table>
        </div>

    </section>




</body>

<?php include './includes/script.php' ?>

</html>
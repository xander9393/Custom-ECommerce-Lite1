<!DOCTYPE html>
<html lang="en">

<?php include 'includes/head.php' ?>

<body>
    <?php include 'includes/sidebar.php' ?>

    <?php include 'includes/topbar.php' ?>
    <section id="dashboard">

        <h1 class="welcome-text">Product Page</h1>
        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <?php
                    if (isset($_POST['btn_save'])) {
                        $name = $_POST['form_name'];
                        $collection = $_POST['form_collection'];

                        $category = $_POST['form_category'];

                        $color = $_POST['form_color'];
                        $weight = $_POST['form_weight'];
                        $featured = $_POST['form_featured'];

                        $image = $_FILES['form_image']['name'];
                        $image_tmp = $_FILES['form_image']['tmp_name'];

                        $hover_image = $_FILES['form_hover_image']['name'];
                        $hover_image_temp = $_FILES['form_hover_image']['tmp_name'];

                        if (empty($image || $hover_image)) {
                            $query = "SELECT * FROM tbl_item WHERE id ='$id'";
                            $result = mysqli_query($con, $query);

                            while ($row = mysqli_fetch_assoc($result)) {
                                $image = $row['img'];
                                $hover_image = $row['hover_img'];
                            }
                        }

                        $sql = "INSERT INTO tbl_item (name,collection,category_id,color,img,hover_img,date,featured,weight) VALUE ('$name','$collection','$category','$color','$image','$hover_image',now(),'$featured','$weight')";

                        $result = mysqli_query($con, $sql);

                        if ($result) {
                            header("location: admin_products.php");
                            move_uploaded_file($image_tmp, "../assets/img/$image");
                            move_uploaded_file($hover_image_temp, "../assets/img/$hover_image");
                        } else {
                            $failed_msg = "Error";
                            echo "<script type='text/javascript'>alert('$failed_msg');</script>";
                        }
                    }
                    ?>

                    <div class="modal-body">
                        <form class="row g-3" method="post" enctype="multipart/form-data">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Product Name</label>
                                <input type="text" class="form-control" id="name" name="form_name">
                            </div>
                            <div class="col-md-6">
                                <label for="collection" class="form-label">Collection Name</label>
                                <input type="text" class="form-control" id="collection" name="form_collection">
                            </div>

                            <div class="col-md-4">
                                <label for="category" class="form-label">Category</label>
                                <select id="category" class="form-select" name="form_category">
                                    <?php
                                    $query = "SELECT * FROM category";
                                    $data = mysqli_query($con, $query);

                                    while ($value = mysqli_fetch_assoc($data)) {
                                    ?>
                                        <option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
                                    <?php
                                    }
                                    ?>

                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="color" class="form-label">Color</label>
                                <input type="text" class="form-control" id="color" name="form_color">
                            </div>
                            <div class="col-md-4">
                                <label for="weight" class="form-label">Weight (kg)</label>
                                <input type="number" class="form-control" id="weight" step=".01" name="form_weight">
                            </div>
                            <div class="col-md-4">
                                <label for="inputZip" class="form-label">Featured item</label>
                                <select id="category" class="form-select" name="form_featured">
                                    <option value="no">--- Select One ---</option>
                                    <option value="yes">yes</option>
                                    <option value="no">no</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                            </div>
                            <div class="col-12">
                                <label for="inputGroupFile01" class="form-label">Image</label>
                                <input type="file" class="form-control" id="inputGroupFile01" name="form_image">
                            </div>
                            <div class="col-12">
                                <label for="inputGroupFile01" class="form-label">Hover Image</label>
                                <input type="file" class="form-control" id="inputGroupFile01" name="form_hover_image">
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
                        <th>Name</th>
                        <th>Color</th>
                        <th>Collection</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>hovered_img</th>
                        <th>Featured</th>
                        <th>Variation</th>
                        <th>Gallery</th>
                        <th colspan="2">Operation</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    if (isset($_GET['pageno'])) {
                        $pageno = $_GET['pageno'];
                    } else {
                        $pageno = 1;
                    }
                    $no_of_records_per_page = 8;
                    $offset = ($pageno - 1) * $no_of_records_per_page;


                    $total_pages_sql = "SELECT COUNT(*) FROM tbl_item";
                    $result = mysqli_query($con, $total_pages_sql);
                    $total_rows = mysqli_fetch_array($result)[0];
                    $total_pages = ceil($total_rows / $no_of_records_per_page);

                    $sql = "SELECT * FROM tbl_item ORDER BY date DESC LIMIT $offset, $no_of_records_per_page ";
                    $result = mysqli_query($con, $sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                        $product_id = $row['id'];
                        $product_name = $row['name'];
                        $product_color = $row['color'];
                        $product_collection = $row['collection'];
                        $product_category = $row['category_id'];
                        $product_img = $row['img'];
                        $product_hover_img = $row['hover_img'];
                        $featured = $row['featured'];
                    ?>
                        <tr>
                            <td class="test"><?php echo $product_name ?></td>
                            <td><?php echo $product_color ?></td>
                            <td><?php echo $product_collection ?></td>

                            <?php
                            $query = "SELECT * FROM category WHERE id = '$product_category'";
                            $data = mysqli_query($con, $query);

                            while ($value = mysqli_fetch_assoc($data)) {
                            ?>
                                <td><?php echo $value['name'] ?></td>
                            <?php
                            }
                            ?>
                            <td><img src="../assets/img/<?php echo $product_img ?>" width="50" height="50" alt=""></td>
                            <td><img src="../assets/img/<?php echo $product_hover_img ?>" width="50" height="50" alt=""></td>
                            <td><?php echo $featured ?></td>
                            <td><a class="btn btn-secondary" href="item_variation.php?p_id=<?php echo $product_id ?>"><span class="fas fa-dollar-sign"></span></a></td>
                            <td><a class="btn btn-secondary" href="item_gallery.php?p_id=<?php echo $product_id ?>"><span class="fa fa-eye"></span></a></td>
                            <td><a class="btn btn-success" href="edit_product.php?p_id=<?php echo $product_id ?>"><span class="fa fa-edit"></span></a></td>
                            <td><a class="btn btn-danger" href="?delete=<?php echo $product_id ?>"><span class="fa fa-trash"></span></a></td>
                        </tr>
                    <?php
                    }

                    if (isset($_GET['delete'])) {
                        $del = $_GET['delete'];
                        $sql = "DELETE FROM tbl_item WHERE id ='$del'";
                        $result = mysqli_query($con, $sql);

                        if ($result) {
                            echo "<script>window.location.href='admin_products.php'</script>";
                        } else {
                            echo "<script> alert('Please empty the VARIATIONS and GALLERY before deleting the item'); window.location.href='admin_products.php'</script>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-end">
                <li class="page-item <?php
                                        if ($pageno <= 1) {
                                            echo 'disabled';
                                        } ?>">
                    <a class="page-link" href="<?php
                                                if ($pageno > 1) {
                                                    echo "?pageno=" . ($pageno - 1);
                                                } ?>">Previous</a>
                </li>


                <?php

                for ($i = 1; $i <= $total_pages; $i++) {
                    if ($pageno == $i) {
                        $c = " active";
                    } else {
                        $c = "";
                    }
                    echo '<li class="page-item' . $c . '"><a class="page-link" href="?pageno=' . $i . '">' . $i . '</a></li>';
                }
                ?>

                <li class="page-item <?php if ($pageno >= $total_pages) {
                                            echo 'disabled';
                                        } ?>">
                    <a class="page-link" href="<?php if ($pageno < $total_pages) {
                                                    echo "?pageno=" . ($pageno + 1);
                                                } ?>">Next</a>
                </li>
            </ul>
        </nav>

    </section>


</body>

<?php include 'includes/script.php' ?>

</html>
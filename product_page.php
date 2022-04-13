<!DOCTYPE html>
<html lang="en">

<?php include 'includes/head.php' ?>

<body>
    <a id="button"></a>

    <?php include 'includes/nav.php' ?>

    <section class="product-section">

        <div class="container">
            <div class="product-content">
                <div class="product-image-col">
                    <div class="main">
                        <?php
                        if (isset($_GET['p_id'])) {
                            $id = $_GET['p_id'];
                            $sql = "SELECT * FROM tbl_item WHERE id ='$id'";
                            $result = mysqli_query($con, $sql);
                        }
                        ?>
                        <div class="slider-for">
                            <?php
                            $sql2 = "SELECT * FROM tbl_item_gallery WHERE img_id = $id";
                            $data = mysqli_query($con, $sql2);

                            while ($row2 = mysqli_fetch_assoc($data)) {
                                $img = $row2['img'];
                            ?>
                                <div class="big-slider">
                                    <img class="slickimg" src="./assets/img/<?php echo $img ?>">
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="slider-nav">
                            <?php
                            foreach ($data as $row2) {
                            ?>
                                <div class="small-slider">
                                    <img class="slickimg" src="./assets/img/<?php echo $row2['img'] ?>">
                                </div>
                            <?php
                            }
                            ?>
                        </div>

                    </div>
                </div>

                <div class="product-info-col">
                    <?php
                    if (isset($_GET['p_id'])) {
                        $id = $_GET['p_id'];
                    }
                    $sql = "SELECT * FROM tbl_item WHERE id ='$id'";
                    $data = mysqli_query($con, $sql);

                    while ($row = mysqli_fetch_assoc($data)) {
                        $name = $row['name'];
                        $pdt_description = $row['description'];
                        $img = $row['img'];
                        $color = $row['color'];
                        $collection = $row['collection'];                        
                        $category = $row['category_id'];
                        $weight = $row['weight'];
                    }
                    ?>
                    <div class="breadcrumb">
                        <a href="index.php" class="breadcrumb-link">Home</a>
                        <span class="divider">/</span>
                        <?php
                            $query = "SELECT * FROM category WHERE id = '$category'";
                            $data = mysqli_query($con, $query);
                            while ($value = mysqli_fetch_assoc($data)) {
                                $category_name = $value['name'];                            
                            }
                        ?>
                        <a href="" class="breadcrumb-link"><?php echo $category_name; ?></a>
                    </div>

                    <form action="carthandler.php" method="post">
                        <input type="text" name="id_form" value="<?php echo $id ?>" hidden>
                        <input type="text" name="name_form" value="<?php echo $name ?>" hidden>
                        <input type="text" name="color_form" value="<?php echo $color ?>" hidden>
                        <input type="text" name="image_form" value="<?php echo $img ?>" hidden>
                        <input type="text" name="weight_form" value="<?php echo $weight ?>" hidden>
                        <h1 class="product-name optimus"><?php echo $name ?> (<?php echo $color ?>)</h1>
                        <div class="price-wrapper">
                            <span class="currency">
                                <?php
                                $query = "SELECT * FROM tbl_variations WHERE item_id = '$id' ORDER BY id DESC LIMIT 1";
                                $result = mysqli_query($con, $query);

                                while ($value = mysqli_fetch_assoc($result)) {
                                    $price = $value['price'];
                                ?>
                                    &#8369; <?php echo number_format($price, 2) ?>
                                <?php
                                }
                                ?>
                                <input type="text" name="price_form" value="<?php echo $price ?>" hidden>
                            </span>
                        </div>
                        <div class="product-description">                            
                            <!-- <p><span class="heading">100% Cotton | Embroidered Design</span></p>
                            <p>Features</p>
                            <ul>
                                <li>Transparency: No</li>
                                <li>Lining: No</li>
                                <li>Shine: No</li>
                                <li>Thickness of fabric: Normal</li>
                                <li>Silhouette: Standard</li>
                                <li>Stretch: No</li>
                            </ul> -->
                            <div class="product-description-content">
                                <?php echo $pdt_description; ?>
                            </div>
                            <p><span class="heading"><?php echo $collection ?> Collection</span>
                                <br>
                                Please note that the product image may appear differently from the actual product due to lighting and shots angles. Also, the actual size might be slightly different from the image shown here.
                            </p>
                        </div>
                        <div class="value">
                            <div class="pick-size-section">
                                <span class="size-text">Size: </span>
                                <select name="price_form" class="form-select size">
                                    <?php
                                    $query = "SELECT * FROM tbl_variations WHERE item_id = '$id'";
                                    $data = mysqli_query($con, $query);

                                    while ($row = mysqli_fetch_assoc($data)) {
                                        $price = $row['price'];
                                        $size = $row['size'];
                                    ?>
                                        <option value="<?php echo $price ?>"><?php echo $size ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="num-block skin-2">
                                <div class="num-in">
                                    <span class="minus dis"></span>
                                    <input type="text" class="in-num" value="1" name="quantity_form">
                                    <span class="plus"></span>
                                </div>
                                <button class="btn btn-secondary" type="submit">Add to cart</button>
                            </div>
                        </div>
                    </form>

                    <div class="cat-sec">
                        <span>Categories: </span>
                        <?php
                        if (isset($_GET['cat_id'])) {
                            $cat_id = $_GET['cat_id'];
                        }
                        $sql = "SELECT * FROM category WHERE id = '$cat_id'";
                        $data = mysqli_query($con, $sql);

                        while ($result = mysqli_fetch_assoc($data)) {
                        ?>
                            <a class="cat-link" href="category.php?cat_id=<?php echo $result['id'] ?>"><?php echo $result['name'] ?></a>
                        <?php
                        }
                        ?>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="related-product">
        <div class="container">
            <h1 class="related-product-text optimus">related Products</h1>
            <div class="related-product-row">
                <?php
                // $sql = "SELECT * FROM tbl_item WHERE category_id = '$cat_id'";
                $sql = "SELECT * FROM tbl_item ";
                $data = mysqli_query($con, $sql);

                while ($row = mysqli_fetch_assoc($data)) {
                    $id = $row['id'];
                    $name = $row['name'];
                    $color = $row['color'];
                    $collection = $row['collection'];
                    $category = $row['category_id'];
                    $img = $row['img'];
                    $hover_img = $row['hover_img'];
                ?>
                    <div class="related-product-col">
                        <div class="related-product-box">
                            <div class="related-product-image">
                                <img src="./assets/img/<?php echo $img ?>" alt="">
                                <img src="./assets/img/<?php echo $hover_img ?>" class="image-hover" alt="">
                            </div>
                            <div class="related-product-text-box">
                                <div class="related-product-title-box">
                                    <p class="collection"><?php echo $collection ?></p>
                                    <p class="product-title"><a href="product_page.php?p_id=<?php echo $id ?>&cat_id=<?php echo $category ?>"><?php echo str_replace('_', ' ', $name) ?> (<?php echo $color ?>)</a></p>
                                </div>
                                <div class="related-product-price">
                                    <span class="price">
                                        <?php
                                        $query = "SELECT * FROM tbl_variations WHERE item_id = '$id' AND size = 'Small'";
                                        $result = mysqli_query($con, $query);

                                        while ($value = mysqli_fetch_assoc($result)) {
                                            $price = $value['price'];
                                        ?>
                                            &#8369; <?php echo number_format($price, 2) ?>
                                        <?php
                                        }
                                        ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>

    </section>

    <?php include 'includes/footer.php' ?>
<?php include 'includes/script.php' ?>
</body>



</html>
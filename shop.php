<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once 'includes/head.php' ?>
    <?php
    $query = "SELECT * FROM tbl_meta WHERE id = 2";
    $data = mysqli_query($con, $query);

    while ($row = mysqli_fetch_assoc($data)) {
    ?>
        <!-- meta tag -->
        <meta charset="UTF-8">
        <title><?php echo $row['meta_title_content'] ?></title>
        <meta name="title" content="<?php echo $row['meta_title_content'] ?>">
        <meta name="description" content="<?php echo $row['meta_description_content'] ?>">

        <meta property="og:type" content="website">
        <meta property="og:title" content="<?php echo $row['meta_title_content'] ?>">
        <meta property="og:description" content="<?php echo $row['meta_description_content'] ?>">
    <?php
    }
    ?>
</head>

<body>
    <a id="button"></a>

    <?php include 'includes/nav.php' ?>

    <section class="categories-section">
        <div class="container">
            <div class="breadcrumb-categories">
                <div class="breadcrumbs">
                    <a href="index.php" class="breadcrumb-link">Home</a>
                    <span class="divider">/</span>
                    <a class="breadcrumb-link active-link">Shop</a>
                </div>
                <!-- <div class="categories">
                    <p>Showing all 10 results</p>
                    <form action="" class="orderby-form">
                        <select name="orderby" class="orderby">
                            <option value="">Sort by popularity</option>
                            <option value="">Sort by latest</option>
                            <option value="">Sort by price: High to low</option>
                            <option value="">Sort by price: Low to high</option>
                        </select>
                    </form>
                </div> -->
            </div>
            <div class="canvas-button">
                <button class="btn btn-canvas" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                    Filter
                </button>
            </div>
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Filter</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <div class="canvas-side-bar">
                        <span class="sidebar-header-title">Category</span>
                        <ul>
                            <?php
                            $sql = "SELECT * FROM category";
                            $data = mysqli_query($con, $sql);

                            while ($row = mysqli_fetch_assoc($data)) {
                            ?>
                                <li>
                                    <a href="category.php?cat_id=<?php echo $row['id'] ?>"><?php echo $row['name'] ?></a>
                                </li>
                            <?php
                            }
                            ?>
                        </ul>

                        <span class="sidebar-header-title">Featured Products</span>
                        <ul class="featured-product-list">

                            <?php
                            $sql = "SELECT * FROM tbl_item WHERE featured = 'yes' LIMIT 3";
                            $data = mysqli_query($con, $sql);

                            while ($row = mysqli_fetch_assoc($data)) {
                                $id = $row['id'];
                                $name = $row['name'];
                                $color = $row['color'];
                                $collection = $row['collection'];
                                $category = $row['category_id'];
                                $img = $row['img'];
                                $hover_img = $row['hover_img'];
                                $date = $row['date'];
                            ?>
                                <li>
                                    <a href=""><img src="assets/img/<?php echo $img ?>" width="100" height="100" alt="">
                                        <span class="sidebar-product-title"><?php echo $name ?> (<?php echo $color ?>)</span>	                      						
                                        <p class="price-wrapper">
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
                                            </span>
                                        </p>
                                    </a>
                                </li>
                            <?php
                            }
                            ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="main-shop">
        <div class="container">
            <div class="shop-body">

                <?php include 'includes/shop_side_bar.php' ?>

                <div class="shop-products">
                    <div class="shop-product-row">

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
                        $data = mysqli_query($con, $sql);

                        while ($row = mysqli_fetch_assoc($data)) {
                            $id = $row['id'];
                            $name = $row['name'];
                            $color = $row['color'];
                            $collection = $row['collection'];
                            $category = $row['category_id'];
                            $img = $row['img'];
                            $hover_img = $row['hover_img'];
                            $date = $row['date'];
                        ?>
                            <div class="shop-product-col">
                                <div class="shop-product-box">
                                    <div class="shop-product-image">
                                        <img src="./assets/img/<?php echo $img ?>" alt="">
                                        <img src="./assets/img/<?php echo $hover_img ?>" class="image-hover" alt="">
                                    </div>
                                    <div class="shop-product-text-box">
                                        <div class="shop-product-title-box">
                                            <p class="collection"><?php echo $collection ?></p>
                                            <p class="product-title"><a href="product_page.php?p_id=<?php echo $id ?>&cat_id=<?php echo $category ?>"><?php echo str_replace('_', ' ', $name) ?> (<?php echo $color ?>)</a></p>
                                        </div>
                                        <div class="shop-product-price">
                                            <span class="price">
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
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
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

                </div>

            </div>
        </div>
    </section>

    <?php include 'includes/footer.php' ?>
<?php include 'includes/script.php' ?>
</body>



</html>
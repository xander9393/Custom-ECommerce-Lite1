<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once 'includes/head.php' ?>
    <?php
    $query = "SELECT * FROM tbl_meta WHERE id = 1";
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

    <section class="carousel">

        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php
                $sql = "SELECT * FROM carousel_1";
                $result = mysqli_query($con, $sql);

                $i = 0;
                foreach ($result as $key => $value) {
                    $actives = '';
                    if ($i === 0) {
                        $actives = 'active';
                    }
                ?>
                    <div class="carousel-item main <?php echo $actives ?>" data-bs-interval="4000">
                        <img src="./assets/img/<?php echo $value['img'] ?>" class="d-block" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5 class="animate__animated animate__fadeInUp"><?php echo $value['header'] ?></h5>
                            <p class="animate__animated animate__bounceInLeft"><?php echo $value['sub_header'] ?></p>
                            <a class="carousel-btn" href="<?php echo $value['btn_link'] ?>" hidden<?php echo $value['btn_name'] ?>><?php echo $value['btn_name'] ?></a>
                        </div>
                    </div>
                <?php
                    $i++;
                }
                ?>
            </div>
        </div>

        <div class="carousel-row">
            <div class="carousel-col">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <?php
                        $sql = "SELECT img FROM carousel_2";
                        $result = mysqli_query($con, $sql);

                        $i = 0;
                        foreach ($result as $key => $value) {
                            $actives = '';
                            if ($i === 0) {
                                $actives = 'active';
                            }
                        ?>
                            <div class="carousel-item sub <?php echo $actives ?>" data-bs-interval="3000">
                                <img src="./assets/img/<?php echo $value['img'] ?>" class="d-block" alt="...">
                            </div>

                        <?php
                            $i++;
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="carousel-col">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <?php
                        $sql = "SELECT img FROM carousel_3";
                        $result = mysqli_query($con, $sql);

                        $i = 0;
                        foreach ($result as $key => $value) {
                            $actives = '';
                            if ($i === 0) {
                                $actives = 'active';
                            }
                        ?>
                            <div class="carousel-item sub <?php echo $actives ?>" data-bs-interval="4000">
                                <img src="./assets/img/<?php echo $value['img'] ?>" class="d-block" alt="...">
                            </div>

                        <?php
                            $i++;
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="carousel-col">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <?php
                        $sql = "SELECT img FROM carousel_4";
                        $result = mysqli_query($con, $sql);

                        $i = 0;
                        foreach ($result as $key => $value) {
                            $actives = '';
                            if ($i === 0) {
                                $actives = 'active';
                            }
                        ?>
                            <div class="carousel-item sub <?php echo $actives ?>" data-bs-interval="3000">
                                <img src="./assets/img/<?php echo $value['img'] ?>" class="d-block" alt="...">
                            </div>

                        <?php
                            $i++;
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section class="featured-items">
        <div class="container">
            <h1 class="animate__animated animate__fadeInUp header-style optimus">Featured Items</h1>

            <div class="featured-items-row">

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
                    <div class="featured-items-col">
                        <div class="product-box">
                            <div class="image-box">
                                <img src="./assets/img/<?php echo $img ?>" alt="">
                                <img src="./assets/img/<?php echo $hover_img ?>" class="image-hover" alt="">
                            </div>
                            <div class="text-box">
                                <div class="title-box">
                                    <p class="collection"><?php echo $collection ?></p>
                                    <p class="product-title"><a href="product_page.php?p_id=<?php echo $id ?>&cat_id=<?php echo $category ?>"><?php echo str_replace('_', ' ', $name) ?> (<?php echo $color ?>)</a></p>
                                </div>
                                <div class="price-box">
                                    <span class="price">
                                        <?php
                                        $query = "SELECT * FROM tbl_variations WHERE item_id = '$id' ORDER BY id DESC LIMIT 1";
                                        $result = mysqli_query($con, $query);

                                        while ($value = mysqli_fetch_assoc($result)) {
                                            $price = $value['price'];
                                        ?>
                                            <span class="currency">&#8369; <?php echo number_format($price, 2) ?></span>
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

            <div class="shop-btn">
                <a href="shop.php" class="view-products-btn">View Products</a>
            </div>

        </div>
    </section>

    <section class="latest-items">
        <div class="container">
            <h1 class="header-style optimus">Latest Items</h1>

            <div class="latest-items-row">

                <?php
                $sql = "SELECT * FROM tbl_item ORDER BY date DESC LIMIT 8";
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
                    <div class="latest-items-col">
                        <div class="product-box">
                            <div class="image-box">
                                <img src="./assets/img/<?php echo $img ?>" alt="">
                                <img src="./assets/img/<?php echo $hover_img ?>" class="image-hover" alt="">
                            </div>
                            <div class="text-box">
                                <div class="title-box">
                                    <p class="collection"><?php echo $collection ?></p>
                                    <p class="product-title"><a id="test" href="product_page.php?p_id=<?php echo $id ?>&cat_id=<?php echo $category ?>"><?php echo str_replace('_', ' ', $name) ?> (<?php echo $color ?>)</a></p>
                                </div>
                                <div class="price-box">
                                    <span class="price">

                                        <?php
                                        $query = "SELECT * FROM tbl_variations WHERE item_id = '$id' ORDER BY id DESC LIMIT 1";
                                        $result = mysqli_query($con, $query);

                                        while ($value = mysqli_fetch_assoc($result)) {
                                            $price = $value['price'];
                                        ?>
                                            <span class="currency">&#8369; <?php echo number_format($price, 2) ?></span>
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
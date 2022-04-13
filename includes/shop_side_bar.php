<div class="side-bar">
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
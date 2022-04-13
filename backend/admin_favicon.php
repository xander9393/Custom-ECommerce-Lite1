<!DOCTYPE html>
<html lang="en">

<?php include 'includes/head.php' ?>

<body>
    <?php include 'includes/sidebar.php' ?>

    <?php include 'includes/topbar.php' ?>
    <section id="dashboard">

        <h1 class="welcome-text">Favicon</h1>


        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>Apple Touch Icon</th>
                        <th>Shortcut Icon</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM tbl_favicon WHERE id = 1";
                    $result = mysqli_query($con, $sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $apple_icon = $row['apple_touch_icon'];
                        $shortcut_icon = $row['shortcut_icon'];
                    ?>
                        <tr>
                            <td><img src="../assets/img/<?php echo $apple_icon ?>" width="70" height="70" alt=""></td>
                            <td><img src="../assets/img/<?php echo $shortcut_icon ?>" width="70" height="70" alt=""></td>
                            <td><a class="btn btn-success" href="edit_favicon.php?f_id=<?php echo $id ?>"><span class="fa fa-edit"></span></a></td>
                        </tr>
                    <?php
                    }
                    ?>

                </tbody>
            </table>
        </div>

    </section>

</body>

<?php include 'includes/script.php' ?>

</html>
<!DOCTYPE html>
<html lang="en">

<?php include 'includes/head.php' ?>

<body>
    <?php include 'includes/sidebar.php' ?>

    <?php include 'includes/topbar.php' ?>
    <section id="dashboard">

        <h1 class="welcome-text">Connect With Us</h1>
        <a class="btn btn-info" href="export_contactUsList.php">Export</a>

        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact No.</th>
                        <th>Concern</th>
                        <th>Date</th>
                        <th>Delete</th>
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


                    $total_pages_sql = "SELECT COUNT(*) FROM tbl_contactus";
                    $result = mysqli_query($con, $total_pages_sql);
                    $total_rows = mysqli_fetch_array($result)[0];
                    $total_pages = ceil($total_rows / $no_of_records_per_page);

                    $sql = "SELECT * FROM tbl_contactus ORDER BY date DESC LIMIT $offset, $no_of_records_per_page ";
                    $result = mysqli_query($con, $sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $name = $row['name'];
                        $email = $row['email'];
                        $contact_no = $row['contact_no'];
                        $concern = $row['concern'];
                        $date = $row['date'];
                    ?>
                        <tr>
                            <td><?php echo $name ?></td>
                            <td><?php echo $email ?></td>
                            <td><?php echo $contact_no ?></td>
                            <td><b><?php echo $concern ?></b></td>
                            <td><?php echo $date ?></td>
                            <td><a class="btn btn-danger" href="?delete=<?php echo $id ?>"><span class="fa fa-trash"></span></a></td>
                        </tr>
                    <?php
                    }

                    if (isset($_GET['delete'])) {
                        $del = $_GET['delete'];
                        $sql = "DELETE FROM tbl_contactus WHERE id ='$del'";
                        $result = mysqli_query($con, $sql);

                        if ($result) {
                            header("location: admin_connect.php");
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
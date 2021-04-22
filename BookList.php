<?php
$title = 'BookList';
require 'templates/header.php';
?>


<div class="container my-con">
    <form method="GET" action="">
        <div class="input-group input-group-sm  justify-content-end">
            <label class="text" style="padding-right: 10;">Sort by:</label>
            <div>
                <select class="form-select form-select-sm" name="sort_book">
                    <option value="">--select--</option>
                    <option value="a-z" <?php if (isset($_GET['sort_book']) && $_GET['sort_book'] == "A-Z") {
                                            echo "selected";
                                        } ?>>Book A-Z</option>
                    <option value="z-a" <?php if (isset($_GET['sort_book']) && $_GET['sort_book'] == "Z-A") {
                                            echo "selected";
                                        } ?>>Book Z-A</option>
                </select>
            </div>
            <button type="submit" class="input-group-text btn-primary-sm">Go</button>
        </div>
    </form>


    <hr class="solid" style="border-top: 2px solid #bbb;">


     
    <div class="row row-cols-1">

        <!--bootstrap grid system-->
        <!--row-col-* is used to define the number of column rendered in small screen-->

        <?php
        $limit = 5;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $start = ($page - 1) * $limit;
        $sort_option = "";
        if (isset($_GET['sort_book'])) {
            if ($_GET['sort_book'] == "a-z") {
                $sort_option = "ASC";
            } else if ($_GET['sort_book'] == "z-a") {
                $sort_option = "DESC";
            }
            $query = "SELECT * FROM `bookshelf` order by `bName` $sort_option LIMIT $start, $limit";
            $result = mysqli_query($connection, $query);
            $count = mysqli_num_rows($result);

            //getting number of pages on the basis of limit
            $result1 = $connection->query("SELECT * FROM `bookshelf`");
            $book_count = mysqli_num_rows($result1);
            $pages = ceil($book_count / $limit);
            $previous = $page - 1;
            $next = $page + 1;
        } else if (isset($_POST['search'])) {

            $search_q = $_POST['search'];
            $query = "SELECT * FROM `bookshelf` WHERE `bName`LIKE '%$search_q%' OR  `bAuthor` LIKE '%$search_q%' LIMIT $start, $limit";
            $result = mysqli_query($connection, $query);
            $count = mysqli_num_rows($result);
        ?>
            <h5>Showing result for : "<?php echo $search_q ?>" </h5>
            <?php
            //getting number of pages on the basis of limit for pagination
            $result1 = $connection->query("SELECT * FROM `bookshelf` WHERE `bName`LIKE '%$search_q%' OR  `bAuthor` LIKE '%$search_q%'");
            $book_count = mysqli_num_rows($result1);
            $pages = ceil($book_count / $limit);
            $previous = $page - 1;
            $next = $page + 1;
        } else {

            $query = "SELECT * FROM `bookshelf` LIMIT $start, $limit";
            $result = mysqli_query($connection, $query);
            $count = mysqli_num_rows($result);


            $result1 = $connection->query("SELECT * FROM `bookshelf`");
            $book_count = mysqli_num_rows($result1);
            $pages = ceil($book_count / $limit);
            $previous = $page - 1;
            $next = $page + 1;
        }
        ?>
        <div class="row">
        <div class="col-md-12">
            <h2 class="text-center">Book List</h2>
        </div>
        </div>
        <?php


        if ($count > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <div class="col-sm">
                    <!--bootstrap card for book listing-->
                    <div class="card " style="width: 18rem;">
                        <img class="card-img-top img" src="uploads/<?php echo $row['bImage']; ?>" alt="Book image">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['bName']; ?></h5>
                            <h6 class="card-sub-title"><?php echo $row['bAuthor']; ?></h6>
                            <a href="BookDetails.php?id=<?php echo $row['bId']; ?>" class="btn btn-success btn-sm btn-block">View details</a>
                        </div>
                    </div>
                </div>
        <?php
            }
        } else {
            echo "no record found";
        }
        ?>
    </div>

    <hr class="solid" style="border-top: 2px solid #bbb;">
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-end pagination-sm">
            <li class="page-item  ">
                <a class="page-link <?= $page <= 1 ? 'disabled' : ''; ?> " href="index.php?page=<?= $previous; ?>"> &laquo; Previous</a>
            </li>
            <?php for ($i = 1; $i <= $pages; $i++) : ?>
                <li class="page-item <?= $page == $i ? 'active' : ''; ?>">
                    <a class="page-link" href="index.php?page=<?= $i; ?>"><?= $i ?></a>
                </li>
            <?php endfor; ?>
            <li class="page-item">
                <a class="page-link <?= $page >= $pages ? 'disabled' : ''; ?> " href="index.php?page=<?= $next; ?>">Next &raquo;</a>
            </li>
        </ul>
    </nav>

</div>
<?php
require 'templates/footer.php';
?>
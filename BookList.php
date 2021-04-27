<?php
if (isset($_GET['Sort'])) {
    if ($_GET['Sort'] == 'A-Z') {
        $a = "ORDER BY `bName`";
    } elseif ($_GET['Sort'] == 'Z-A') {
        $a = "ORDER BY `bName` DESC";
    } else {
        $a = "ORDER BY bId";
    }
} else {
    $a = "ORDER BY bId";
}
$limit = 6;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$offset = ($page - 1) * $limit;
$results_per_page = 6;


if (isset($_GET['search'])) {

    $search_key =  mysqli_real_escape_string($connection, $_GET['search']);
    $query =  "SELECT * FROM `bookshelf` WHERE `bName` LIKE '%$search_key%' OR `bAuthor` LIKE '%$search_key%' {$a} LIMIT {$offset} ,{$limit} ";

    $result = mysqli_query($connection, $query);
} else {
    $query = "SELECT * FROM `bookshelf` {$a} LIMIT {$offset} ,{$limit} ";

    $result = mysqli_query($connection, $query);
}
?>

<div class="container my-con">
    <div class="d-flex justify-content-end">
        <form action="index.php" method="GET" class="d-flex justify-content-end mx-md-10">
            <?php if (isset($_GET['Sort'])) {
                $sort = $_GET['Sort'];
            } else {
                $sort = " ";
            }
            ?>
            <select name="Sort" class=" form-select mt-4 w-100 w-md-25 mt-md-0" id="sort" onchange="javascript:this.form.submit()">
                <option>Sort</option>
                <option value="A-Z" <?php echo $sort == 'A-Z' ? "selected" : "" ?> id="1">A-Z</option>
                <option value="Z-A" <?php echo $sort == 'Z-A' ? "selected" : "" ?> id="2">Z-A</option>
            </select>
        </form>
    </div>
    <hr class="solid" style="border-top: 2px solid #bbb;">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center">Book List</h2>
        </div>
    </div>

    <?php
    if (isset($_GET['search'])) {
        if (mysqli_num_rows($result) > 0) {
    ?>
            <div class="alert alert-warning alert-dismissible fade mt-5 show w-75 mx-auto d-flex justify-content-between" role="alert">
                <strong>Showing result for "<?php echo $_GET['search']; ?>"</strong>
                <button type="button" class="close bg-transparent border-0 ml-auto" data-dismiss="alert" aria-label="Close">
                    <a href="index.php" class="text-dark" style="text-decoration: none;">
                        <span aria-hidden="true"><i class="bi bi-x"></i></span>
                    </a>
                </button>
            </div>
        <?php } else { ?>
            <div class="alert alert-warning alert-dismissible fade mt-5 show w-75 mx-auto d-flex justify-content-between" role="alert">
                <strong>No match found ..!! Try again <i class="bi bi-arrow-counterclockwise"></i></strong>
                <button type="button" class="close bg-transparent border-0 ml-auto" data-dismiss="alert" aria-label="Close">
                    <a href="index.php" class="text-dark" style="text-decoration: none;">
                        <span aria-hidden="true"><i class="bi bi-x"></i></span>
                    </a>
                </button>
            </div>

        <?php } ?>
    <?php    } ?>

    <div class="row row-cols-1">
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) { ?>
                <div class="col-sm">
                    <!--bootstrap card for book listing-->
                    <div class="card " style="width: 15rem;">
                        <img class="card-img-top img2" src="uploads/<?php echo $row['bImage']; ?>" alt="Book image">
                        <div class="card-body">
                            <h6 class="card-title"><?php echo $row['bName']; ?></h6>
                            <h7 class="card-subtitle mb-2 text-muted">By: <?php echo $row['bAuthor']; ?></h7>
                            <a href="BookDetails.php?id=<?php echo $row['bId']; ?>" class="btn btn-success btn-sm btn-block">View details</a>
                        </div>
                    </div>
                </div>
        <?php }
        } else {
            //echo "No Matching Results";
        }
        ?>

        <?php
        if (isset($_GET['Sort'])) {
            $sort_variable = $_GET['Sort'] ? $_GET['Sort'] : ' ';
        } else {
            $sort_variable = "";
        }

        if (isset($_GET['search'])) {
            $search =  mysqli_real_escape_string($connection, $_GET['search']);
            $search_variable = $_GET['search'] ? $_GET['search'] : ' ';
            $sql1 = "SELECT * FROM `bookshelf` WHERE `bName` LIKE '%$search%' OR `bAuthor` LIKE '%$search%'  ";
            $pagination_result = mysqli_query($connection, $sql1);
        } else {
            $sql1 = " SELECT * FROM `bookshelf` ";
            $pagination_result = mysqli_query($connection, $sql1) or die("query error");
        }

        ?>
    </div>

    <div style="padding-top: 20;">
        <?php

        if (mysqli_num_rows($pagination_result) > 0) {
            $total_record = mysqli_num_rows($pagination_result);
            $total_page = ceil($total_record / $limit);
            echo '<nav aria-label="Page navigation example">';
            echo '<ul class="pagination pagination-sm justify-content-end">';

            if (isset($search)) {
                $search_variable = $_GET['search'] ? $_GET['search'] : ' ';

                echo '<li class="page-item"><a class="page-link" href="index.php?search=' . $search_variable . '&page=' . ($page - 1) . '">Prev</a></li>';
            } else {
                echo '<li class="page-item"><a  class="page-link" href="index.php?Sort=' . $sort_variable . '&page=' . ($page - 1) . '">Prev</a></li>';
            }
            for ($i = 1; $i <= $total_page; $i++) {

                if (isset($_GET['Sort'])) {
                    $sort_variable = $_GET['Sort'] ? $_GET['Sort'] : ' ';
                }
                if (isset($search)) {
                    $search_variable = $_GET['search'] ? $_GET['search'] : ' ';

                    echo '<li class="page-item"><a class="page-link" href="index.php?search=' . $search_variable . '&page=' . $i . '">' . $i . '</a></li>';
                } else {
                    echo '<li class="page-item"><a class="page-link" href="index.php?Sort=' . $sort_variable . '&page=' . $i . '">' . $i . '</a></a>';
                }
            }
            if (isset($search)) {
                $search_variable = $_GET['search'] ? $_GET['search'] : ' ';

                echo '<li class="page-item"><a class="page-link" href="index.php?search=' . $search_variable . '&page=' . ($page + 1) . '">Next</a></li>';
            } else {
                echo '<li class="page-item"><a class="page-link" href="index.php?Sort=' . $sort_variable . '&page=' . ($page + 1) . '">Next</a></li>';
            }

            echo '</ul>';
            echo '</nav>';
        }
        ?>

    </div>
</div>
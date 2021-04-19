<link rel="stylesheet" href="sass/BookDetail.css">
<?php
$title = 'BookDetail';
include 'templates/header.php';
?>

<div class="container ">
    <?php

    if (isset($_GET['id'])) {

        $id = $_GET['id'];
        $query = "SELECT * FROM `bookshelf` WHERE bId = $id";
        $query_run = mysqli_query($connection, $query);
        if ($query_run) {
            while ($row = mysqli_fetch_assoc($query_run)) {
    ?>
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="text-center">Book Details</h2>
                    </div>
                </div>
                <div class="card mb-3" style="max-width: 1500px;">
                    <div class="row g-0">
                        <div class="col-md-4 d-flex justify-content-center">
                            <img class="img-fluid" src="uploads/<?php echo $row['bImage']; ?>" alt="Book image preview">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['bName']; ?></h5>
                                <h6 class="card-sub-title"><?php echo $row['bAuthor']; ?></h6>
                                <p class="card-text"><?php echo $row['bDescription']; ?></p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-outline-primary  ">Edit Details</button>
                    <button type="button" class="btn btn-outline-danger  ">Delete Book</button>
                </div>

</div>


<?php

            }
        } else {
            echo "<h1 class='text-danger'>please check the details</h1>";
        }
    }
?>




<?php
include 'templates/footer.php';
?>
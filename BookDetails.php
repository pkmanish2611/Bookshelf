<?php
$title = 'BookDetail';
include 'templates/header.php';
?>

<div class="container container_b">
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
                            <img class="img-fluid" style="height:500;" src="uploads/<?php echo $row['bImage']; ?>" alt="Book image preview">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h3 class="card-title"><?php echo $row['bName']; ?></h3>
                                <h5 class="card-sub-title"><?php echo $row['bAuthor']; ?></h5>
                                <p class="card-text"><?php echo $row['bDescription']; ?></p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>

                            </div>
                            <div class="d-flex justify-content-end">
                                <button onclick="window.location.href='EditBook.php?id=<?php  echo $row['bId']; ?>'" style="margin-right: 14px;" class="btn btn-outline-primary  ">Edit Details</button>
                                <button onclick="window.location.href='/page2'" class="btn btn-outline-danger" name="book_del">Delete Book</button>
                            </div>
                        </div>
                    </div>
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
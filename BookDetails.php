<?php
$title = 'BookDetail';
include 'templates/header.php';
?>

<div class="container container_b">
    <?php
    include 'db/detail.php';
    ?>
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center">Book Details</h2>
        </div>
    </div>
    <div class="card mb-3" style="max-width: 1500px;">
        <div class="row g-0">
            <div class="col-md-4 d-flex justify-content-center">
                <img class="img-fluid" style="height:500;" src="uploads/<?php echo $b_image; ?>" alt="Book image preview">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h3 class="card-title"><?php echo $b_name; ?></h3>
                    <h5 class="card-sub-title"><?php echo $b_author; ?></h5>
                    <a href="<?php $b_url ?>" class="text-decoration-none"><?php echo $b_url ?> </a>

                    <p class="card-text"><?php echo $b_description; ?></p>
                    <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>-->

                </div>
                <div class="d-flex justify-content-end">
                    <button onclick="window.location.href='EditBook.php?id=<?php echo $b_id; ?>'" style="margin-right: 14px;" class="btn btn-outline-primary " name="book_up">Edit Details<i class="bi bi-pencil-square"></i></button>
                    <button onclick="window.location.href='db/delete.php?id=<?php echo $b_id; ?>'" class="btn btn-outline-danger delete_btn" name="book_del">Delete Book<i class="bi bi-trash"></i></>
                </div>
            </div>
        </div>
    </div>


</div>

<?php
include 'templates/footer.php';
?>
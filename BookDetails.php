<link rel="stylesheet" href="sass/BookDetail.css">
<?php
$title = 'AddBook';
include 'templates/header.php';
?>


<div class="container ">
    <div class="row align-items-center">
        <div class="col-sm-4 img-preview">
            <img class="img-fluid img4" alt="Book image preview">
        </div>
        <div class="col-sm-8 ">
            <h4>Book title </h4>
            <h5>Author</h5>
            <a class="text-primary" href="#">Book url</a>
            <p>description </p>
            <div class="row justify-content-end">
                <div class="col-sm-2 ">
                    <button type="button" class="btn btn-outline-primary btn-sm">Edit Details</button>
                </div>
                <div class="col-sm-2">
                    <button type="button" class="btn btn-outline-danger btn-sm">Delete Book</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include 'templates/footer.php';
?>
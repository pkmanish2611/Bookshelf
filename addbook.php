<!--importing css-->
<link rel="stylesheet" href="sass/add-book.css">
<!--header import-->
<?php
$title = 'add-book';
require 'component/header.php';
?>
<div class="form-div">
    <div class="container add-container">
        <form class="form-add" action="" method="POST">
            <div class="row row-cols-1 form-row">

                <div class="col-sm left-form">
                    <div class="form-group img1">
                        <!--previewing image before uploading-->
                        <img class="img-per" alt="Book image preview" id="preview">
                        <script src="js/preview.js"></script>
                    </div>
                </div>
                <div class="col-sm right-form1">
                    <div class="form-group row">
                        <label for="Name" class="col-sm-3 col-form-label">Book Name</label>
                        <div class="col-sm-8">
                            <input type="Text" class="form-control" placeholder="enter book name" name="b_name" value="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Author Name" class="col-sm-3 col-form-label">Author Name</label>
                        <div class="col-sm-8">
                            <input type="Text" class="form-control" placeholder="enter Author name" name="a_name" value="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Url" class="col-sm-3 col-form-label">Book Url</label>
                        <div class="col-sm-8">
                            <input type="url" class="form-control" placeholder="book Url" name="url">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-sm-3 col-form-label">Book Description</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" id="Textarea1" rows="4" name="description"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Image" class="col-sm-3 col-form-label">Book Image</label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control-file" id="file-input" value="" required name="img_file">
                            <script src="js/preview.js"></script>
                        </div>
                    </div>
                    <div class="col-sm-11 submit-btn">
                        <button type="submit" class="btn btn-primary btn-sm btn-block" name="add">Add</button>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>
<!--form submit-->
<?php
require 'db/connect.php';
if (isset($_POST['add'])) {
    //$_post is php super global variable to collect form data after submitting an html form with method - "post"
    $b_name = $_POST['b_name'];
    $a_name = $_POST['a_name'];
    $url = $_POST['url'];
    $description = $_POST['description'];
    $img_file = $_POST['img_file'];

    //insert query
    $insert_query = "INSERT INTO `bookshelf`(`bName`, `bAuthor`, `bImage`, `bDescription`, `bUrl`) 
    VALUES ('$b_name',' $a_name','$img_file','$description','$url')";
    //store in db
    $query_run = mysqli_query($connection, $insert_query);
    if ($query_run) {
    ?>
        <script>
            alert("Data added successfully");
        </script>
    <?php
    } else {
        ?>
            <script>
                alert("Data added successfully");
            </script>
        <?php
    }
}


?>

<?php require 'component/footer.php'; ?>
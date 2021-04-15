<!--importing css-->
<link rel="stylesheet" href="sass/add-book.css">
<!--header import-->
<?php
$title = 'add-book';
require 'component/header.php';
?>
<div class="form-div">
    <div class="container add-container">
        <form class="form-add">
            <div class="row row-cols-1 form-row">

                <div class="col-sm left-form">
                    <div class="form-group img1">
                        <!--previewing image before uploading-->
                        <img  class="img-per" alt="Book image preview" id="preview">
                        <script src="js/preview.js"></script>
                    </div>
                </div>
                <div class="col-sm right-form1">
                    <div class="form-group row">
                        <label for="Name" class="col-sm-3 col-form-label">Book Name</label>
                        <div class="col-sm-8">
                            <input type="Text" class="form-control" placeholder="enter book name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Name" class="col-sm-3 col-form-label">Author Name</label>
                        <div class="col-sm-8">
                            <input type="Text" class="form-control" placeholder="enter Author name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Url" class="col-sm-3 col-form-label">Book Url</label>
                        <div class="col-sm-8">
                            <input type="url" class="form-control" placeholder="book Url">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Textarea1" class="col-sm-3 col-form-label">Book Description</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" id="Textarea1" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Image" class="col-sm-3 col-form-label">Book Image</label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control-file" id="file-input">
                            <script src="js/preview.js"></script>
                        </div>
                    </div>
                    <div class="col-sm-11 submit-btn">
                        <button type="submit" class="btn btn-primary btn-sm btn-block">Submit</button>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>

<?php require 'component/footer.php'; ?>
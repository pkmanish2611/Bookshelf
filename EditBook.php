 <link rel="stylesheet" href="sass/EditBook.css">

 <?php
   $title = 'AddBook';
   require 'templates/header.php';
   ?>

 <div class="container add-container">
    <div class="row">
       <div class="col-md-12">
          <h2 class="text-center">Add Book</h2>
       </div>
    </div>
    <form class="form-add" action="display" method="POST" enctype="multipart/form-data">
       <div class="row row-col-1   justify-content-center form-row">

          <div class="col-sm-5 left-form">
             <div class="form-group   img1">
                <!--previewing image before uploading-->
                <img class="img-per" alt="Book image preview" id="preview">
                <script src="js/preview.js"></script>
             </div>
          </div>
          <div class="col-sm-5 right-form1">
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



 <?php
   require 'templates/footer.php';
   ?>
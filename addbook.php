 <link rel="stylesheet" href="sass/AddBook.css">

 <?php
    $title = 'AddBook';
    include 'templates/header.php';
    ?>



 <div class="container add-container">
     <div class="row">
         <div class="col-md-12">
             <h2 class="text-center">Add Book</h2>
         </div>
     </div>
     <form class="form-add" action="" method="POST" enctype="multipart/form-data">

         <div class="row g-0 row-col-1   justify-content-center form-row">

             <div class="col-md-5 left-form ">
                 <div class="form-group   img1">
                     <!--previewing image before uploading-->
                     <img class="img-per" alt="Book image preview" id="preview">
                     <script src="js/preview.js"></script>
                 </div>
             </div>
             <div class="col-md-5 right-form1">
                 <div class="form-group row">
                     <label for="Name" class="col-sm-3 col-form-label">Book Name</label>
                     <div class="col-sm-7">
                         <input type="Text" class="form-control" placeholder="enter book name" name="b_name" value="" required>
                     </div>
                 </div>
                 <div class="form-group row">
                     <label for="Author Name" class="col-sm-3 col-form-label">Author Name</label>
                     <div class="col-sm-7">
                         <input type="Text" class="form-control" placeholder="enter Author name" name="a_name" value="" required>
                     </div>
                 </div>
                 <div class="form-group row">
                     <label for="Url" class="col-sm-3 col-form-label">Book Url</label>
                     <div class="col-sm-7">
                         <input type="url" class="form-control" placeholder="book Url" name="url">
                     </div>
                 </div>
                 <div class="form-group row">
                     <label for="description" class="col-sm-3 col-form-label">Book Description</label>
                     <div class="col-sm-7">
                         <textarea class="form-control" id="Textarea1" rows="4" name="description"></textarea>
                     </div>
                 </div>
                 <div class="form-group row">
                     <label for="Image" class="col-sm-3 col-form-label">Book Image</label>
                     <div class="col-sm-7">
                         <input type="file" class="form-control-file" id="file-input" value="" required name="img_file">
                         <script src="js/preview.js"></script>
                     </div>
                 </div>
                 <div class="col-sm-8 submit-btn">
                     <button type="submit" class="btn btn-primary btn-sm btn-block" href="" name="add">Add</button>
                 </div>
             </div>
         </div>

     </form>
 </div>



 <?php



    if (isset($_POST['add'])) {
        //$_post is php super global variable to collect form data after submitting an html form with method - "post"
        $b_name = $_POST['b_name'];
        $a_name = $_POST['a_name'];
        $url = $_POST['url'];
        $description = $_POST['description'];
        $img_file = $_FILES['img_file']["name"];
        $temp_name = $_FILES["img_file"]["tmp_name"];
        $folder = "uploads/" . $img_file;
        //insert query
        $insert_query = "INSERT INTO `bookshelf`(`bName`, `bAuthor`, `bUrl`,`bDescription`, `bImage`) 
             VALUES ('$b_name',' $a_name','$url' ,'$description','$img_file' )";

        $query_run = mysqli_query($connection, $insert_query);
        if (move_uploaded_file($temp_name, $folder)) {
    ?>
         <script>
             alert("Book added successfully");
         </script>
     <?php
        } else {
        ?>
         <script>
             alert("book not added");
         </script>
 <?php
        }
    }




    ?>

 <?php
    include 'templates/footer.php';
    ?>
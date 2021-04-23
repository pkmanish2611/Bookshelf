 <?php
   $title = 'AddBook';
   include 'templates/header.php';
   ?>



 <div class="container edit-container">
    <div class="row">
       <div class="col-md-12">
          <h2 class="text-center">Add Book</h2>
       </div>
    </div>
    <form class="form-edit" action="" method="POST" enctype="multipart/form-data">

       <div class="row g-0 row-col-1   justify-content-center edit-row">
          <?php

            $id = $_GET['id'];
            $queryShow = "SELECT * FROM `bookshelf` WHERE bId = $id";
            $query_run = mysqli_query($connection, $queryShow);

            $row = mysqli_fetch_assoc($query_run);




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
                   alert("Book Edited successfully");
                </script>
             <?php
               } else {
               ?>
                <script>
                   alert("Can't edit this book");
                </script>
          <?php
               }
            }




            ?>



          <div class="col-md-5 left-img">
             <div class="form-group   img_edit">
                <!--previewing image before uploading-->
                <img class="img_per" alt="Book image preview" src="uploads/<?php echo $row['bImage']; ?>" id="preview">
                <script src="js/preview.js"></script>
             </div>
          </div>
          <div class="col-md-5 right-form1">
             <div class="form-group row">
                <label for="Name" class="col-sm-3 col-form-label">Book Name</label>
                <div class="col-sm-7">
                   <input type="Text" class="form-control" placeholder="enter book name" name="b_name" value="<?php echo $row['bName']; ?>" required>
                </div>
             </div>
             <div class="form-group row">
                <label for="Author Name" class="col-sm-3 col-form-label">Author Name</label>
                <div class="col-sm-7">
                   <input type="Text" class="form-control" placeholder="enter Author name" name="a_name" value="<?php echo $row['bAuthor']; ?>" required>
                </div>
             </div>
             <div class="form-group row">
                <label for="Url" class="col-sm-3 col-form-label">Book Url</label>
                <div class="col-sm-7">
                   <input type="url" class="form-control" placeholder="book Url" value="<?php echo $row['bUrl']; ?>" name="url">
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
                   <input type="file" class="form-control-file" id="file-input" value="<?php echo $row['bImage']; ?>" required name="img_file">
                   <script src="js/preview.js"></script>
                </div>
             </div>
             <div class="col-sm-8 submit-btn">
                <button type="submit" class="btn btn-primary btn-sm btn-block" href="BookDetails.php?id=<?php echo $row['bId']; ?>" name="add">Add</button>
             </div>
          </div>
       </div>

    </form>
 </div>

 <?php
   include 'templates/footer.php';
   ?>
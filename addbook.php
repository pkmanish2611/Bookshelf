 <?php
    $title = 'AddBook';
    include 'templates/header.php';
    ?>




 <div class="container add-container">
     <?php
        include 'db/addBook.php';
        ?>
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
                     <img class="img-per" alt='image preview' id="preview">
                     <script src="js/preview.js"></script>
                 </div>
             </div>
             <div class="col-md-6 right-form1">
                 <div class="form-group row">
                     <label for="Name" class="col-sm-3 col-form-label">Book Name<span class="note" style="color: #ff0000;">*</span>:</label>
                     <div class="col-sm-7 cole">
                         <input type="Text" class="form-control" placeholder="enter book name" name="b_name" value="" require>
                         <?php
                            if (isset($error_msg['b_name'])) {
                                echo "<small class='form-text text-danger'>" . $error_msg['b_name'] . "</small>";
                            }
                            ?>
                     </div>
                 </div>
                 <div class="form-group row">
                     <label for="Author Name" class="col-sm-3 col-form-label">Author Name<span class="note" style="color: #ff0000;">*</span>:</label>
                     <div class="col-sm-7">
                         <input type="Text" class="form-control" placeholder="enter Author name" name="a_name" value="" require>
                         <?php
                            if (isset($error_msg['a_name'])) {
                                echo "<small class='form-text text-danger'>" . $error_msg['a_name'] . "</small>";
                            }
                            ?>
                     </div>
                 </div>
                 <div class="form-group row">
                     <label for="Url" class="col-sm-3 col-form-label">Book Url</label>
                     <div class="col-sm-7">
                         <input type="url" class="form-control" placeholder="book Url" name="url">
                         <?php
                            if (isset($error_msg['url'])) {
                                echo "<small class='form-text text-danger'>" . $error_msg['url'] . "</small>";
                            }
                            ?>
                     </div>
                 </div>
                 <div class="form-group row">
                     <label for="description" class="col-sm-3 col-form-label">Book Description</label>
                     <div class="col-sm-7">
                         <textarea class="form-control" id="Textarea1" rows="4" name="description"></textarea>
                     </div>
                 </div>
                 <div class="form-group row">
                     <label for="Image" class="col-sm-3 col-form-label">Book Image<span class="note" style="color: #ff0000;">*</span>:</label>
                     <div class="col-sm-7">
                         <input type="file" class="form-control-file" id="file-input" value="" name="img_file" require>
                         <?php
                            if (isset($error_msg['img_file'])) {
                                echo "<small class='form-text text-danger'>" . $error_msg['img_file'] . "</small>";
                            }
                            ?>
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
 <?php
   $title = 'AddBook';
   include 'templates/header.php';
   ?>



 <div class="container edit-container">
    <div class="row">
       <div class="col-md-12">
          <h2 class="text-center">Edit Book</h2>
       </div>
    </div>
    <form class="form-edit" action="" method="POST" enctype="multipart/form-data">

       <div class="row g-0 row-col-1   justify-content-center edit-row">
          <?php
            include 'db/update.php';
            ?>
          <div class="col-md-5 left-img">
             <div class="form-group   img_edit">
                <!--previewing image before uploading-->
                <img class="img_per" alt="Book image preview" src="uploads/<?php echo $row['bImage']; ?>" id="preview">
                <script src="js/preview.js"></script>
             </div>
          </div>
          <input type="hidden" name="bId" value="<?php echo $row['bId']; ?>">
          <div class="col-md-6 right-form1">
             <div class="form-group row">
                <label for="Name" class="col-sm-3 col-form-label">Book Name<span class="note" style="color: #ff0000;">*</span>:</label>
                <div class="col-sm-7">
                   <input type="Text" class="form-control" placeholder="enter book name" name="b_name" value="<?php echo $row['bName']; ?>" required>
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
                   <input type="Text" class="form-control" placeholder="enter Author name" name="a_name" value="<?php echo $row['bAuthor']; ?>" required>
                   <?php
                     if (isset($error_msg['a_name'])) {
                        echo "<small class='form-text text-danger'>" . $error_msg['a_name'] . "</small>";
                     }
                     ?>

                </div>
             </div>
             <div class="form-group row">
                <label for="Url" class="col-sm-3 col-form-label">Book Url :</label>
                <div class="col-sm-7">
                   <input type="url" class="form-control" placeholder="book Url" value="<?php echo $row['bUrl']; ?>" name="url">
                </div>
             </div>
             <div class="form-group row">
                <label for="description" class="col-sm-3 col-form-label">Book Description :</label>
                <div class="col-sm-7">
                   <textarea class="form-control" id="Textarea1" rows="4" name="description"><?php echo $row['bDescription']; ?></textarea>
                </div>
             </div>
             <div class="form-group row">
                <label for="Image" class="col-sm-3 col-form-label">Book Image :</label>
                <div class="col-sm-7">
                   <input type="file" class="form-control-file" id="file-input" value="<?php echo $row['bImage']; ?>" name="img_file">
                   <?php
                     if (isset($error_msg['img_file'])) {
                        echo "<small class='form-text text-danger'>" . $error_msg['img_file'] . "</small>";
                     }
                     ?>
                   <script src="js/preview.js"></script>
                </div>
             </div>
             <div class="col-sm-8 submit-btn">
                <input type="submit" class="btn btn-primary btn-sm btn-block" name="update" value="update">
             </div>
          </div>
       </div>

    </form>
 </div>

 <?php
   include 'templates/footer.php';
   ?>
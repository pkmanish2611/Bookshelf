 <link rel="stylesheet" href="sass/BookList.css">

 <?php
    $title = 'AddBook';
    require 'templates/header.php';
    ?>

 <div class="container my-con">
     <div class="row">
         <div class="col-md-12">
             <h2 class="text-center">Book List</h2>
         </div>
     </div>

     <!--bootstrap grid system-->
     <!--row-col-* is used to define the number of column rendered in small screen-->
     <div class="row row-cols-1">
         <?php

            $query = "SELECT * FROM `bookshelf`";
            $query_run = mysqli_query($connection, $query);
            $check_bookshelf = mysqli_num_rows($query_run) > 0;
            if ($check_bookshelf) {
                while ($row = mysqli_fetch_assoc($query_run)) {
            ?>
                 <script></script>
                 <div class="col-sm">
                     <!--bootstrap card for book listing-->
                     <div class="card " style="width: 18rem;">
                         <img class="card-img-top img" src="uploads/<?php echo $row['bImage']; ?>" alt="Book image">
                         <div class="card-body">
                             <h5 class="card-title"><?php echo $row['bName']; ?></h5>
                             <h6 class="card-sub-title"><?php echo $row['bAuthor']; ?></h6>
                             <a href="BookDetails.php?id=<?php echo $row['bId']; ?>" class="btn btn-success btn-sm btn-block">View details</a>
                         </div>
                     </div>
                 </div>
         <?php
                }
            } else {
                echo "no record found";
            }
            ?>
     </div>
 </div>

 <?php
    require 'templates/footer.php';
    ?>
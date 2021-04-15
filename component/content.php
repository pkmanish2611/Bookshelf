
 <!--container with bootstrap cards for showing book listing-->
 <div class="container my-con">

     <!--bootstrap grid system-->
     <!--row-col-* is used to define the number of column rendered in small screen-->
     <div class="row row-cols-1">
         <?php
            //getting connection 
            require 'db/connect.php';
            $query = "SELECT * FROM `bookshelf`";
            $query_run = mysqli_query($connection, $query);
            $check_bookshelf = mysqli_num_rows($query_run) > 0;
            if ($check_bookshelf) {
                while ($row = mysqli_fetch_assoc($query_run)) {
            ?>
                 <div class="col-sm ">
                     <!--bootstrap card for book listing-->
                     <div class="card " style="width: 18rem;">
                         <img class="card-img-top" src=".../100px180/" alt="Book image">
                         <div class="card-body">
                             <h5 class="card-title"><?php echo $row['bName']; ?></h5>
                             <h6 class="card-sub-title"><?php echo $row['bAuthor']; ?></h6>
                             <a href="#" class="btn btn-outline-info btn-sm btn-block">View details</a>
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
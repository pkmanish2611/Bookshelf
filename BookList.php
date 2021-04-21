 <link rel="stylesheet" href="sass/Book_list.css">

 <?php
    $title = 'BookList';
    require 'templates/header.php';
    ?>


 <div class="container my-con">
     <div class="d-flex justify-content-end">
         <h8 style="margin-right: 10px;">Sort by:</h8>
         <div class="btn-group">
             <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                 Relevance
             </button>
             <ul class="dropdown-menu dropdown-menu-start">
                 <li><button class="dropdown-item" type="button">Titles A to Z</button></li>
                 <li><button class="dropdown-item" type="button">Titles Z to A</button></li>
                 <li><button class="dropdown-item" type="button">Author A to Z</button></li>
                 <li><button class="dropdown-item" type="button">Author Z to A</button></li>
             </ul>
         </div>
     </div>
     <hr class="solid" style="border-top: 2px solid #bbb;">
     <div class="row">
         <div class="col-md-12">
             <h2 class="text-center">Book List</h2>
         </div>
     </div>

     <!--bootstrap grid system-->
     <!--row-col-* is used to define the number of column rendered in small screen-->
     <div class="row row-cols-1">
         <?php
            $limit = 5;
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $start = ($page - 1) * $limit;
            $query = "SELECT * FROM `bookshelf` LIMIT $start, $limit";
            $result = mysqli_query($connection, $query);
            $count = mysqli_num_rows($result);

            //getting number of pages on the basis of limit
            $result1 = $connection->query("SELECT * FROM `bookshelf`");
            $book_count = mysqli_num_rows($result1);
            $pages = ceil($book_count / $limit);

            //setting previous and next 
            $previous = $page - 1;
            $next = $page + 1;

            if ($count > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
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
     <hr class="solid" style="border-top: 2px solid #bbb;">
     <nav aria-label="Page navigation">
         <ul class="pagination justify-content-end pagination-sm">
             <li class="page-item  ">
                 <a class="page-link <?= $page <= 1 ? 'disabled' : ''; ?> " href="index.php?page=<?= $previous; ?>">Previous</a>
             </li>
             <?php for ($i = 1; $i <= $pages; $i++) : ?>
                 <li class="page-item">
                     <a class="page-link" href="index.php?page=<?= $i; ?>"><?= $i ?></a>
                 </li>
             <?php endfor; ?>
             <li class="page-item">
                 <a class="page-link <?= $page >= $pages ? 'disabled' : ''; ?> " href="index.php?page=<?= $next; ?>">Next &raquo;</a>
             </li>
         </ul>
     </nav>
 </div>

 <?php
    require 'templates/footer.php';
    ?>
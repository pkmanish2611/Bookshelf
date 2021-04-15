<link rel="stylesheet" href="main.css">

<?php
$server_name = "localhost";
$user = "root";
$pass = "";
$db_name = "bibliotheca";

$connection = mysqli_connect($server_name, $user, $pass);
$db_config = mysqli_select_db($connection, $db_name);

if ($db_config) {
    //echo "Connection successful";
} else {
    // in case if connection is not established
    echo '
    <div class="container my-con">
        <div class="row row-cols-1">
         <div class="col-sm">
             <div class="card" style="width: 18rem;">
                 <img class="card-img-top" src=".../100px180/" alt="Book image">
                 <div class="card-body">
                     <h5 class="card-title  bg-danger text-white">Data base connection failed</h5>
                     <h6 class="card-sub-title">Database failure</h6>
                     <a href="#" class="btn btn-primary">Go somewhere</a>
                 </div>
             </div>
         </div>    
    </div>
    ';
}

?>
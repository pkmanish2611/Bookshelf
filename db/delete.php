<?php
require_once "connect.php";
$id = $_GET['id'];
     
    $sql = "DELETE FROM `bookshelf` WHERE  bId = ?";

    if ($stmt = mysqli_prepare($connection, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        $param_id = trim($_GET["id"]);
        if (mysqli_stmt_execute($stmt)) {
            echo '<script language = "javascript">';
            echo 'alert("Book Deleted successfully");  location.href = "/Bookshelf/index.php"';
            echo '</script>';

            exit();
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($link);
 
?>
 
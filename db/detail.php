<?php


if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
    require_once "connect.php";
    $sql = "SELECT * FROM `bookshelf` WHERE  bId = ?";

    if ($stmt = mysqli_prepare($connection, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        $param_id = trim($_GET["id"]);
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_array($result);
                $b_id = $row['bId'];
                $b_image = $row['bImage'];
                $b_name = $row['bName'];
                $b_author = $row['bAuthor'];
                $b_url = $row['bUrl'];
                $b_description = $row['bDescription'];
            } else {
                header("location: error.php");
                exit();
            }
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($connection);
} else {
    $sql = "SELECT * FROM `bookshelf` ORDER BY `bId` DESC LIMIT 1";

    if ($result = mysqli_query($connection, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $b_id = $row['bId'];
                $b_image = $row['bImage'];
                $b_name = $row['bName'];
                $b_author = $row['bAuthor'];
                $b_url = $row['bUrl'];
                $b_description = $row['bDescription'];
            }
             
            mysqli_free_result($result);
        } else {
            echo "No records matching your query were found.";
        }
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
    }

    // Close connection
    mysqli_close($connection);
}
?>
 
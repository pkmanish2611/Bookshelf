 <?php

    require_once "connect.php";

    $id = $_GET['id'];
    $queryShow = "SELECT * FROM `bookshelf` WHERE bId = $id";
    $query_run = mysqli_query($connection, $queryShow);

    $row = mysqli_fetch_assoc($query_run);

    if (isset($_POST['update'])) {

        $b_name = "";
        $a_name = "";
        $url = $_POST['url'];
        $description = "";
        $img_file = "";


        $valid = true;
        $name = $_POST['b_name'];
        if (empty($name)) {
            $error_msg['b_name'] = "Name is required";
            $valid = false;
        }else {
            $b_name = mysqli_real_escape_string($connection, $_POST['a_name']);
        }

        $aName = $_POST['a_name'];
        if (empty($aName)) {
            $error_msg['a_name'] = "Author name is required";
            $valid = false;
        } else {
            $a_name = mysqli_real_escape_string($connection, $_POST['a_name']);
        }

        $bDescription = nl2br($_POST['description']);
        if (strlen($bDescription) > 500) {
            $error_msg['description'] = "Max character allowed is 500";
        } else {
            $description =  mysqli_real_escape_string($connection, $_POST['description']);
        }



        if ($_FILES['img_file']['name']) {
            if (($_FILES['img_file']['size'] <= (1024 * 1024)) and (($_FILES['img_file']['type'] == "image/jpeg") or ($_FILES['img_file']['type'] == "image/png"))) {
                move_uploaded_file($_FILES['img_file']['tmp_name'], "uploads/". $_FILES['img_file']['name']);
                $img_file = $_FILES['img_file']['name'];
            } else {
                $error_msg['img_file'] = "Please upload image in jpg/png format and max 1 mb";
                $valid = false;
            }
        } else {
             
            $valid = true;
        }

        if ($valid) {
            if ($_FILES['img_file']['name']) {
                $update_query = "UPDATE `bookshelf` SET `bName`=' $b_name',`bAuthor`=' $a_name',`bUrl`='$url',`bDescription`='$description',`bImage`='$img_file' WHERE `bID` = $id";
            } else {
                $update_query = "UPDATE `bookshelf` SET `bName`=' $b_name',`bAuthor`=' $a_name',`bUrl`='$url',`bDescription`='$description'  WHERE `bID` = $id";
            }
            $query_run = mysqli_query($connection, $update_query);
            if ($query_run) { ?>
                <script type="text/javascript">
	            alert("data Updated  Successfully!");
	            window.location.href="/bookshelf/BookDetails.php?id=<?php echo $row['bId'] ?>";
				</script>
                <?php
            } else {
                echo '<script language = "javascript">';
                echo 'alert("Book not updated ");';
                echo '</script>';
            }
        } else {
            echo '<script language = "javascript">';
            echo 'alert("Please fill all the required fields properly");';
            echo '</script>';
        }
    }
    ?>
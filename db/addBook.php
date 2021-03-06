 <?php

    require_once "connect.php";

    if (isset($_POST['add'])) {

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
        } else {
            $b_name = mysqli_real_escape_string($connection,$_POST['b_name']);
        }

        $aName = $_POST['a_name'];
        if (empty($aName)) {
            $error_msg['a_name'] = "Author name is required";
            $valid = false;
        } else {
            $a_name =  mysqli_real_escape_string($connection,$_POST['a_name']);
        }

        $bDescription = nl2br($_POST['description']);
        if (strlen($bDescription) > 500){
            $error_msg['description'] = "Max character allowed is 500";
        }else{
            $description =  mysqli_real_escape_string($connection, $_POST['description']);
        }

        if ($_FILES['img_file']['name']) {
            if (($_FILES['img_file']['size'] <= (1024 * 1024)) and (($_FILES['img_file']['type'] == "image/jpeg") or ($_FILES['img_file']['type'] == "image/png"))) {
                move_uploaded_file($_FILES['img_file']['tmp_name'], "uploads/" . $_FILES['img_file']['name']);
                $img_file = $_FILES['img_file']['name'];
            } else {
                $error_msg['img_file'] = "Please upload image in jpg/png format and max 1 mb";
                $valid = false;
            }
        } else {

            $valid = true;
        }


        if ($valid) {
            $insert_query = "INSERT INTO `bookshelf`(`bName`, `bAuthor`, `bUrl`,`bDescription`, `bImage`) 
             VALUES ('$b_name',' $a_name','$url' ,'$description','$img_file' )";

            $query_run = mysqli_query($connection, $insert_query);
            if ($query_run) {
                echo '<script language = "javascript">';
                echo 'alert("Book added successfully");  location.href = "BookDetails.php"';
                echo '</script>';
            } else {
                echo '<script language = "javascript">';
                echo 'alert("Book added successfully");';
                echo '</script>';
            }
        } else {
            echo '<script language = "javascript">';
            echo 'alert("Please fill all the required fields properly");';
            echo '</script>';
        }
    }
    ?>
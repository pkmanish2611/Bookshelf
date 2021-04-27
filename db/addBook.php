 <?php

    require_once "connect.php"; 

    if (isset($_POST['add'])) {

        $b_name = "";
        $a_name = "";
        $url = $_POST['url'];
        $description = $_POST['description'];
        $img_file = $_FILES['img_file']['name'];

        $valid = true;
        $name = $_POST['b_name'];
        if (empty($name)) {
            $error_msg['b_name'] = "Name is required";
            $valid = false;
        }else{
            $b_name = $_POST['b_name'];
        }

        $aName = $_POST['a_name'];
        if (empty($aName)) {
            $error_msg['a_name'] = "Author name is required";
            $valid = false;
        }else{
            $a_name = $_POST['a_name'];
        }



        if ($_FILES['img_file']['name']) {
            if (($_FILES['img_file']['size'] <= (1024 * 1024)) and (($_FILES['img_file']['type'] == "image/jpeg") or ($_FILES['img_file']['type'] == "image/png"))) {
                move_uploaded_file($_FILES['img_file']['tmp_name'], "uploads/"  . time() . rand() . "-" . $_FILES['img_file']['name']);
            } else {
                $error_msg['img_file'] = "Please upload image in jpg/png format and max 1 mb";
                $valid = false;
            }
        } else {
            $error_msg['img_file'] = "Image is required";
            $valid = false;
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
        }else{
            echo '<script language = "javascript">';
            echo 'alert("Please fill all the required fields properly");';
            echo '</script>';

        }
    }
    ?>
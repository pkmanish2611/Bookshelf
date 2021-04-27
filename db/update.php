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
        $description = $_POST['description'];
        $img_file = $_FILES['img_file']['name'];

        $valid = true;
        $name = $_POST['b_name'];
        if (empty($name)) {
            $error_msg['b_name'] = "Name is required";
            $valid = false;
        } else if (!preg_match("/^[a-zA-Z -]*$/", $name)) {
            $error_msg['b_name'] = "Only letters allowed";
            $valid = false;
        } else {
            $b_name = $_POST['b_name'];
        }

        $aName = $_POST['a_name'];
        if (empty($aName)) {
            $error_msg['a_name'] = "Author name is required";
            $valid = false;
        } else if (!preg_match("/^[a-zA-Z -]*$/", $aName)) {
            $error_msg['a_name'] = "Only letters allowed";
            $valid = false;
        } else {
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
            $update_query = "UPDATE `bookshelf` SET `bName`=' $b_name',`bAuthor`=' $a_name',`bUrl`='$url',`bDescription`='$description',`bImage`='$img_file' WHERE `bID` = $id";

            $query_run = mysqli_query($connection, $update_query);
            if ($query_run) {
                echo '<script language = "javascript">';
                echo 'alert("Book updated successfully");  location.href = "BookDetails.php?id=?><?php echo $id; ?><?php"';
                echo '</script>';
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
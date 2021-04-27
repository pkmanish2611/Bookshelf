 
<!DOCTYPE html>
<html>

<head>
    <!-- linking the libraries and scripts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.modal').modal();
        });
    </script>

    <title>Book Details</title>
</head>
<header>
    <h3>
        <center>E-Library</center>
    </h3>
</header>

<!-- making nav bar with a home and Edit Details button -->
<nav class="nav-wrapper">
    <div class="container">

        <ul id="nav-mobile" class="Left">
            <li class="Left"><a href="index.php" class="btn brand ">Home</a></li>
            <li class="right"><a href="Edit.php?id=<?php echo $data['id'] ?>" class="btn brand ">Edit Details</a></li>

            <!--         making a modal for confirmation message -->

            <div class="container">

                <button data-target="terms" class="btn modal-trigger ">Delete</button>

                <div class="modal" id="terms">

                    <div class="modal-content black-text">

                        <!-- Confirmaton message -->

                        <h4>Are you sure ?</h4>
                        <p>This data will not be retrieved back after deleted once.</p>
                        <a href="delete.php?id=<?php echo $data['id'] ?>" class="modal-close btn">Sure</a>
                        <a href="#" class="modal-close btn">Cancel</a>

                    </div>
                </div>
            </div>


        </ul>
</nav>

<body class="center" style="background-color:#ffe6e6; background-position:center; background-size:cover;background-attachment: fixed;">
    <center>
        <h4>Happy reading!</h4>
    </center>
    <div class="row">
        <div class="container">
            <div class="col m12 l5">
                <div class="card z-depth=0">
                    <div class="card-content center">
                        <div class="card-image"><img src="<?php echo ($data['cover_image']); ?>"></div>
                    </div>
                </div>

            </div>
            <div class="center-align">
                <h4><?php echo htmlspecialchars($data['name']); ?><br><br>by<br></h4>
                <h4><?php echo htmlspecialchars($data['author_name']); ?></h4>
                <h5>Description</h5>
                </center>
                <h5 class="black-text darken-4"><?php echo htmlspecialchars($data['description']); ?><br><br></h5>
                <a class="waves-effect waves-light btn" href="<?php echo $data['pdf'] ?>">Read Book</a>
            </div>
        </div>
    </div>
</body>

</html>
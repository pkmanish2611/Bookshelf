<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap icon-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <!-- concatenating the title of index to header it will look like this-- Bookshelf - home-->
    <title>Bookshelf - <?php echo $title ?></title>
    <!--importing css-->
    <link rel="stylesheet" href="main.css">
</head>

<body>
<<<<<<< HEAD

    <!-- Bootstrap Navigation bar -->
    <nav class="navbar sticky-top navbar-expand-lg navbar-light  ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="component/images/library.png" alt="" width="50" height="50" class="d-inline-block align-text-bottom">
=======
    <!-- Bootstrap Navigation bar -->

    <nav class="navbar sticky-top navbar-expand-lg navbar-light  ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="library.png" alt="" width="50" height="50" class="d-inline-block align-text-bottom">
>>>>>>> 74e366ebf5e1a347d9ed07f14f81d3836c6cb485
                Bookshelf !
            </a>
            <!-- Bootstrap button toggler for responsiveness of header-->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav ml-auto">
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search here" aria-label="Search">
                    </form>
                    <li class="nav-item active">
                        <a class="nav-link " aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="#">Add Book</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
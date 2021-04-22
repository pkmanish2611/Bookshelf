<?php
ob_start();
require 'db/connect.php';
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap icon-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="main.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Bookshelf - <?php echo $title ?></title>


</head>

<body>

    <!-- Bootstrap Navigation bar -->
    <nav class="navbar sticky-top navbar-expand-lg navbar-light  ">
        <div class="container-fluid">
            <a class="navbar-brand" href="http://localhost/Bookshelf/">
                <img src="templates/logo/library.png" alt="" width="50" height="50" class="d-inline-block align-text-bottom">
                Bookshelf !
            </a>
            <!-- Bootstrap button toggler for responsiveness of header-->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav ml-auto">
                    <form class="d-flex" method="post" action="">
                        <input class="form-control form_c" type="search" placeholder="Search for books..." aria-label="Search" name="search">
                        <button class="btn btn-outline-success btn1" type="submit"><i class="bi bi-search"></i></button>
                    </form>
                    <li class="nav-item active">
                        <a class="nav-link " aria-current="page" href="http://localhost/Bookshelf/">Home</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="AddBook.php">Add Book</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<?php
    // session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read Books</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/ReadBook/assc/css/style.css">
     <link rel="stylesheet" href="http://localhost/ReadBook/assc/js/jquery-ui/jquery-ui.css">
    <link rel="stylesheet" href="http://localhost/ReadBook/assc/js/jquery-ui/jquery-ui.structure.css">
    <link rel="stylesheet" href="http://localhost/ReadBook/assc/js/jquery-ui/jquery-ui.theme.css">
    <style>
   
    </style>

</head>
<body data-spy="scroll" data-target="#myScrollspy" data-offset="15">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="http://localhost/ReadBook">Logo</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="http://localhost/ReadBook">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="http://localhost/ReadBook">Find Books <span class="sr-only">(current)</span></a>
      </li>
     
     
     
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
    </form>
    <ul class="navbar-nav ml-auto">

    <?php 
        if(isset($_SESSION['user_id'])) {  
    ?>
    <li class="nav-item active">
        <a class="nav-link btn btn-outline-danger my-2 my-sm-0" href="http://localhost/ReadBook/logout.php">logout<span class="sr-only"></span></a>
      </li>

    <?php } else {?>
     <li class="nav-item dropdown">
        <a class="nav-link btn btn-outline-success my-2 my-sm-0" href="http://localhost/ReadBook/account">Login/Signup<span class="sr-only"></span></a>
      </li>
    <?php } ?> 
      </ul>
  </div>
</nav>
  
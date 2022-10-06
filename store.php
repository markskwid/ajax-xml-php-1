<?php
session_start();



?>


<!doctype html>
<html lang="en" class="h-100">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.87.0">
  <title>Egg Kineso Store</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/cover/">



  <!-- Bootstrap core CSS -->
  <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="css/cover.css" rel="stylesheet">
</head>

<body class="d-flex h-100">

  <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="mb-4">
      <div>
        <h3 class="float-md-start mb-0">
          <img src="images/logo.png" height="50" width="50"> Egg Kineso
        </h3>
        <nav class="nav nav-masthead justify-content-center float-md-end">
          <a class="nav-link active text-black" aria-current="page" href="php/logout.php">Logout</a>
        </nav>
      </div>
    </header>

    <div class="containerProduct">
      
    </div>

    <footer class="mt-auto text-50">
      <nav class="nav nav-masthead justify-content-center float-md-center">
        <a class="nav-link active text-black" aria-current="page" href="store.php?category=all">All</a>
        <a class="nav-link active text-black" href="store.php?category=food">Food</a>
        <a class="nav-link active text-black" href="store.php?category=drinks">Drinks</a>
      </nav>
    </footer>

  </div>



</body>

</html>
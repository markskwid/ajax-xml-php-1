<?php
session_start();
$_SESSION;

include("php/connections.php");
include("php/functions.php");

$user_data = account_check_login($con);






?>


<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.87.0">
    <title>Egg Kineso Admin Page</title>

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
  <body class="d-flex h-100 text-center bg-warning">
    
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  <header class="mb-4">
    <div>
      <h3 class="float-md-start mb-0">Egg Kineso</h3>
      <nav class="nav nav-masthead justify-content-center float-md-end">
        <a class="nav-link active" aria-current="page" href="php/logout.php">Logout</a>
      </nav>
    </div>
  </header>

    
  <main class="px-3"> 

      <div class="row">
          <div class="col-12 table-responsive">
              <table class="table table-hover">
                  <thead>
                      <tr>
                        <th col="1">Select</th>
                        <th col="1">ID</th>
                        <th col="8">Item Name</th>
                        <th col="1">Quantity</th>
                        <th col="1">Price</th>
                     </tr>                    
                  </thead>
                  <tbody>
                  <?php

                  $query = "SELECT * FROM item_table";
                  $result = mysqli_query($con, $query);

                  while($row = mysqli_fetch_assoc($result)){
                    echo'
                     <tr>
                         <td> <input type="checkbox" value="'.$row['id'].'"> </td>
                         <td> '.$row['id'].' </td>
                         <td> '.$row['item_name'].' </td>
                         <td> '.$row['quantity'].' </td>
                         <td> Php '.$row['price'].'.00 </td>
                     </tr>';
                  }
                     ?>
                  </tbody>
              </table>
          </div>
      </div>
  </main>
  <footer class="mt-auto text-white-50">
  <nav class="nav nav-masthead justify-content-center float-md-center">
        <a class="nav-link active"  href="upload.php">Upload</a>
        <a class="nav-link active" href="#">Remove</a>
        <a class="nav-link active" href="#">Update</a>
      </nav>
  </footer>
  
</div>


    
  </body>
</html>

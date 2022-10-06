<?php
session_start();
$_SESSION;

include("php/connections.php");
include("php/functions.php");

$user_data = account_check_login($con);

if(!empty($name)){
  $category = $_POST['category'];
  $name = $_POST['name'];
  $quantity = $_POST['quantity'];
  $price = $_POST['price'];
  $id = 10003;
 
  if (isset($_POST['submit'])) {
  $file = $_FILES['file'];
  
  $filename = $_FILES['file']['name'];
  $filetmpname = $_FILES['file']['tmp_name'];
  $filesize = $_FILES['file']['size'];
  $fileerror = $_FILES['file']['error'];
  $filetype = $_FILES['file']['type'];


  $fileExt = explode('.', $filename);
  $fileActualExt = strtolower(end($fileExt));

  $allowed = array('jpg', 'png');

  if(in_array($fileActualExt, $allowed)){
    if($fileerror === 0){
      if($filesize <100000){
          $filenewname = $id.".".$fileActualExt;
          $filedestination = 'images/'.$filenewname;
          move_uploaded_file($filetmpname, $filedestination);

          $query1 = "insert into item_table(id, type1, item_name, quantity, price) 
          values('$id', '$category', '$name', '$quantity', '$price')";
       
          $result = mysqli_query($con, $query1);

          echo $filenewname."<br>";
          echo $category."<br>";

          header("Location: admin.php");
          die;
      }else{
        echo "Your file is too big!";
      }
    }else{
      echo "There was an error uploading your file!";
    }
  } else{
    echo "You cannot upload files of this type!";
  }
}
}



?>


<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.87.0">
    <title>Upload New Item</title>

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

    
  <main class="px-3 mt-4">

        <form method="post" enctype="multipart/form-data">
            <div class="form-floating">
                <input list="category" class="form-control" id="floatingInput" autocomplete="off" placeholder="Item Name" name="category">
                <datalist id="category">
                    <option value="Food"></option>
                    <option value="Drinks"></option>
                </datalist>
                <label for="floatingInput">Category</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" autocomplete="off" placeholder="Item Name" name="name">
                <label for="floatingInput">Item Name</label>
            </div>
            <div class="form-floating">
            <input type="text" class="form-control" id="floatingInput" autocomplete="off" placeholder="Quantity" name="quantity">
                <label for="floatingInput">Quantity</label>
            </div>
            <div class="form-floating">
            <input type="text" class="form-control" id="floatingInput" autocomplete="off" placeholder="Price" name="price">
                <label for="floatingInput">Price</label>
            </div>
            <div class="form-floating">
            <input type="file" class="form-control" name="file">
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Add Item</button>
        </form>
       
  </main>
  <footer class="mt-auto text-white-50">
  <nav class="nav nav-masthead justify-content-center float-md-center">
        <a class="nav-link active"  href="admin.php">Back to Admin</a>
      </nav>
  </footer>
  
</div>


    
  </body>
</html>

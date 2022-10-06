<?php
session_start();
$xml = new domdocument();
$xml->load("./xml/account.xml");
$account = $xml->getElementsByTagName("myadmin");
$note = "";
if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  foreach ($account as $acc) {
    $stored_username = $acc->getElementsByTagName("username")->item(0)->nodeValue;
    $stored_password = $acc->getElementsByTagName("password")->item(0)->nodeValue;

    if ($stored_password == $username) {
      if ($stored_password == $password) {
        header("location: ./home.php");
      } else {
        $note = "wrong password";
      }
    } else {
      $note = "cannot find your account";
    }
  }
}

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.87.0">
  <title>Egg Kineso Homepage</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">



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
  <link href="css/signin.css" rel="stylesheet">
</head>

<body class="text-center">

  <main class="form-signin">
    <form method="post">
      <img class="mb-4" src="images/logo.png" alt="" width="200" height="200">
      <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

      <div class="form-floating">
        <input type="text" class="form-control" id="floatingInput" autocomplete="off" placeholder="Username" name="username">
        <label for="floatingInput">Username</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
        <label for="floatingPassword">Password</label>
      </div>
      <button class="w-100 btn btn-lg btn-primary" name="submit" type="submit">Sign in</button>
    </form>
    <?php echo $note ?>
  </main>



</body>

</html>
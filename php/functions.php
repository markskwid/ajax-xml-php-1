<?php


function account_check_login($con)

{

if(isset($_SESSION['id']))
  {
    $user = $_SESSION['id'];
    $query = "SELECT * FROM accounts WHERE id = '$user';";

    $result = mysqli_query($con,$query);
    if($result && mysqli_num_rows($result) > 0)
    {
        $user_data = mysqli_fetch_assoc($result);
        return $user_data;

    }
  } 
}



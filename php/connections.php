<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "eggkineso";


$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname); 

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

    die("Failed to connect!");

}
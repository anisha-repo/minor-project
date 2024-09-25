<?php
$servername="localhost";
$username="root";
$password="";
$database = "solemate";
$connection = mysqli_connect($servername ,$username,$password,$database);

//creating database

 
if(!$connection){
    die("connection failed".mysqli_connect_error());
} 
?>

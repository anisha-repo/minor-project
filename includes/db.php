<?php
$servername="localhost";
$username="root";
$password="";
$database = "mysql";
$connection = mysqli_connect($servername ,$username,$password,$database);

if(!$connection){
    die("connection failed".mysqli_connect_error());
}
?>
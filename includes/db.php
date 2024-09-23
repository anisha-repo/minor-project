<?php
$servername="localhost";
$username="root";
$password="";
$connection=new PDO("mysql:host=$servername; soulemate",$username,$password);
if(!$connection){
    die("connection failed".mysqli_error());
}
?>

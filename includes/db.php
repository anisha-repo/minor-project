<?php
$servername="localhost";
$username="root";
$password="mysql";
$connection=new PDO("mysql:host=$servername; soulemate",$username,$password);
if(!$connection){
    die("connection failed".mysqli_error());
}
?>
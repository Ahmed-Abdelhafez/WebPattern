<?php 

$user = 'root';
$password = 'root';
$db = 'webPattern';
$host = 'localhost';
$port = 3307;

$success = mysqli_connect(
   $host, 
   $user, 
   $password, 
   $db,
   $port
);


if(!$success){
    die("Database connection failed!");
}



?>
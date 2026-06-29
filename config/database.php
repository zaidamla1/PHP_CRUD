<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "crud_db";

$conn = new mysqli($host,$user,$password,$database);

if($conn->connect_error){
    die("Connection Failed");
}

$conn->set_charset("utf8mb4");

?>
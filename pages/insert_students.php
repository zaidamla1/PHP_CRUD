<?php
require_once "../config/database.php";

$name = $_POST['name'];
$email = $_POST['email'];
$city = $_POST['city'];
$course = $_POST['course'];

$stmt = $conn->prepare("INSERT INTO students (name,email,city,course) VALUES(?,?,?,?)");

$stmt->bind_param("ssss",$name,$email,$city,$course);

if($stmt->execute()){
    header("Location:view_students.php");
}

?>
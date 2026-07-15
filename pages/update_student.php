<?php
require_once "../config/database.php";
$id = trim($_POST['id']);
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$city = trim($_POST['city']);


if (empty($name) || empty($email) || empty($city) || empty($course)) {
    header("Location:add_students.php?msg=All fields are compulsory");
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location:add_students.php?msg=Email must be proper");
    exit;
}

// Duplicate EMail check and current student email

$check->conn->prepare("SELECT id FROM students WHERE email = ? AND id = ?");

$check->bind_param("si",$email,$id);

$check->execute();

$result = $check->get_result();

if($result->num_rows > 0){
    die("Email already exist");
}


$stmt = $conn->prepare("UPDATE students SET name = ?, city = ? WHERE id = ?");

$stmt->bind_param("ssi", $name, $city, $id);
$stmt->execute();

header("Location:view_students.php");
exit;
?>
<?php
require_once "../config/database.php";
$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$city = $_POST['city'];

$stmt = $conn->prepare("UPDATE students SET name = ?, city = ? WHERE id = ?");

$stmt->bind_param("ssi", $name, $city, $id);
$stmt->execute();

header("Location:view_students.php");
exit;
?>
<?php
require_once "../config/database.php";

$name = trim($_POST['name']);
$email = trim($_POST['email']);
$city = trim($_POST['city']);
$course = trim($_POST['course']);

if (empty($name) || empty($email) || empty($city) || empty($course)) {
    header("Location:add_students.php?msg=All fields are compulsory");
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location:add_students.php?msg=Email must be proper");
    exit;
}

// Duplicate EMail check

$check = $conn->prepare("SELECT id FROM students WHERE email = ?");

$check->bind_param("s",$email);

$check->execute();

$result = $check->get_result();

if($result->num_rows > 0){
    header("Location:add_students.php?msg=Email already exist");
    exit;
}



$stmt = $conn->prepare("INSERT INTO students (name,email,city,course) VALUES(?,?,?,?)");

$stmt->bind_param("ssss", $name, $email, $city, $course);

if ($stmt->execute()) {
    header("Location:view_students.php");
}else{
    echo "Insert failed";
}

?>
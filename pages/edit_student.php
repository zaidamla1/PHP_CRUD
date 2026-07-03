<?php
require_once "../config/database.php";
$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * from students WHERE id = ?");
$stmt->bind_param("i",$id);
$stmt->execute();

$result = $stmt->get_result();
$student = $result->fetch_assoc();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            background: #f4f6f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 400px;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.15);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            color: #555;
        }

        input,
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 15px;
        }

        input:focus,
        select:focus {
            outline: none;
            border-color: #007bff;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Update Student</h2>

        <form action="update_student.php" method="post">
            <div class="form-group">
                <input type="hidden" name="id" value="<?=$student['id']?>">

                <label for="name">Student Name</label>
                <input type="text" value="<?=$student['name']?>" id="name" name="name"  placeholder="Enter student name" required>
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" readonly disabled value="<?=$student['email']?>" id="email" name="email" placeholder="Enter email" required>
            </div>

            <div class="form-group">
                <label for="city">City</label>
                <input type="text" value="<?=$student['city']?>" name="city" id="city" placeholder="Enter city" required>
            </div>


            <button type="submit">Update</button>
        </form>
    </div>

</body>
</html>
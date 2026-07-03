<?php
require_once "../config/database.php";

$result = $conn->query("SELECT * FROM students");

?>
<table border="2" cellpadding="12px">

    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>City</th>
        <th>Course</th>
        <th>Action</th>
    </tr>
    <?php
    while ($row = $result->fetch_assoc()): ?>

        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['city'] ?></td>
            <td><?= $row['course'] ?></td>
            <td>
                <a href="edit_student.php?id=<?= $row['id'] ?>">Edit</a> | <a href="delete_student.php?id=<?= $row['id'] ?>">Delete</a>
            </td>
        </tr>
    <?php endwhile; ?>

</table>
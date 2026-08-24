<?php
include "db_config.php";

$name = $conn->real_escape_string($_POST['name']);
$email = $conn->real_escape_string($_POST['email']);
$age = $conn->real_escape_string($_POST['age']);
$dob = $conn->real_escape_string($_POST['dob']);
$gender = $conn->real_escape_string($_POST['gender']);
$department = $conn->real_escape_string($_POST['department']);

$sql = "INSERT INTO students (name, email, age, dob, gender, department)
        VALUES ('$name', '$email', $age, '$dob', '$gender', '$department')";

if ($conn->query($sql) === TRUE) {
    echo "New student added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
<br><a href="index.php">Back to Home</a>

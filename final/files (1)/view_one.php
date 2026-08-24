<?php
include "db_config.php";

if (isset($_GET['id'])) {
    $id = $conn->real_escape_string($_GET['id']);
    $sql = "SELECT id, name, email, age, dob, gender, department FROM students WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<h2>Student Details</h2>";
        echo "ID: " . $row["id"] . "<br>";
        echo "Name: " . $row["name"] . "<br>";
        echo "Email: " . $row["email"] . "<br>";
        echo "Age: " . $row["age"] . "<br>";
        echo "DOB: " . $row["dob"] . "<br>";
        echo "Gender: " . $row["gender"] . "<br>";
        echo "Department: " . $row["department"] . "<br>";
    } else {
        echo "No student found with that ID";
    }
    $conn->close();
} else {
?>
    <h2>View One Student</h2>
    <form action="view_one.php" method="get">
        Enter Student ID: <input type="number" name="id" required>
        <input type="submit" value="View">
    </form>
<?php
}
?>
<br><a href="index.php">Back to Home</a>

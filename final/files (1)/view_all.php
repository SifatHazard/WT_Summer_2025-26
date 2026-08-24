<?php
include "db_config.php";

$sql = "SELECT id, name, email, age, dob, gender, department FROM students";
$result = $conn->query($sql);

echo "<h2>All Students</h2>";

if ($result->num_rows > 0) {
    echo "<table border='1' cellpadding='5'>
          <tr><th>ID</th><th>Name</th><th>Email</th><th>Age</th><th>DOB</th><th>Gender</th><th>Department</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["name"] . "</td>
                <td>" . $row["email"] . "</td>
                <td>" . $row["age"] . "</td>
                <td>" . $row["dob"] . "</td>
                <td>" . $row["gender"] . "</td>
                <td>" . $row["department"] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No records found";
}

$conn->close();
?>
<br><a href="index.php">Back to Home</a>

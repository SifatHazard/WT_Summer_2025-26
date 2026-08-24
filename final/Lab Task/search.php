<?php
include "db_config.php";

if (isset($_GET['keyword'])) {
    $keyword = $conn->real_escape_string($_GET['keyword']);
    $sql = "SELECT id, name, email, age, dob, gender, department
            FROM students
            WHERE name LIKE '%$keyword%' OR department LIKE '%$keyword%'";
    $result = $conn->query($sql);

    echo "<h2>Search Results for '" . $keyword . "'</h2>";

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
        echo "No matching records found";
    }
    $conn->close();
} else {
?>
    <h2>Search Student</h2>
    <form action="search.php" method="get">
        Enter Name or Department: <input type="text" name="keyword" required>
        <input type="submit" value="Search">
    </form>
<?php
}
?>
<br><a href="index.php">Back to Home</a>

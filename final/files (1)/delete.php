<?php
include "db_config.php";

if (isset($_GET['id'])) {
    $id = $conn->real_escape_string($_GET['id']);
    $sql = "DELETE FROM students WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Student deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    $conn->close();
} else {
?>
    <h2>Delete Student</h2>
    <form action="delete.php" method="get" onsubmit="return confirm('Are you sure you want to delete this student?');">
        Enter Student ID to delete: <input type="number" name="id" required>
        <input type="submit" value="Delete">
    </form>
<?php
}
?>
<br><a href="index.php">Back to Home</a>

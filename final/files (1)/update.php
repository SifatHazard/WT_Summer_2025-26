<?php
include "db_config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process the update
    $id = $conn->real_escape_string($_POST['id']);
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $age = $conn->real_escape_string($_POST['age']);
    $dob = $conn->real_escape_string($_POST['dob']);
    $gender = $conn->real_escape_string($_POST['gender']);
    $department = $conn->real_escape_string($_POST['department']);

    $sql = "UPDATE students SET
                name='$name', email='$email', age=$age,
                dob='$dob', gender='$gender', department='$department'
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Student updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
    $conn->close();

} else if (isset($_GET['id'])) {
    // Show pre-filled edit form
    $id = $conn->real_escape_string($_GET['id']);
    $sql = "SELECT * FROM students WHERE id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
?>
    <h2>Update Student</h2>
    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        Name: <input type="text" name="name" value="<?php echo $row['name']; ?>"><br><br>

        Email: <input type="email" name="email" value="<?php echo $row['email']; ?>"><br><br>

        Age: <input type="number" name="age" value="<?php echo $row['age']; ?>"><br><br>

        DOB: <input type="date" name="dob" value="<?php echo $row['dob']; ?>"><br><br>

        Gender:
        <input type="radio" name="gender" value="Male" <?php if ($row['gender'] == "Male") echo "checked"; ?>> Male
        <input type="radio" name="gender" value="Female" <?php if ($row['gender'] == "Female") echo "checked"; ?>> Female
        <br><br>

        Department:
        <select name="department">
            <option value="CSE" <?php if ($row['department'] == "CSE") echo "selected"; ?>>CSE</option>
            <option value="EEE" <?php if ($row['department'] == "EEE") echo "selected"; ?>>EEE</option>
            <option value="BBA" <?php if ($row['department'] == "BBA") echo "selected"; ?>>BBA</option>
            <option value="CE" <?php if ($row['department'] == "CE") echo "selected"; ?>>CE</option>
        </select><br><br>

        <input type="submit" value="Update Student">
    </form>
<?php
    $conn->close();
} else {
    // Ask which student to edit
?>
    <h2>Update Student</h2>
    <form action="update.php" method="get">
        Enter Student ID to edit: <input type="number" name="id" required>
        <input type="submit" value="Find">
    </form>
<?php
}
?>
<br><a href="index.php">Back to Home</a>

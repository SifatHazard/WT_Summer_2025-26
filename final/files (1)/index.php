<!DOCTYPE html>
<html>
<head>
    <title>Student Record System</title>
</head>
<body>

    <h2>Add New Student</h2>
    <form action="insert.php" method="post">

        Name: <input type="text" name="name" required><br><br>

        Email: <input type="email" name="email" required><br><br>

        Age: <input type="number" name="age" min="1" required><br><br>

        Date of Birth: <input type="date" name="dob" required><br><br>

        Gender:
        <input type="radio" name="gender" value="Male" checked> Male
        <input type="radio" name="gender" value="Female"> Female
        <br><br>

        Department:
        <select name="department">
            <option value="CSE">CSE</option>
            <option value="EEE">EEE</option>
            <option value="BBA">BBA</option>
            <option value="CE">CE</option>
        </select><br><br>

        <input type="submit" value="Add Student">
    </form>

    <hr>
    <h3>Other Actions</h3>
    <a href="view_all.php">View All Students</a> |
    <a href="view_one.php">View One Student</a> |
    <a href="update.php">Update Student</a> |
    <a href="delete.php">Delete Student</a> |
    <a href="search.php">Search Student</a>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP SQL connection</title>
    <link rel="stylesheet" href="show_data_styles.css">
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Bondad";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

$sql = "SELECT * FROM student";
$result = $conn->query($sql);
echo "STUDENTS LIST: <br>";
if ($result) {
    echo "<table border='1'>";
    echo "<tr><th>Student ID</th><th>Name</th><th>Birthdate</th><th>Email</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["StudentID"] . "</td>";
        echo "<td>" . $row["LastName"] . ", " . $row["FirstName"] . "</td>";
        echo "<td>" . $row["DateOfBirth"] . "</td>";
        echo "<td>" . $row["Email"] . "</td>";
        echo "</tr>";
    }

    echo "</table><br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$sql = "SELECT * FROM instructor";
$result = $conn->query($sql);
echo "INSTRUCTORS LIST: <br>";
if ($result) {
    echo "<table border='1'>";
    echo "<tr><th>Instructor ID</th><th>Name</th><th>Email</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["InstructorID"] . "</td>";
        echo "<td>" . $row["LastName"] . ", " . $row["FirstName"] . "</td>";
        echo "<td>" . $row["Email"] . "</td>";
        echo "</tr>";
    }

    echo "</table><br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$sql = "SELECT * FROM course";
$result = $conn->query($sql);
echo "COURSES LIST: <br>";
if ($result) {
    echo "<table border='1'>";
    echo "<tr><th>Course ID</th><th>Course</th><th>Credits</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["CourseID"] . "</td>";
        echo "<td>" . $row["CourseName"] . "</td>";
        echo "<td>" . $row["Credits"] . "</td>";
        echo "</tr>";
    }

    echo "</table><br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$sql = "SELECT * FROM enrollment";
$result = $conn->query($sql);
echo "ENROLLMENT LIST: <br>";
if ($result) {
    echo "<table border='1'>";
    echo "<tr><th>Enrollment ID</th><th>Student ID</th><th>Course ID</th><th>Date</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["EnrollmentID"] . "</td>";
        echo "<td>" . $row["StudentID"] . "</td>";
        echo "<td>" . $row["CourseID"] . "</td>";
        echo "<td>" . $row["EnrollmentDate"] . "</td>";
        echo "</tr>";
    }

    echo "</table><br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>

<footer>
    <button onclick="location.href='delete.php'" style="position: fixed; bottom: 20px; right: 20px;">Delete Data</button>
    <button onclick="location.href='update_data.php'" style="position: fixed; bottom: 20px; right: 190px;">Update Data</button>
    <button onclick="location.href='add_data.php'" style="position: fixed; bottom: 20px; right: 360px;">Add Data</button>
    <button onclick="location.href='show_data.php'" style="position: fixed; bottom: 20px; right: 530px;">Show Data</button>
</footer>

</body>
</html>

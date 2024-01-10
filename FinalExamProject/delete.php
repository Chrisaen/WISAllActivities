<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Student Data</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<form id="form1" class="form" method="post">
    <label for="studentID">Student ID:</label>
    <input type="number" id="studentID" name="studentID" required><br>
    <label for="lastName">Last Name:</label>
    <input type="text" id="lastName" name="lastName" required><br>
    <input type="submit" name="deleteSubmit1" value="Delete Student">
</form>

<form id="form2" class="form" method="post">
    <label for="instructorID">Instructor ID:</label>
    <input type="number" id="instructorID" name="instructorID" required><br>
    <label for="lastName">Last Name:</label>
    <input type="text" id="lastName" name="lastName" required><br>
    <input type="submit" name="deleteSubmit2" value="Delete Instructor">
</form>

<form id="form3" class="form" method="post">
    <label for="courseID">Course ID:</label>
    <input type="number" id="courseID" name="courseID" required><br>
    <label for="courseName">Course Name:</label>
    <input type="text" id="courseName" name="courseName" required><br>
    <input type="submit" name="deleteSubmit3" value="Delete Course">
</form>

<form id="form4" class="form" method="post">
    <label for="enrollmentID">Enrollment ID:</label>
    <input type="number" id="enrollmentID" name="enrollmentID" required><br>
    <label for="studentID">Student ID:</label>
    <input type="number" id="studentID" name="studentID" required><br>
    <input type="submit" name="deleteSubmit4" value="Delete Enrollment">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Bondad";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    function deleteRecord($conn, $table, $idField, $lastNameField, $id, $lastName) {
        $stmt = $conn->prepare("DELETE FROM $table WHERE $idField = ? AND $lastNameField = ?");
        $stmt->bind_param("is", $id, $lastName);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "$table with ID $id and Name $lastName deleted successfully.";
        } else {
            echo "No matching $table found with provided ID and Last Name.";
        }

        $stmt->close();
    }

    if (isset($_POST["deleteSubmit1"])) {
        deleteRecord($conn, "Student", "StudentID", "LastName", $_POST["studentID"], $_POST["lastName"]);
    } elseif (isset($_POST["deleteSubmit2"])) {
        deleteRecord($conn, "Instructor", "InstructorID", "LastName", $_POST["instructorID"], $_POST["lastName"]);
    } elseif (isset($_POST["deleteSubmit3"])) {
        deleteRecord($conn, "Course", "CourseID", "CourseName", $_POST["courseID"], $_POST["courseName"]);
    } elseif (isset($_POST["deleteSubmit4"])) {
        deleteRecord($conn, "Enrollment", "EnrollmentID", "StudentID", $_POST["enrollmentID"], $_POST["studentID"]);
    }

    $conn->close();
}
?>
<footer>
    <button onclick="location.href='delete.php'" style="position: fixed; bottom: 20px; right: 20px;">Delete Data</button>
    <button onclick="location.href='update_data.php'" style="position: fixed; bottom: 20px; right: 190px;">Update Data</button>
    <button onclick="location.href='add_data.php'" style="position: fixed; bottom: 20px; right: 360px;">Add Data</button>
    <button onclick="location.href='show_data.php'" style="position: fixed; bottom: 20px; right: 530px;">Show Data</button>
</footer>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Data</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

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

    if (isset($_POST["studentSubmit"])) {
        $studentID = $_POST["studentID"];
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $dateOfBirth = $_POST["dateOfBirth"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];

        $stmt = $conn->prepare("INSERT INTO Student (StudentID, FirstName, LastName, DateOfBirth, Email, Phone) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("isssss", $studentID, $firstName, $lastName, $dateOfBirth, $email, $phone);
        $stmt->execute();

        $stmt->close();

    } elseif (isset($_POST["courseSubmit"])) {
        $courseID = $_POST["courseID"];
        $courseName = $_POST["courseName"];
        $credits = $_POST["credits"];

        $stmt = $conn->prepare("INSERT INTO Course (CourseID, CourseName, Credits) VALUES (?, ?, ?)");
        $stmt->bind_param("isi", $courseID, $courseName, $credits);
        $stmt->execute();

        $stmt->close();

    } elseif (isset($_POST["instructorSubmit"])) {
        $instructorID = $_POST["instructorID"];
        $instructorFirstName = $_POST["instructorFirstName"];
        $instructorLastName = $_POST["instructorLastName"];
        $instructorEmail = $_POST["instructorEmail"];
        $instructorPhone = $_POST["instructorPhone"];

        $stmt = $conn->prepare("INSERT INTO Instructor (InstructorID, FirstName, LastName, Email, Phone) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("issss", $instructorID, $instructorFirstName, $instructorLastName, $instructorEmail, $instructorPhone);
        $stmt->execute();

        $stmt->close();

    } elseif (isset($_POST["enrollmentSubmit"])) {
        $enrollmentID = $_POST["enrollmentID"];
        $studentID = $_POST["studentID"];
        $courseID = $_POST["courseID"];
        $enrollmentDate = $_POST["enrollmentDate"];
        $grade = $_POST["grade"];

        $stmt = $conn->prepare("INSERT INTO Enrollment (EnrollmentID, StudentID, CourseID, EnrollmentDate, Grade) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("iiiss", $enrollmentID, $studentID, $courseID, $enrollmentDate, $grade);
        $stmt->execute();

        $stmt->close();
    }

    $conn->close();
}
?>


<form id="form1" method="post">
    <label for="studentID">Student ID:</label>
    <input type="number" id="studentID" name="studentID" required><br>

    <label for="firstName">First Name:</label>
    <input type="text" id="firstName" name="firstName" required><br>

    <label for="lastName">Last Name:</label>
    <input type="text" id="lastName" name="lastName" required><br>

    <label for="dateOfBirth">Date of Birth:</label>
    <input type="text" id="dateOfBirth" name="dateOfBirth" placeholder="YYYY-MM-DD" required><br>

    <label for="email">Email:</label>
    <input type="text" id="email" name="email" required><br>

    <label for="phone">Phone:</label>
    <input type="text" id="phone" name="phone" required><br>

    <input type="submit" name="studentSubmit" value="Add Student">
</form>

<form id="form2" method="post">
    <label for="instructorID">Instructor ID:</label>
    <input type="number" id="instructorID" name="instructorID" required><br>

    <label for="instructorFirstName">First Name:</label>
    <input type="text" id="instructorFirstName" name="instructorFirstName" required><br>

    <label for="instructorLastName">Last Name:</label>
    <input type="text" id="instructorLastName" name="instructorLastName" required><br>

    <label for="instructorEmail">Email:</label>
    <input type="text" id="instructorEmail" name="instructorEmail" required><br>

    <label for="instructorPhone">Phone:</label>
    <input type="text" id="instructorPhone" name="instructorPhone" required><br>

    <input type="submit" name="instructorSubmit" value="Add Instructor">
</form>


<form id="form3" method="post">
    <label for="courseID">Course ID:</label>
    <input type="number" id="courseID" name="courseID" required><br>

    <label for="courseName">Course Name:</label>
    <input type="text" id="courseName" name="courseName" required><br>

    <label for="credits">Credits:</label>
    <input type="number" id="credits" name="credits" required><br>

    <input type="submit" name="courseSubmit" value="Add Course">
</form>


<form id="form4" method="post">
    <label for="enrollmentID">Enrollment ID:</label>
    <input type="number" id="enrollmentID" name="enrollmentID" required><br>

    <label for="studentID">Student ID:</label>
    <input type="number" id="studentID" name="studentID" required><br>

    <label for="courseID">Course ID:</label>
    <input type="number" id="courseID" name="courseID" required><br>

    <label for="enrollmentDate">Enrollment Date:</label>
    <input type="text" id="enrollmentDate" name="enrollmentDate" placeholder="YYYY-MM-DD" required><br>

    <label for="grade">Grade:</label>
    <input type="text" id="grade" name="grade" required><br>

    <input type="submit" name="enrollmentSubmit" value="Enroll Student">
</form>


<footer>
    <button onclick="location.href='delete.php'" style="position: fixed; bottom: 20px; right: 20px;">Delete Data</button>
    <button onclick="location.href='update_data.php'" style="position: fixed; bottom: 20px; right: 190px;">Update Data</button>
    <button onclick="location.href='add_data.php'" style="position: fixed; bottom: 20px; right: 360px;">Add Data</button>
    <button onclick="location.href='show_data.php'" style="position: fixed; bottom: 20px; right: 530px;">Show Data</button>
</footer>

</body>
</html>

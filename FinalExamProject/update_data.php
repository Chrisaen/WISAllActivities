<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<form id="form1" method="post">
    <label for="studentID">Student ID:</label>
    <input type="number" id="studentID" name="studentID" required><br>

    <label for="newFirstName">New First Name:</label>
    <input type="text" id="newFirstName" name="newFirstName" required><br>

    <label for="newLastName">New Last Name:</label>
    <input type="text" id="newLastName" name="newLastName" required><br>

    <label for="newDateOfBirth">New Date of Birth:</label>
    <input type="text" id="newDateOfBirth" name="newDateOfBirth" placeholder="YYYY-MM-DD" required><br>

    <label for="newEmail">New Email:</label>
    <input type="text" id="newEmail" name="newEmail" required><br>

    <label for="newPhone">New Phone:</label>
    <input type="text" id="newPhone" name="newPhone" required><br>

    <input type="submit" name="updateStudentSubmit" value="Update Student">
</form>

<form id="form2" method="post">
    <label for="instructorID">Instructor ID:</label>
    <input type="number" id="instructorID" name="instructorID" required><br>

    <label for="newFirstName">New First Name:</label>
    <input type="text" id="newFirstName" name="newFirstName" required><br>

    <label for="newLastName">New Last Name:</label>
    <input type="text" id="newLastName" name="newLastName" required><br>

    <label for="newEmail">New Email:</label>
    <input type="text" id="newEmail" name="newEmail" required><br>

    <label for="newPhone">New Phone:</label>
    <input type="text" id="newPhone" name="newPhone" required><br>

    <input type="submit" name="updateInstructorSubmit" value="Update Instructor">
</form>

<form id="form3" method="post">
    <label for="courseID">Course ID:</label>
    <input type="number" id="courseID" name="courseID" required><br>

    <label for="newCourseName">New Course Name:</label>
    <input type="text" id="newCourseName" name="newCourseName" required><br>

    <label for="newCredits">New Credits:</label>
    <input type="number" id="newCredits" name="newCredits" required><br>

    <input type="submit" name="updateCourseSubmit" value="Update Course">
</form>

<form id="form4" method="post">
    <label for="enrollmentID">Enrollment ID:</label>
    <input type="number" id="enrollmentID" name="enrollmentID" required><br>

    <label for="newStudentID">New Student ID:</label>
    <input type="number" id="newStudentID" name="newStudentID" required><br>

    <label for="newCourseID">New Course ID:</label>
    <input type="number" id="newCourseID" name="newCourseID" required><br>

    <label for="newEnrollmentDate">New Enrollment Date:</label>
    <input type="text" id="newEnrollmentDate" name="newEnrollmentDate" placeholder="YYYY-MM-DD" required><br>

    <label for="newGrade">New Grade:</label>
    <input type="text" id="newGrade" name="newGrade" required><br>

    <input type="submit" name="updateEnrollmentSubmit" value="Update Enrollment">
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

    if (isset($_POST["updateStudentSubmit"])) {
        $studentID = $_POST["studentID"];
        $newFirstName = $_POST["newFirstName"];
        $newLastName = $_POST["newLastName"];
        $newDateOfBirth = $_POST["newDateOfBirth"];
        $newEmail = $_POST["newEmail"];
        $newPhone = $_POST["newPhone"];

        $stmt = $conn->prepare("UPDATE Student SET FirstName = ?, LastName = ?, DateOfBirth = ?, Email = ?, Phone = ? WHERE StudentID = ?");
        $stmt->bind_param("sssssi", $newFirstName, $newLastName, $newDateOfBirth, $newEmail, $newPhone, $studentID);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "Student with ID $studentID updated successfully.";
        } else {
            echo "No matching student found with provided ID.";
        }

        $stmt->close();
    }

    if (isset($_POST["updateInstructorSubmit"])) {
        $instructorID = $_POST["instructorID"];
        $newFirstName = $_POST["newFirstName"];
        $newLastName = $_POST["newLastName"];
        $newEmail = $_POST["newEmail"];
        $newPhone = $_POST["newPhone"];

        $stmt = $conn->prepare("UPDATE Instructor SET FirstName = ?, LastName = ?, Email = ?, Phone = ? WHERE InstructorID = ?");
        $stmt->bind_param("ssssi", $newFirstName, $newLastName, $newEmail, $newPhone, $instructorID);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "Instructor with ID $instructorID updated successfully.";
        } else {
            echo "No matching instructor found with provided ID.";
        }

        $stmt->close();
    }

    if (isset($_POST["updateCourseSubmit"])) {
        $courseID = $_POST["courseID"];
        $newCourseName = $_POST["newCourseName"];
        $newCredits = $_POST["newCredits"];

        $stmt = $conn->prepare("UPDATE Course SET CourseName = ?, Credits = ? WHERE CourseID = ?");
        $stmt->bind_param("sii", $newCourseName, $newCredits, $courseID);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "Course with ID $courseID updated successfully.";
        } else {
            echo "No matching course found with provided ID.";
        }

        $stmt->close();
    }

    if (isset($_POST["updateEnrollmentSubmit"])) {
        $enrollmentID = $_POST["enrollmentID"];
        $newStudentID = $_POST["newStudentID"];
        $newCourseID = $_POST["newCourseID"];
        $newEnrollmentDate = $_POST["newEnrollmentDate"];
        $newGrade = $_POST["newGrade"];

        $stmt = $conn->prepare("UPDATE Enrollment SET StudentID = ?, CourseID = ?, EnrollmentDate = ?, Grade = ? WHERE EnrollmentID = ?");
        $stmt->bind_param("iissi", $newStudentID, $newCourseID, $newEnrollmentDate, $newGrade, $enrollmentID);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "Enrollment with ID $enrollmentID updated successfully.";
        } else {
            echo "No matching enrollment found with provided ID.";
        }

        $stmt->close();
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

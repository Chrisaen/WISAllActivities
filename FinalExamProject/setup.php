<?php

$servername = "localhost";  
$username = "root";         
$password = "";             
$dbname = "Bondad"; 

try {
    $conn = new PDO("mysql:host=$servername", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
    $conn->exec($sql);

    echo "Database created successfully<br>";

    $conn->exec("USE $dbname");

    $sql = "
        CREATE TABLE IF NOT EXISTS Student (
            StudentID INTEGER PRIMARY KEY,
            FirstName TEXT,
            LastName TEXT,
            DateOfBirth TEXT,
            Email TEXT,
            Phone TEXT
        );

        CREATE TABLE IF NOT EXISTS Course (
            CourseID INTEGER PRIMARY KEY,
            CourseName TEXT,
            Credits INTEGER
        );

        CREATE TABLE IF NOT EXISTS Instructor (
            InstructorID INTEGER PRIMARY KEY,
            FirstName TEXT,
            LastName TEXT,
            Email TEXT,
            Phone TEXT
        );

        CREATE TABLE IF NOT EXISTS Enrollment (
            EnrollmentID INTEGER PRIMARY KEY,
            StudentID INTEGER,
            CourseID INTEGER,
            EnrollmentDate TEXT,
            Grade TEXT,
            FOREIGN KEY (StudentID) REFERENCES Student(StudentID),
            FOREIGN KEY (CourseID) REFERENCES Course(CourseID)
        );
    ";

    $conn->exec($sql);

    echo "Tables created successfully";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>

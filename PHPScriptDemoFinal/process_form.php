<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "studentinfo";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle CRUD operations based on the action parameter
if (isset($_POST['action'])) {
    $action = $_POST['action'];

    switch ($action) {
        case 'create':
            createRecord();
            break;
        case 'read':
            readRecords();
            break;
        case 'update':
            updateRecord();
            break;
        case 'delete':
            deleteRecord();
            break;
        default:
            echo "Invalid action";
            break;
    }
} else {
    echo "Action parameter is missing";
}

// Close connection
$conn->close();

function createRecord()
{
    global $conn;

    if (isset($_POST['username']) && isset($_POST['email'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];

        // Use prepared statement to prevent SQL injection
        $sql = "INSERT INTO users (username, email) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $email);

        if ($stmt->execute()) {
            echo "Record created successfully";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Username and email are required for creating a record";
    }
}

function readRecords()
{
    global $conn;

    $sql = "SELECT id, username, email FROM users";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $records = array();

        while ($row = $result->fetch_assoc()) {
            $records[] = $row;
        }

        echo json_encode($records);
    } else {
        echo "0 results";
    }
}

function updateRecord()
{
    global $conn;

    if (isset($_POST['id']) && isset($_POST['newUsername'])) {
        $id = $_POST['id'];
        $newUsername = $_POST['newUsername'];

        // Use prepared statement to prevent SQL injection
        $sql = "UPDATE users SET username=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $newUsername, $id);

        if ($stmt->execute()) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "ID and new username are required for updating a record";
    }
}

function deleteRecord()
{
    global $conn;

    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        // Use prepared statement to prevent SQL injection
        $sql = "DELETE FROM users WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "ID is required for deleting a record";
    }
}
?>

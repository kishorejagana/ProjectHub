<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];

// Delete the internship
$sql = "DELETE FROM students WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: success.php?message=Internship deleted successfully");
} else {
    echo "Error deleting internship: " . $conn->error;
}

$conn->close();
?>

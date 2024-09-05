<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projectfiles";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];

// Delete the project
$sql = "DELETE FROM projects WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: success.php?message=Project deleted successfully");
} else {
    echo "Error deleting project: " . $conn->error;
}

$conn->close();
?>

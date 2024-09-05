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

$id = $_POST['id'];
$AcademicYear = $_POST['AcademicYear'];
$BatchNo = $_POST['BatchNo'];
$ListofStudents = $_POST['ListofStudents'];
$NameoftheSupervisor = $_POST['NameoftheSupervisor'];
$TitleoftheProject = $_POST['TitleoftheProject'];
$Domain = $_POST['Domain'];
$TechnologiesUsed = $_POST['TechnologiesUsed'];

// Update the project
$sql = "UPDATE projects SET AcademicYear='$AcademicYear', BatchNo='$BatchNo', ListofStudents='$ListofStudents', NameoftheSupervisor='$NameoftheSupervisor', TitleoftheProject='$TitleoftheProject', Domain='$Domain', TechnologiesUsed='$TechnologiesUsed' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: success.php?message=Project updated successfully");
} else {
    echo "Error updating project: " . $conn->error;
}

$conn->close();
?>

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

$id = $_POST['id'];
$RollNo = $_POST['RollNo'];
$StudentName = $_POST['StudentName'];
$MailID = $_POST['MailID'];
$ContactNo = $_POST['ContactNo'];
$Branch = $_POST['Branch'];
$Domain = $_POST['Domain'];
$AICTEID = $_POST['AICTEID'];

// Update the internship
$sql = "UPDATE students SET RollNo='$RollNo', StudentName='$StudentName', MailID='$MailID', ContactNo='$ContactNo', Branch='$Branch', Domain='$Domain', AICTEID='$AICTEID' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: success.php?message=Internship updated successfully");
} else {
    echo "Error updating internship: " . $conn->error;
}

$conn->close();
?>

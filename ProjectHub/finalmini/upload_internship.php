<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Database connection parameters
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

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO students (RollNo, StudentName, MailID, ContactNo, Branch, Domain, AICTEID) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $rollNo, $studentName, $mailID, $contactNo, $branch, $domain, $aicteID);

    // Get form data
    $rollNo = $_POST['RollNo'];
    $studentName = $_POST['StudentName'];
    $mailID = $_POST['MailID'];
    $contactNo = $_POST['ContactNo'];
    $branch = $_POST['Branch'];
    $domain = $_POST['Domain'];
    $aicteID = $_POST['AICTEID'];

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect to success page
        header('Location: success_internship.php');
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>

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

$id = $_GET['id']; // Get the student ID from the query string

// Fetch the internship details
$sql = "SELECT * FROM students WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    die("No student found with ID $id");
}

$student = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Internship</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        .container {
            max-width: 600px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Internship</h2>
        <form action="updateinternship.php" method="post">
            <input type="hidden" name="id" value="<?php echo $student['id']; ?>">
            <div class="mb-3">
                <label for="RollNo" class="form-label">Student Roll No</label>
                <input type="text" class="form-control" id="RollNo" name="RollNo" value="<?php echo $student['RollNo']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="StudentName" class="form-label">Name of the Student</label>
                <input type="text" class="form-control" id="StudentName" name="StudentName" value="<?php echo $student['StudentName']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="MailID" class="form-label">Mail ID</label>
                <input type="email" class="form-control" id="MailID" name="MailID" value="<?php echo $student['MailID']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="ContactNo" class="form-label">Contact No</label>
                <input type="text" class="form-control" id="ContactNo" name="ContactNo" value="<?php echo $student['ContactNo']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="Branch" class="form-label">Branch</label>
                <input type="text" class="form-control" id="Branch" name="Branch" value="<?php echo $student['Branch']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="Domain" class="form-label">Domain</label>
                <input type="text" class="form-control" id="Domain" name="Domain" value="<?php echo $student['Domain']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="AICTEID" class="form-label">AICTE Internship Student Registration ID</label>
                <input type="text" class="form-control" id="AICTEID" name="AICTEID" value="<?php echo $student['AICTEID']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Internship</button>
        </form>
        <a href="admin.html" class="btn btn-secondary mt-3">Back to Admin Page</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>

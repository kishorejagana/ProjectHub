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

$id = $_GET['id']; // Get the project ID from the query string

// Fetch the project details
$sql = "SELECT * FROM projects WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    die("No project found with ID $id");
}

$project = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Project</title>
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
        <h2>Edit Project</h2>
        <form action="updateproject.php" method="post">
            <input type="hidden" name="id" value="<?php echo $project['id']; ?>">
            <div class="mb-3">
                <label for="AcademicYear" class="form-label">Academic Year</label>
                <input type="text" class="form-control" id="AcademicYear" name="AcademicYear" value="<?php echo $project['AcademicYear']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="BatchNo" class="form-label">Batch No</label>
                <input type="text" class="form-control" id="BatchNo" name="BatchNo" value="<?php echo $project['BatchNo']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="ListofStudents" class="form-label">List of Students</label>
                <input type="text" class="form-control" id="ListofStudents" name="ListofStudents" value="<?php echo $project['ListofStudents']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="NameoftheSupervisor" class="form-label">Name of the Supervisor</label>
                <input type="text" class="form-control" id="NameoftheSupervisor" name="NameoftheSupervisor" value="<?php echo $project['NameoftheSupervisor']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="TitleoftheProject" class="form-label">Title of the Project</label>
                <input type="text" class="form-control" id="TitleoftheProject" name="TitleoftheProject" value="<?php echo $project['TitleoftheProject']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="Domain" class="form-label">Domain</label>
                <input type="text" class="form-control" id="Domain" name="Domain" value="<?php echo $project['Domain']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="TechnologiesUsed" class="form-label">Technologies Used</label>
                <input type="text" class="form-control" id="TechnologiesUsed" name="TechnologiesUsed" value="<?php echo $project['TechnologiesUsed']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Project</button>
        </form>
        <a href="admin.html" class="btn btn-secondary mt-3">Back to Admin Page</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>

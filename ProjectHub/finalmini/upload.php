<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minimalistic Popup Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .popup-container {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .popup-content {
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="popup-container" id="popupContainer">
        <div class="popup-content" id="popupContent"></div>
    </div>

    

    <script>
        document.getElementById('uploadForm').addEventListener('submit', function (event) {
            event.preventDefault(); // Prevent form from submitting normally

            const formData = new FormData(this);

            fetch(this.action, {
                method: this.method,
                body: formData
            })
            .then(response => response.text())
            .then(html => {
    document.getElementById('popupContent').innerHTML = html;
    document.getElementById('popupContainer').style.display = 'flex';
    setTimeout(() => {
        document.getElementById('popupContainer').style.display = 'none';
        window.location.href = 'success.php';
    }, 2000); // Close popup after 2 seconds and redirect
    this.reset(); // Reset the form
})

            .catch(error => {
                console.error('Error:', error);
            });
        });
    </script>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Connect to your MySQL database (replace these values with your own)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "projectfiles";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // File upload handling
    $targetDirectory = "uploads/"; // Directory where uploaded files will be stored
    $targetFile = $targetDirectory . basename($_FILES["pdfFile"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    $message = "";

    // Check if file already exists
    if (file_exists($targetFile)) {
        $message = "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size (increase limit to 20MB)
    if ($_FILES["pdfFile"]["size"] > 20000000) { // 20MB limit
        $message = "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats (adjust as per your requirements)
    if ($fileType !== "pdf") {
        $message = "Sorry, only PDF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $message = "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["pdfFile"]["tmp_name"], $targetFile)) {
            $message = "The file " . htmlspecialchars(basename($_FILES["pdfFile"]["name"])) . " has been uploaded successfully.";

            // Get other form data
            $academicYear = $_POST['AcademicYear'];
            $batchNo = $_POST['BatchNo'];
            $listOfStudents = $_POST['ListofStudents'];
            $supervisorName = $_POST['NameoftheSupervisor'];
            $projectTitle = $_POST['TitleoftheProject'];
            $domain = $_POST['Domain'];
            $technologiesUsed = $_POST['TechnologiesUsed'];
            $filePath = $targetFile; // Path to the uploaded file

            // Insert data into the database
            $sql = "INSERT INTO projects (AcademicYear, BatchNo, ListofStudents, NameoftheSupervisor, TitleoftheProject, Domain, TechnologiesUsed, FilePath) 
                    VALUES ('$academicYear', '$batchNo', '$listOfStudents', '$supervisorName', '$projectTitle', '$domain', '$technologiesUsed', '$filePath')";

            if ($conn->query($sql) === TRUE) {
                $message .= "<br>Data inserted into database successfully!";
            } else {
                $message .= "<br>Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            $message = "Sorry, there was an error uploading your file.";
        }
    }

    echo "<script>
    document.getElementById('popupContent').innerHTML = '$message';
    document.getElementById('popupContainer').style.display = 'flex';
    setTimeout(() => {
        document.getElementById('popupContainer').style.display = 'none';
        window.location.href = 'success.php';
    }, 2000); // Close popup after 2 seconds and redirect
</script>";


    // Close the database connection
    $conn->close();
}
?>

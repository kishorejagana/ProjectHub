<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page - Project Hub</title>
    <style>
        body {
            display: flex;
            min-height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            padding: 15px 8%;
            background: white; /* Adjust background color as per your design needs */
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 100;
            border-bottom: 1px solid #eee; /* Optional: Add a border at the bottom of the header */
        }

        .logo-img img {
            max-height: 50px; /* Adjust as per your design needs */
        }

        .navbar {
            display: flex;
            justify-content: center;
            flex: 1;
        }

        .navbar a {
            font-size: 18px;
            color: #222;
            text-decoration: none;
            font-weight: 500;
            margin: 0 20px;
            transition: 0.3s;
            text-align: center;
        }

        .navbar a.active {
            color: #1743e3;
        }

        .sidebar {
            position: fixed;
            top: 80px; /* Adjust to match the height of your header */
            left: 0;
            width: 250px;
            height: 100%;
            padding-top: 20px;
            background-color: #f8f9fa;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
            z-index: 100;
        }

        .sidebar a {
            display: block;
            color: #000;
            padding: 10px 20px;
            text-decoration: none;
        }

        .sidebar a:hover {
            background-color: #ddd;
        }

        .submenu a {
            padding-left: 40px;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
            width: calc(100% - 250px);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .d-flex {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
    </style>
</head>
<body>
    
    <header class="header">
        <div class="logo-img">
            <img src="vvit logo.png" alt="">
        </div>
        <nav class="navbar">
            <a href="home.html">Home</a>
            <a href="user.php">Projects</a>
            <a href="Internship.php">Internships</a>
            <a href="admin.html" class="active">Admin</a>
        </nav>
    </header>

    <div class="sidebar">
        <a href="#projects" onclick="showSection('projects-section')">Projects</a>
        <div class="submenu">
            <a href="upload_project.html">Upload Project</a>
            <a href="#viewProjects" onclick="showSection('view-projects')">View Projects</a>
        </div>
        <a href="#internships" onclick="showSection('internships-section')">Internships</a>
        <div class="submenu">
            <a href="upload_internship.html">Upload Internship Data</a>
            <a href="#viewInternships" onclick="showSection('view-internships')">View Internship Data</a>
        </div>
    </div>

    <div class="content">
        <div id="projects-section" style="display: none;">
            <h2>Projects</h2>
            <p>Here you can manage projects.</p>
        </div>

        <div id="internships-section" style="display: none;">
            <h2>Internships</h2>
            <p>Here you can manage internships.</p>
        </div>

        <div id="view-projects" style="display: none;">
            <h2>Uploaded Projects</h2>
            <table>
                <thead>
                    <tr>
                        <th>Academic Year</th>
                        <th>Batch No</th>
                        <th>List of Students</th>
                        <th>Name of the Supervisor</th>
                        <th>Title of the Project</th>
                        <th>Domain</th>
                        <th>Technologies Used</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // PHP code to fetch and display projects
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

                    // SQL query to select all projects
                    $sql = "SELECT * FROM projects";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["AcademicYear"] . "</td>";
                            echo "<td>" . $row["BatchNo"] . "</td>";
                            echo "<td>" . $row["ListofStudents"] . "</td>";
                            echo "<td>" . $row["NameoftheSupervisor"] . "</td>";
                            echo "<td>" . $row["TitleoftheProject"] . "</td>";
                            echo "<td>" . $row["Domain"] . "</td>";
                            echo "<td>" . $row["TechnologiesUsed"] . "</td>";
                            echo '<td>
                                <a href="editproject.php?id=' . $row["id"] . '" class="btn btn-warning btn-sm">Edit</a> 
                                <a href="deleteproject.php?id=' . $row["id"] . '" class="btn btn-danger btn-sm">Delete</a>
                                </td>';
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8'><center>No projects found</center></td></tr>";
                    }

                    ?>
                </tbody>
            </table>
        </div>

        <div id="view-internships" style="display: none;">
            <h2>Uploaded Internships</h2>
            <table>
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Student Roll No</th>
                        <th>Name of the Student</th>
                        <th>Mail ID</th>
                        <th>Contact No</th>
                        <th>Branch</th>
                        <th>Domain</th>
                        <th>AICTE Internship Student Registration ID</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // PHP code to fetch and display internships
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

                    // SQL query to select all internships
                    $sql = "SELECT * FROM students";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["id"] . "</td>";
                            echo "<td>" . $row["RollNo"] . "</td>";
                            echo "<td>" . $row["StudentName"] . "</td>";
                            echo "<td>" . $row["MailID"] . "</td>";
                            echo "<td>" . $row["ContactNo"] . "</td>";
                            echo "<td>" . $row["Branch"] . "</td>";
                            echo "<td>" . $row["Domain"] . "</td>";
                            echo "<td>" . $row["AICTEID"] . "</td>";
                            echo '<td>
                                <a href="editinternship.php?id=' . $row["id"] . '" class="btn btn-warning btn-sm">Edit</a> 
                                <a href="deleteinternship.php?id=' . $row["id"] . '" class="btn btn-danger btn-sm">Delete</a>
                                </td>';
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='9'><center>No internships found</center></td></tr>";
                    }

                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function showSection(sectionId) {
            // Hide all sections
            document.getElementById('projects-section').style.display = 'none';
            document.getElementById('internships-section').style.display = 'none';
            document.getElementById('view-projects').style.display = 'none';
            document.getElementById('view-internships').style.display = 'none';

            // Show the selected section
            document.getElementById(sectionId).style.display = 'block';
        }
    </script>
</body>
</html>

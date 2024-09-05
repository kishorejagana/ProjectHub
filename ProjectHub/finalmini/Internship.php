<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vasireddy Venkatadri Institute of Technology | Project Hub</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            padding-top: 80px;
        }
        .header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            padding: 15px 8%;
            background: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 100;
            border-bottom: 1px solid #ccc;
        }
        .logo-img img {
            max-height: 50px;
        }
        .navbar {
            display: flex;
        }
        .navbar a {
            font-size: 18px;
            color: #222;
            text-decoration: none;
            font-weight: 500;
            margin: 0 20px;
            transition: 3s;
            text-align: end;
        }
        .navbar a:hover,
        .navbar a.active {
            color: #1743e3;
        }
        .container {
            margin-top: 120px;
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="logo-img">
            <img src="vvit logo.png" alt="VVIT Logo">
        </div>
        <nav class="navbar">
            <a href="home.html">Home</a>
            <a href="user.php" >Projects</a>
            <a href="Internship.php" class="active">Internships</a>
            <a href="admin.html">Admin</a>
        </nav>
    </header>

    <div class="container my-4">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">RollNo</th>
                    <th scope="col">StudentName</th>
                    <th scope="col">MailID</th>
                    <th scope="col">ContactNo</th>
                    <th scope="col">Branch</th>
                    <th scope="col">Domain</th>
                    <th scope="col">AICTEID</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Database connection details
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

                // SQL query to fetch data
                $sql = "SELECT * FROM students";
                $result = $conn->query($sql);

                // Check if there are rows returned
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["RollNo"] . "</td>";
                        echo "<td>" . $row["StudentName"] . "</td>";
                        echo "<td>" . $row["MailID"] . "</td>";
                        echo "<td>" . $row["ContactNo"] . "</td>";
                        echo "<td>" . $row["Branch"] . "</td>";
                        echo "<td>" . $row["Domain"] . "</td>";
                        echo "<td>" . $row["AICTEID"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'><center>No entries found</center></td></tr>";
                }

                // Close connection
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

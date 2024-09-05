<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Database connection
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "auth";

    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Validate login authentication using prepared statements
    $query = $conn->prepare("SELECT * FROM login WHERE username = ? AND password = ?");
    $query->bind_param("ss", $username, $password);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows == 1) {
        // Login success
        echo json_encode(["status" => "success"]);
    } else {
        // Login failed
        echo json_encode(["status" => "error"]);
    }

    $query->close();
    $conn->close();
}
?>

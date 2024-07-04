<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cms";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT * FROM login_logout WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $_SESSION["username"] = $username;
        $_SESSION["password"] = $password;
        header("location: http://localhost:80/ProjectCMS/Index.php");
        exit();
    } else {
        // Redirect to the LoginForm.html page with an error message
        header("location: http://localhost:80/ProjectCMS/LoginForm.html?Error=EnteredDetailsSeemsINVALID...");
    }
}

$conn->close();
?>

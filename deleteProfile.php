<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: http://localhost/ProjectCMS/Index.html");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cms";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Check if the user exists
    $checkUserQuery = "SELECT * FROM user_list WHERE ID = $id";
    $checkUserResult = $conn->query($checkUserQuery);

    if ($checkUserResult->num_rows > 0) {
        // User exists, get the username
        $user = $checkUserResult->fetch_assoc()["Username"];

        // Delete user from user_list table
        $deleteUserQuery = "DELETE FROM user_list WHERE ID = $id";
        if ($conn->query($deleteUserQuery) === TRUE) {
            // User deleted successfully

            // Delete user from login_logout table
            $deleteLoginQuery = "DELETE FROM login_logout WHERE Username = '$user'";
            if ($conn->query($deleteLoginQuery) === TRUE) {
                // Data deleted from login_logout table successfully
                // Display a JavaScript alert message
                header("Location: http://localhost/ProjectCMS/SignIn.php");
                exit();
            } else {
                echo "Error deleting user from login_logout table: " . $conn->error;
            }
        } else {
            echo "Error deleting user from user_list table: " . $conn->error;
        }
    } else {
        echo "User not found!";
    }
}

$conn->close();
?>

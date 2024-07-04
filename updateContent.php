<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cms";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $postId = $_POST['id'];
    $fields = ['username', 'email', 'category', 'date', 'content', 'status'];

    foreach ($fields as $field) {
        $$field = mysqli_real_escape_string($conn, $_POST[$field]);
    }

    $updateSql = "UPDATE posts SET Username='$username', Email='$email', Category='$category', Date='$date', Content='$content', Status='$status' WHERE ID=$postId";

    if ($conn->query($updateSql) == TRUE) {
        echo "Post updated successfully.";
    } else {
        echo "Error updating post: " . $conn->error;
    }
    
    // Redirect to index.php
    header("Location: index.php");
    exit();
} else {
    echo "Invalid request.";
}

$conn->close();

?>

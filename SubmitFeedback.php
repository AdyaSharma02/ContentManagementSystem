<!DOCTYPE html>
<html>
<head>
    <title>Submit Feedback</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body {
            background: linear-gradient(to bottom, #000000, #808080);
            background-attachment: fixed;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            text-align: center;
            margin: 20px auto;
            width: 50%;
            max-width: 800px;
            border: 5px solid transparent;
            padding: 20px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            border-radius: 500px;
            background-color: #fff;
            animation: blueBorderAnimation 2s infinite alternate;
        }

        @keyframes blueBorderAnimation {
            from {
                border-color: #7CFC00;
            }
            to {
                border-color: #32CD32;
            }
        }

        .photo {
            width: 100%;
            height: 390px;
            background-image: url("updateProfileImg.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            border-radius: 100%;
        }

        h2 {
            margin-top: 5px;
            text-align: center;
            margin-bottom: 20px;
            color: #355E3B;
        }

        .btn {
            text-align: center;
            margin-top: 10px;
            display: inline-block;
            padding: 10px 20px;
            background-color: #228C22;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #98FF98;
        }

        .message {
            text-align: center;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .error-message {
            color: red;
        }

        .success-message {
            color: green;
        }

        /* Media queries for responsiveness */
        @media (max-width: 768px) {
            .container {
                margin: 10px;
            }

            .photo {
                height: 300px;
            }
        }
        .alert.alert-warning,
        .alert.alert-success {
        max-width: 300px; /* You can adjust this value as needed */
        margin: 0 auto; /* Center the alert horizontally if needed */
    </style>
</head>
<body>
<div class="container">
    <div class="photo"></div>
    <h2>Feedback Status</h2>
<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cms";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_SESSION['username']) && isset($_POST['feedbackText'])) {
    $username = $_SESSION['username'];
    $feedbackText = $_POST['feedbackText'];

    // Get the current date and time
    $feedbackDate = date("Y-m-d H:i:s");

    // Prepare a SQL statement with placeholders
    $sql = "INSERT INTO feedback (Username, FeedbackText, FeedbackDate) VALUES (?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        // Bind the parameters
        $stmt->bind_param("sss", $username, $feedbackText, $feedbackDate);

        // Execute the statement
        if ($stmt->execute()) {
            // Success message using Bootstrap alert
            echo '<div class="alert alert-success" role="alert">Feedback submitted successfully!</div>';
        } else {
            // Error message using Bootstrap alert
            echo '<div class="alert alert-danger" role="alert">Error: ' . $stmt->error . '</div>';
        }

        // Close the statement
        $stmt->close();
    } else {
        // Error message using Bootstrap alert
        echo '<div class="alert alert-danger" role="alert">Error preparing the statement: ' . $conn->error . '</div>';
    }
} else {
    // Warning message using Bootstrap alert
    echo '<div class="alert alert-warning" role="alert">Please provide feedback text.</div>';
}

$conn->close();
?>
    <a href="http://localhost/ProjectCMS/Index.php" class="btn">Home</a>
    <a href="http://localhost:80/ProjectCMS/AllFeedbacks.php" class="btn">Access your feedback</a>
</div>
</body>
</html>



<html>
<head>
<style type="text/css">
  body {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    margin: 0;
  }

  /* Style for the footer */
  footer {
    background-color: #343a40;
    color: #fff;
    padding: 20px 0;
    text-align: center;
    margin-top: auto;
  }

  .footer p {
    margin-bottom: 0;
  }
</style>
</head>
<body>

<footer class="footer">
    <p>&copy; 2023 Content Management System. All rights reserved.</p>
</footer>
</body>
</html>
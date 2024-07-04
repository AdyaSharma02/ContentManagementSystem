<!DOCTYPE html>
<html>
<head>
  <title>Content Based Report</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style type="text/css">
    body {
      background: linear-gradient(to bottom, #1a1a1a, #f4f4f4);
      background-attachment: fixed;
      background-repeat: no-repeat;
      background-size: cover;
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    .navbar {
      background-color: #343a40;
      border-bottom: 4px solid #ffc107;
    }

    .navbar-brand, .navbar-nav .nav-link {
      color: #fff;
      font-weight: bold;
    }

    .navbar-nav .nav-link.logout {
      background-color: #E3242B;
      color: #FFFFFF;
      border-radius: 5px;
    }

    .navbar-nav .nav-link.logout:hover {
      background-color: #BC544B;
    }

    .container {
      text-align: center;
      margin-top: 20px;
      color: white;
    }

    h1 {
      margin-top: 10px;
      font-weight: bold;
    }

    .post-list {
      list-style: none;
      padding: 0;
    }

    .post-item {
      border: 1px solid #ccc;
      border-radius: 5px;
      padding: 10px;
      margin-bottom: 15px;
      background: conic-gradient(from 45deg, #fff, transparent);
      color: #000;
    }

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
<!-- Navigation Bar with Bootstrap -->
<nav class="navbar navbar-expand-md navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Content Management System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/ProjectCMS/Index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/ProjectCMS/Profile.php">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/ProjectCMS/createContent.php">Create</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="maintenanceDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Maintenance
                    </a>
                    <div class="dropdown-menu" aria-labelledby="maintenanceDropdown">
                        <a class="dropdown-item" href="http://localhost/ProjectCMS/UserList.php">User List</a>
                        <a class="dropdown-item" href="Report.html">Report</a>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link logout" href="http://localhost/ProjectCMS/Logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
  <h1 style="color: white; margin-top:10px;font-weight: bold;">Content based report</h1>
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $start_date = $_POST["start_date"];
    $end_date = $_POST["end_date"];

    // Validate dates if needed

    $sql = "SELECT ID, Username, Email, Category, Date, Content, Status FROM posts WHERE Date BETWEEN '$start_date' AND '$end_date'";
    $result = $conn->query($sql);

    // Check if there are rows in the result set
    if ($result->num_rows > 0) {
        // Output data in a report format
        echo "<ul class='post-list'>";
        
        // Display report data as needed
        while ($row = $result->fetch_assoc()) {
            echo "<li class='post-item'>";
            echo "<strong>ID:</strong> " . $row["ID"] . "<br>";
            echo "<strong>Username:</strong> " . $row["Username"] . "<br>";
            echo "<strong>Email:</strong> " . $row["Email"] . "<br>";
            echo "<strong>Category:</strong> " . $row["Category"] . "<br>";
            echo "<strong>Date:</strong> " . $row["Date"] . "<br>";
            echo "<strong>Content:</strong> " . $row["Content"] . "<br>";
            echo "<strong>Status:</strong> " . $row["Status"] . "<br>";
            echo "</li><br>";
        }
        echo "</ul>";
    } else {
        echo "No results for the selected dates.";
    }
}

// Close the database connection
$conn->close();
?>
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



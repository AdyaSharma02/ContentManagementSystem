</html>
<!DOCTYPE html>
<html>
<head>
  <title>UserList</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <style>
    body {
      background: linear-gradient(to bottom, #1a1a1a, #f4f4f4);
      background-attachment: fixed;
      background-repeat: no-repeat;
      background-size: cover;
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
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
    h1 {
            color: white;
            text-align: center;
            margin-bottom: 30px;
            animation: bounceInDown 1s;
            font-weight: bold;
        }

    /* Custom styling for the form */
    form {
      max-width: 600px;
      margin: auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      margin-top: 20px;
    }

    label {
      font-weight: bold;
      margin-bottom: 5px;
    }

    input,
    textarea,
    select {
      width: 100%;
      padding: 8px;
      margin-bottom: 15px;
      border: 1px solid #ced4da;
      border-radius: 4px;
      box-sizing: border-box;
    }

    input[type="submit"] {
      background-color: #007bff;
      color: #fff;
      cursor: pointer;
    }
  </style>
</head>
<body>
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
<?php
// Assuming you have a database connection already established
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cms";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $id = $_POST["id"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $category = $_POST["category"];
    $content = $_POST["content"];
    $status = $_POST["status"];
    
    // Get the current date and time
    $date = date("Y-m-d H:i:s");

    // Insert data into the "posts" table
    $sql = "INSERT INTO posts (ID, Username, Email, Category, Content, Status, Date) VALUES ('$id', '$username', '$email', '$category', '$content', '$status', '$date')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";

        // Redirect to index.php
        header("Location: http://localhost/ProjectCMS/Index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>

<div class="container">
    <h1 class="mt-4">Create New Content</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-group">
            <label for="id">ID:</label>
            <input type="id" name="id" class="form-control" required>
        </div>
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="username">Username:</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="category">Category:</label>
                <input type="text" name="category" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="status">Status:</label>
                <select name="status" class="form-control">
                    <option value="Posted">Posted</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="content">Content:</label>
            <textarea name="content" rows="4" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="date">Date:</label>
            <input type="text" name="date" value="<?php echo date("Y-m-d H:i:s"); ?>" class="form-control" disabled>
        </div>

        <input type="submit" value="Submit" class="btn btn-primary">
    </form>
</div>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
  <title>All Feedbacks</title>
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

    .table {
      margin-top: 2px;
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .table th, .table td {
      padding: 10px 15px;
      text-align: left;
      border-bottom: 1px solid #dee2e6;
    }

    .table thead th {
      background-color: #343a40;
      color: #fff;
    }

    .table tbody tr:nth-child(odd) {
      background-color: #fff;
    }

    .table tbody tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    .table tbody tr:hover {
      background-color: #e0e0e0;
    }

    .navbar-nav .nav-link.logout {
      background-color: #E3242B;
      color: #FFFFFF;
      border-radius: 5px;
    }

    .navbar-nav .nav-link.logout:hover {
      background-color: #BC544B;
    }

    /* Add missing CSS classes */
    .container {
      text-align: center; /* Center the content within the container */
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
  <h1 style="color: white; margin-top:10px;font-weight: bold;">All Feedbacks</h1>
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

  // SQL query with a parameterized query
  $query = "SELECT Username, FeedbackText, feedbackDate FROM feedback";
  $stmt = $conn->prepare($query);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
      echo '
      <div class="table-responsive">
          <table class="table table-striped table-hover">
              <thead>
                  <tr>
                      <th>Username</th>
                      <th style="text-align: center;">Feedback Text</th>
                      <th>Feedback Date</th>
                  </tr>
              </thead>
              <tbody>';

      while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $row["Username"] . "</td>";
          echo "<td>" . $row["FeedbackText"] . "</td>";
          echo "<td>" . $row["feedbackDate"] . "</td>";
          echo "</tr>";
      }

      echo '
              </tbody>
          </table>
      </div>
      ';
  } else {
      echo '<div style="text-align: center; background-color: black; color: white; padding: 20px;">';
      echo '<p style="font-size: 24px; font-weight: bold;">No feedbacks found.</p>';
      echo '</div>';
  }

  $stmt->close();
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
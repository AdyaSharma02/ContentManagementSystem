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
      background: linear-gradient(to bottom, #1a1a1a, #f4f4f4); /* Dark gray to light gray gradient */
      background-attachment: fixed;
      background-repeat: no-repeat;
      background-size: cover;
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
    }

    /* Style for the navigation bar */
    .navbar {
      background-color: #343a40; /* Dark background color */
      border-bottom: 4px solid #ffc107; /* Yellow border */
    }

    .navbar-brand, .navbar-nav .nav-link {
      color: #fff;
      font-weight: bold;
    }

    /* Style for the table */
    /* Style for the table */
    .table {
      margin-top: 7%;
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Reduce box shadow for a lighter effect */
    }

    .table th, .table td {
      padding: 10px 15px; /* Slightly reduce padding */
      text-align: left;
      border-bottom: 1px solid #dee2e6;
    }

    .table thead th {
      background-color: #343a40;
      color: #fff;
    }

    .table tbody tr:nth-child(odd) {
      background-color: #fff; /* White background for odd rows */
    }

    .table tbody tr:nth-child(even) {
      background-color: #f2f2f2; /* Light gray background for even rows */
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
  <div class="table-responsive">
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>UserName</th>
          <th>Email</th>
          <th>FullName</th>
          <th>Address</th>
          <th>PhoneNumber</th>
        </tr>
      </thead>
      <tbody>
       <?php
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

        $sql = "SELECT * FROM user_list";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          echo '
                <tbody>';
          while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["ID"] ."</td>";
            echo "<td>" . $row["Username"] . "</td>";
            echo "<td>" . $row["Email"] . "</td>";
            echo "<td>" . $row["FullName"] . "</td>";
            echo "<td>" . $row["Address"] . "</td>";
            echo "<td>" . $row["PhoneNumber"] . "</td>";

            echo "</tr>";
          }
          echo '
                </tbody>
              </table>
            </div>
          </div>
          ';
        } else {
          echo "0 results";
        }
        $conn->close();
        ?>
      </tbody>
    </table>
  </div>
</div>
</body>
</html>

<!DOCTYPE html>
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



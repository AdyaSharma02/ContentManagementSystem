<!DOCTYPE html>
<html>
<head>
  <title>Edit Profile</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

  <style>
    body {
      background: linear-gradient(to bottom, #000000, #808080);
      background-attachment: fixed;
      background-repeat: no-repeat;
      background-size: cover;
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
      color: white;
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

<div class="container">
  <h2 style="text-align: center; margin-top: 20px;">EDIT PROFILE</h2>
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

  if (isset($_SESSION["username"]) && isset($_SESSION["password"])) {
    $sessionUsername = $_SESSION["username"];
    $sessionPassword = $_SESSION["password"];

    $query = "SELECT * FROM login_logout WHERE username = '$sessionUsername' AND password = '$sessionPassword'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
      $user = "SELECT * FROM user_list WHERE username = '$sessionUsername'";
      $userResult = $conn->query($user);

      if ($userResult->num_rows > 0) {
        $userDetails = $userResult->fetch_assoc();
        $query = $result->fetch_assoc();
        ?>

        <form action="updateProfile.php" method="post">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" value="<?php echo $userDetails['Username']; ?>"readonly>
              </div>
              <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" id="email" name="email" value="<?php echo $userDetails['Email']; ?>">
              </div>
              <div class="form-group">
                <label for="full_name">Full Name:</label>
                <input type="text" class="form-control" id="full_name" name="full_name" value="<?php echo $userDetails['FullName']; ?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" class="form-control" id="address" name="address" value="<?php echo $userDetails['Address']; ?>">
              </div>
              <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $userDetails['PhoneNumber']; ?>">
              </div>
              <div class="form-group">
                <label for="password">Password:</label>
                <div class="input-group">
                  <input type="password" class="form-control" id="password" name="password" value="<?php echo $query['Password']; ?>" readonly>
                  <div class="input-group-append">
                    <span class="input-group-text" id="passwordIcon">
                      <i class="fas fa-eye" id="togglePassword"></i>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary" name="updateProfile">UPDATE PROFILE</button>
        </form>
        <script>
          // JavaScript to toggle password visibility
          function togglePassword() {
            const passwordInput = document.getElementById("password");
            const passwordIcon = document.getElementById("togglePassword");
            if (passwordInput.type === "password") {
              passwordInput.type = "text";
              passwordIcon.classList.remove("fa-eye");
              passwordIcon.classList.add("fa-eye-slash");
            } else {
              passwordInput.type = "password";
              passwordIcon.classList.remove("fa-eye-slash");
              passwordIcon.classList.add("fa-eye");
            }
          }

          const passwordIcon = document.getElementById("togglePassword");
          passwordIcon.addEventListener("click", togglePassword);
        </script>
        <?php
      } else {
        echo "User details not found!";
      }
    } else {
      echo "Invalid username or password.";
    }
  } else {
    echo "Please log in to edit your profile.";
  }

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

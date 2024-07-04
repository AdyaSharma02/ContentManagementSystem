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

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $id = $_POST["id"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $fullName = $_POST["fullName"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];

    // Insert data into the login_logout table
    $insertLoginQuery = "INSERT INTO login_logout (username, password) VALUES ('$username', '$password')";
    $conn->query($insertLoginQuery);

    // Insert data into the user_list table
    $insertUserQuery = "INSERT INTO user_list (ID, Username, Email, FullName, Address, PhoneNumber) 
                        VALUES ('$id', '$username', '$email', '$fullName', '$address', '$phone')";
    $conn->query($insertUserQuery);

    // Redirect to the login form page after successful registration
    header("location: http://localhost:80/ProjectCMS/LoginForm.html");
    exit();
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignIn</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background: url("SignInImg.jpg");
            font-family: Arial, sans-serif;
            background-repeat: no-repeat;
            background-size: cover;
            animation: slide-background 20s linear infinite;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 30px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            background: rgba(255, 255, 255, 0.8);
        }


        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: black;
            font-weight: bold;
        }

        label {
            font-weight: bold;
            text-transform: uppercase;
            color: #333;
        }

        .form-control {
            border: none;
            border-radius: 0;
            background: transparent;
            color: #333;
            border-bottom: 2px solid #007bff;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: none;
        }

        button[type="submit"],
        button[type="reset"] {
            border-radius: 0;
            transition: background-color 0.2s ease-in-out;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-reset {
            background-color: #dc3545;
            border-color: #dc3545;
            color: #fff;
        }

        .btn-reset:hover {
            background-color: #c82333;
        }

        .icon-bar {
            position: fixed;
            top: 50%;
            -webkit-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
        }

        /* Common styles for the icon bar */
        .icon-bar {
            position: fixed;
            top: 50%;
            -webkit-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
        }

        .icon-bar a {
            display: block;
            text-align: center;
            padding: 5px;
            color: white;
            font-size: 2rem;
            text-decoration: none;
            transition: all 0.3s ease;
            transform: scale(1);
        }

        .icon-bar a:hover {
            background-color: #000;
            transform: scale(1.1);
        }

        /* Add animation for each icon */
        .facebook {
            background: #3B5998;
            transition: background 0.3s ease;
        }

        .instagram {
            background: linear-gradient(135deg, #405de6, #5851db, #833ab4, #c13584, #e1306c, #fd1d1d);
            transition: background 0.3s ease;
        }

        .google {
            background: #dd4b39;
            transition: background 0.3s ease;
        }

        .youtube {
            background: #bb0000;
            transition: background 0.3s ease;
        }

        /* Add a pulse animation on hover for each icon */
        .icon-bar a:hover .facebook,
        .icon-bar a:hover .instagram,
        .icon-bar a:hover .google,
        .icon-bar a:hover .youtube {
            animation: pulse 1s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
            100% {
                transform: scale(1);
            }
        }

        @keyframes slide-background {
          0% {
            background-position: 0 0;
          }
          100% {
            background-position: 100% 100%;
          }
        }

    </style>
</head>
<body>
<div class="icon-bar">
    <a href="http://www.facebook.com" class="facebook"><i class="fab fa-facebook"></i></a> 
    <a href="http://www.instagram.com" class="instagram"><i class="fab fa-instagram"></i></a> 
    <a href="http://www.google.com" class="google"><i class="fab fa-google"></i></a> 
    <a href="http://www.youtube.com" class="youtube"><i class="fab fa-youtube"></i></a> 
</div>
<div class="container mt-5">        
    <h2><b>USER REGISTRATION</b></h2>
    <form action="signin.php" method="post">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="id"><b>ID:</b></label>
                    <input type="text" class="form-control" id="id" name="id" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="username"><b>Username:</b></label>
                    <input type="text" class="form-control" name="username" id="username" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="password"><b>Password:</b></label>
                    <input type="password" class="form-control" name="password" id="password" required>
                    <i class="fas fa-eye" id="passwordIcon" onclick="PasswordVisibility()"></i>
              </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email"><b>Email:</b></label>
                    <input type="email" class="form-control" name="email" id="email" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="fullName"><b>Full Name:</b></label>
                    <input type="text" class="form-control" name="fullName" id="fullName" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="address"><b>Address:</b></label>
                    <input type="text" class="form-control" name="address" id="address" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="phone"><b>Phone Number:</b></label>
                    <input type="tel" class="form-control" name="phone" id="phone" required>
                </div>
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">REGISTER</button>
            <button class="btn btn-reset" type="reset"><i class="fas fa-sync-alt"></i> RESET</button>
        </div>
    </form>
</div>
<script>
    function PasswordVisibility() {
      var passwordInput = document.getElementById("password");
      if (passwordInput.type == "password") 
      {
        passwordInput.type = "text";
      } 
      else 
      {
        passwordInput.type = "password";
      }
    }
    function validateForm() {
      alert("Please complete all required fields to Sign In to the Content Management System.");
      return false;
    }

  </script>
</body>
</html>
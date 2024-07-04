<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        body{
            background: linear-gradient(to top, #71706e, #ffffff, #c0bfbd);
        }
        /* Style for the navigation bar */
        .navbar {
            background-color: #343a40; /* Dark background color */
            border-bottom: 4px solid #ffc107; /* Yellow border */
        }

        .navbar-brand, .navbar-nav .nav-link {
            color: #ffffff;
            font-weight: bold;
        }

        /* Style for the feedback section */
        .feedback-section {
            background-color: #ffffff;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .feedback-section h4 {
            color: #343a40;
        }

        /* Style for the "Logout" button */
        .navbar-nav .nav-link.logout {
            background-color: #E3242B;
            color: #ffffff;
            border-radius: 5px;
        }

        .navbar-nav .nav-link.logout:hover {
            background-color: #BC544B;
        }

          .custom-button {
            background-color: #3498db;
            color: #fff;      
            border: 2px solid #3498db;
            border-radius: 5px;      
            padding: 10px 20px;    
          }

          /* Hover effect to change the button color when hovered */
          .custom-button:hover {
            background-color: #2980b9;
          }

          .feedback-buttons {
                display: flex;
                justify-content: space-between;
                margin-top: 10px;
            }

            .feedback-buttons a {
                text-decoration: none;
                color: white;
            }

            .feedback-buttons .btn-primary {
                background-color: #051094;
                border: 1px solid white;
                border-radius: 5px;
                padding: 10px 20px;
            }

            /* Hover effect to change the button color when hovered */
            .feedback-buttons .btn-primary:hover {
                background-color: #2832C2;
            }

            .container {
            max-width: 800px;
            margin: 0 auto;
        }

        .mt-3 {
            margin-top: 1rem;
        }

        .mb-4 {
            margin-bottom: 2rem;
        }

        .post-list {
            list-style: none;
            padding: 0;
        }

        .post-item {
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .post-item strong {
            color: #333;
        }

        .edit-btn,
        .delete-btn {
            text-decoration: none;
            padding: 8px 12px;
            margin-top: 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        .edit-btn {
            background-color: #007bff;
            color: #fff;
            margin-right: 10px;
        }

        .delete-btn {
            background-color: #dc3545;
            color: #fff;
        }

        .edit-btn:hover,
        .delete-btn:hover {
            background-color: #0056b3;
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
                    <a class="nav-link" href="#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/ProjectCMS/Profile.php">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="createContent.php">Create</a>
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
        <h1 class="mt-3 mb-4"><center>CONTENTS</center></h1>
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

        // Fetch data from the "posts" table
        $sql = "SELECT ID, Username, Email, Category, Date, Content, Status FROM posts";
        $result = $conn->query($sql);

        // Check if there are rows in the result set
        if ($result->num_rows > 0) {
            // Output data in a list format
            echo "<ul class='post-list'>";
            while ($row = $result->fetch_assoc()) {
                echo "<li class='post-item' style='background: linear-gradient(to bottom, #f5f5f5, #dcdcdc); color: black;'>";
                echo "<strong>ID:</strong> " . $row["ID"] . "<br>";
                echo "<strong>Username:</strong> " . $row["Username"] . "<br>";
                echo "<strong>Email:</strong> " . $row["Email"] . "<br>";
                echo "<strong>Category:</strong> " . $row["Category"] . "<br>";
                echo "<strong>Date:</strong> " . $row["Date"] . "<br>";
                echo "<strong>Content:</strong> " . $row["Content"] . "<br>";
                echo "<strong>Status:</strong> " . $row["Status"] . "<br><br>";

                // Add Edit button
                echo "<a href='editContent.php?id=" . $row["ID"] . "' class='btn btn-primary edit-btn'>EDIT</a>";

                // Add Delete button
                echo "<a href='deleteContent.php?id=" . $row["ID"] . "' class='btn btn-danger delete-btn' onclick='return confirm(\"Are you sure?\")'>DELETE</a>";

                echo "</li><br>";
            }
            echo "</ul>";
        } else {
            echo "0 results";
        }

        // Close the database connection
        $conn->close();
        ?>
        </div>


<div class="container mt-5 feedback-section">
    <footer>
        <div class="row mt-3">
            <div class="col-md-12">
                <h3 style="color: white;">Submit Feedback</h3>
                <form action="SubmitFeedback.php" method="post">
                    <div class="form-group">
                        <label for="feedbackText">Feedback:</label>
                        <textarea class="form-control" id="feedbackText" name="feedbackText" rows="4" required placeholder="Provide Your Feedback here..."></textarea>
                    </div>
                    <input class="btn btn-primary" type="submit" value="Submit Feedback">
                    <a class="btn btn-primary" href="http://localhost/ProjectCMS/AllFeedbacks.php">All Feedbacks</a>
                </form>
            </div>
        </div>
    </footer>
</div>
</body>
</html>

<!--Footer-->
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

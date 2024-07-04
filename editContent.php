<?php
// Assuming you have a database connection already established
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cms";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the ID parameter is set in the URL
if (isset($_GET['id'])) {
    $postId = $_GET['id'];

    // Fetch data for the selected post
    $sql = "SELECT ID, Username, Email, Category, Date, Content, Status FROM posts WHERE ID = $postId";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        // Display the form for editing
        ?>
        <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <!-- Add Bootstrap CDN link-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Add custom styles -->
    <style>
        body {
            background: linear-gradient(to bottom, #1a1a1a, #f4f4f4);
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            margin: 50px auto;
            animation: fadeIn 1s ease-in-out;
        }

        h1 {
            color: black;
            text-align: center;
            margin-bottom: 30px;
            animation: bounceInDown 1s;
            font-weight: bold;
        }

        label {
            font-weight: bold;
            color: #007bff;
        }

        input[type="text"],
        input[type="email"],
        textarea,
        input[type="date"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            border-radius: 5px;
            background-color: #f8f9fa;
            transition: background-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        textarea:focus,
        input[type="date"]:focus {
            background-color: #e2e6ea;
        }

        input[type="submit"] {
            background-color: #28a745;
            color: #fff;
            padding: 12px 25px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #218838;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes bounceInDown {
            from,
            60%,
            75%,
            90%,
            to {
                animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
            }

            0% {
                opacity: 0;
                transform: translate3d(0, -3000px, 0);
            }

            60% {
                opacity: 1;
                transform: translate3d(0, 25px, 0);
            }

            75% {
                transform: translate3d(0, -10px, 0);
            }

            90% {
                transform: translate3d(0, 5px, 0);
            }

            to {
                transform: none;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>EDIT POST</h1>
        <form action="updateContent.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['ID']; ?>">

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" name="username" value="<?php echo $row['Username']; ?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" name="email" value="<?php echo $row['Email']; ?>" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="category">Category:</label>
                        <input type="text" class="form-control" name="category" value="<?php echo $row['Category']; ?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="date">Date:</label>
                        <input type="text" class="form-control" name="date" value="<?php echo $row['Date']; ?>" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="content">Content:</label>
                <textarea class="form-control" rows=10 cols=40 name="content" required><?php echo $row['Content']; ?></textarea>
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <input type="text" class="form-control" name="status" value="<?php echo $row['Status']; ?>" required>
            </div>

            <input type="submit" class="btn btn-success" value="UPDATE">
        </form>
    </div>
</body>

</html>


        <?php
    } else {
        echo "Post not found.";
    }
} else {
    echo "Post ID not provided.";
}

// Close the database connection
$conn->close();
?>

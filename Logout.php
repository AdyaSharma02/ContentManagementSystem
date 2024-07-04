<?php
// Start session to access session variables
session_start();

// Destroy all session variables
session_destroy();

// Redirect the user to the login page after logout
header("Location: http://localhost:80/ProjectCMS/LoginForm.html");
exit();
?>

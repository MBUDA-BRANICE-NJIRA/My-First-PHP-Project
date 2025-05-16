<?php
session_start();
// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
</head>
<body>
    
    <h1>User Dashhboard</h1>
     <button class="logout-btn" onclick="location.href='./LogOut.php'">
    <i class="fas fa-sign-out-alt"></i>
      Logout
    </button>
</body>
</html>

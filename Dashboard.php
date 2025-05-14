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
    <title>Dashbaord</title>
</head>
<body>
    <nav>
        <a href="./LogOut.php"></a>
    </nav>
    <h1>Admin Dashboard</h1>
    
</body>
</html>
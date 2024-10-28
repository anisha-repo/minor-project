<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
include("includes/db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Dashboard</h1>
    <p>Welcome to the Admin Panel</p>
    <a href="manage_users.php">Manage Users</a><br>
    <a href="manage_products.php">Manage Products</a><br>
    <a href="logout.php">Logout</a>
</body>
</html>

<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$database = "solemate";
$connection = mysqli_connect($servername, $username, $password, $database);

// Check database connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}// Database connection file

$username = 'admin'; // Set your desired username
$password = 'admin123'; // Set your desired password

// Hash the password for secure storage
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Insert the new admin user into the database
$stmt = $connection->prepare("INSERT INTO `admin-user` (user_name, password) VALUES (?, ?)");
$stmt->bind_param("ss", $username, $hashedPassword);

if ($stmt->execute()) {
    echo "Admin user created successfully.";
} else {
    echo "Error creating admin user: " . $stmt->error;
}

$stmt->close();
$connection->close();
?>

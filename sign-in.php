<?php
session_start();
include("includes/db.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email-signin']);
    $password = trim($_POST['password-signin']);

    // Modify the SQL query to select user_id and hashed password
    $stmt = $connection->prepare("SELECT user_id, password FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);
    
    if ($stmt->execute()) {
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($user_id, $hashed_password); // Fetch user_id and password
            $stmt->fetch();

            if (password_verify($password, $hashed_password)) {
                // Set session variables
                $_SESSION['user_logged_in'] = true; 
                $_SESSION['user_id'] = $user_id; // Store user ID
                $_SESSION['user_email'] = $email; 
               
                header("Location: index.php"); // Change to your desired page
                exit(); // Ensure to call exit after the redirect
            } else {            
                $_SESSION['error_message'] = 'Incorrect email or password. Please try again.';
            }
        } else {
            $_SESSION['error_message'] = 'No user found with that email.';
        }
    } else {
        $_SESSION['error_message'] = 'Error executing query: ' . $stmt->error;
    }

    $stmt->close();
}
$connection->close();
header("Location: login.php"); 
exit();
?>

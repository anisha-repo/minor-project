<?php
session_start();
include("includes/db.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email-signin']);
    $password = trim($_POST['password-signin']);

    $stmt = $connection->prepare("SELECT password FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $error = " ";
    if ($stmt->execute()) {
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($hashed_password);
            $stmt->fetch();
           
            if (password_verify($password, $hashed_password)) {
                $_SESSION['user_logged_in'] = true; 
                $_SESSION['user_email'] = $email; 
               
                header("Location: index.php"); // Change to your desired page
               
                exit(); // Make sure to call exit after the redirect
                // Start a session or redirect the user
            } 
            else{            
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

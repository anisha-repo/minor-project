<?php
session_start();
include("../includes/db.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name-signin']);
    $password = trim($_POST['password-signin']);

    // Modify the SQL query to select user_id and hashed password
    $stmt = $connection->prepare("SELECT `user_id`, `user_name`, `password` FROM `admin-user`WHERE user_name = ?");
    $stmt->bind_param("s",   $name);
    
    if ($stmt->execute()) {
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($user_id,$user_name, $hashed_password); // Fetch user_id and password
            $stmt->fetch();

           

            if (password_verify($password, $hashed_password)) {
                // Set session variables
                echo 'verified';
                $_SESSION['user_logged_in'] = true; 
                $_SESSION['user_id'] = $user_id; // Store user ID
                $_SESSION['user_name'] = $user_name ; 
               
                header("Location: ../admin/dashboard.php"); // Change to your desired page
                exit(); // Ensure to call exit after the redirect
            } else {            
                $_SESSION['error_message'] = 'Incorrect email or password. Please try again.';
                header("Location: ../admin/index.php");
                exit();
            }
        } else {
            $_SESSION['error_message'] = 'No user found with that email.';
            header("Location: ../admin/index.php");
            exit();
        }
    } else {
        $_SESSION['error_message'] = 'Error executing query: ' . $stmt->error;
    }

    $stmt->close();
}
$connection->close();
// header("Location: login.php"); 
exit();
?>

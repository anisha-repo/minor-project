<?php
session_start();
include("includes/db.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phone = $_POST['phone'];
    $email = $_POST['email-signup'];
    $password = password_hash($_POST['password-signup'], PASSWORD_DEFAULT);
    $address = $_POST['address'];


    $email = $_POST['email-signup'];
   $phoneNo = $_POST['phone'];
    // Check if the email already exists
    $stmt = $connection->prepare("SELECT `user_id` FROM user WHERE email = ? OR `phone-no` = ?");
    $stmt->bind_param("ss", $email,$phoneNo);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
                 $_SESSION['error_message'] = 'an account with this email or phone number already exist';
                 header("Location: login.php"); 
                 exit();
    } 
     else {
        // Email is unique, proceed with insertion
        $stmt = $connection->prepare("INSERT INTO `user`( `first-name`, `last-name`, `phone-no`, `email`, `password`,`address`)  VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $fname, $lname, $phone, $email, $password, $address);

        
        if ($stmt->execute()) {

            $_SESSION['user_logged_in'] = true; 
            $_SESSION['user_email'] = $email; 
            // Redirect to a new page after successful sign-up
            header("Location: index.php"); // Change to your desired page
            exit(); // Make sure to call exit after the redirect
        } else {
            echo "Error: " . $stmt->error;
        }
    }

    $stmt->close();
}
$connection->close();
?>

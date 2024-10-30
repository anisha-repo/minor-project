<?php
session_start();
include("includes/db.php");// Include your database connection

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Validate and sanitize input
$firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING);
$lastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING);
$address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$password= filter_input(INPUT_POST, 'password', FILTER_VALIDATE_EMAIL);

if ($firstName && $lastName && $address && $gender && $phone && $email) {
    // Update the user's profile in the database
    $sql = " UPDATE `user` SET `first-name`=?,`last-name`=?,`phone-no`=?,`email`=?,`address`=?,`password`=?
            WHERE user_id = ?";
          
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ssssssi", $firstName, $lastName, $address, $gender, $phone, $email, $user_id);

    if ($stmt->execute()) {
        // Redirect to profile page with success message
        header("Location: profile.php?success=1");
        exit();
    } else {
        // Redirect back to profile page with an error
        header("Location: profile.php?error=Database update failed");
        exit();
    }
} else {
    // Redirect back to profile page with an error
    header("Location: profile.php?error=Invalid input data");
    exit();
}
?>

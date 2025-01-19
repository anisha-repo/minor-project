<?php
session_start();
include("includes/db.php"); // Include your database connection

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
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING); // Password sanitized

// Ensure gender is also passed and sanitized if needed
$gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING); // Assuming gender is passed as a form field

// Check if all required fields are provided and valid
if ($firstName && $lastName && $address && $gender && $phone && $email) {
    // If password is provided, hash it before storing
    if ($password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Hash the password
    } else {
        // If no password is provided, do not update it
        $hashedPassword = null;
    }

    // Prepare the SQL query
    $sql = "UPDATE `user` SET `first_name`=?, `last_name`=?, `phone_no`=?, `email`=?, `address`=?, `gender`=? " .
           ($hashedPassword ? ", `password`=?" : "") . " WHERE `user_id` = ?";

    $stmt = $connection->prepare($sql);

    // Check for SQL errors
    if (!$stmt) {
        die("Error preparing statement: " . $connection->error);
    }

    // Bind the parameters (if password is not null, bind the hashed password)
    if ($hashedPassword) {
        $stmt->bind_param("sssssssi", $firstName, $lastName, $phone, $email, $address, $gender, $hashedPassword, $user_id);
    } else {
        $stmt->bind_param("ssssssi", $firstName, $lastName, $phone, $email, $address, $gender, $user_id);
    }

    // Execute the query and check if it was successful
    if ($stmt->execute()) {
        // Check the number of affected rows to see if any rows were updated
        if ($stmt->affected_rows > 0) {
            header("Location: customer-profile.php?success=1");
            exit();
        } else {
            // If no rows were affected, output a message
            header("Location: customer-profile.php?error=No changes were made");
            exit();
        }
    } else {
        // Log the error if SQL execution fails
        header("Location: customer-profile.php?error=Database update failed");
        exit();
    }
} else {
    // Redirect back to profile page with an error if input is invalid
    header("Location: customer-profile.php?error=Invalid input data");
    exit();
}
?>

<?php
session_start();
include("includes/db.php"); // Database connection

// Check if the user is logged in
if (!isset($_SESSION['user_id']) || !isset($_POST['product_id'])) {
    $_SESSION['error'] = "Invalid request.";
    header("Location: wishlist.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$product_id = $_POST['product_id'];

// Prepare query to remove the product from the user's wishlist
$sql = "DELETE FROM user_wishlist WHERE user_id = ? AND product_id = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("ii", $user_id, $product_id);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    $_SESSION['message'] = "Product removed from your wishlist.";
} else {
    $_SESSION['error'] = "Failed to remove product from your wishlist.";
}

$stmt->close();
$connection->close();

// Redirect back to wishlist page
header("Location: wishlist.php");
exit();

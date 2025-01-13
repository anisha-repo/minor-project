<?php
session_start();
include("includes/db.php");

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id']; // Get the logged-in user ID

    // Delete all cart items for the logged-in user from the cart_item table
    $sql = "DELETE FROM cart_item WHERE user_id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $user_id); // Bind user_id as parameter
    $stmt->execute();

    // Check if any rows were affected (i.e., cart was cleared)
    if ($stmt->affected_rows > 0) {
        $_SESSION['message'] = "Cart has been cleared.";  // Success message
    } else {
        $_SESSION['error'] = "Your cart is already empty.";  // Error message if no items were deleted
    }
    
    // Close the statement
    $stmt->close();
} else {
    // If the user is not logged in, remove cart from session
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        unset($_SESSION['cart']);  // Clear the session cart
        $_SESSION['message'] = "Cart has been cleared.";  // Success message
    } else {
        $_SESSION['error'] = "Your cart is already empty.";  // Error message if cart is empty
    }
}

// Redirect to the cart page
header("Location: cart.php");
exit();
?>

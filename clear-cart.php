<?php
session_start();

// Check if the cart exists
if (isset($_SESSION['cart'])) {
    // Clear the cart
    unset($_SESSION['cart']);
    $_SESSION['message'] = "Cart has been cleared.";
} else {
    $_SESSION['error'] = "Cart is already empty.";
}

// Redirect back to the cart page or another appropriate page
header("Location: cart.php");
exit();
?>

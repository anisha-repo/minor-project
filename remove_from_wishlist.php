<?php
session_start();

// Check if a product ID is provided
if (isset($_POST['product_id'])) {
    $product_id = intval($_POST['product_id']); // Ensure the product_id is an integer

    // Check if the wishlist exists
    if (isset($_SESSION['wishlist'])) {
        // Remove the product ID from the wishlist
        if (($key = array_search($product_id, $_SESSION['wishlist'])) !== false) {
            unset($_SESSION['wishlist'][$key]);
            $_SESSION['message'] = "Product removed from wishlist.";
        } else {
            $_SESSION['error'] = "Product not found in your wishlist.";
        }
    } else {
        $_SESSION['error'] = "Wishlist is empty.";
    }

    header("Location: wishlist.php"); // Redirect back to the wishlist page
    exit();
} else {
    $_SESSION['error'] = "No product ID provided.";
    header("Location: wishlist.php");
    exit();
}
?>

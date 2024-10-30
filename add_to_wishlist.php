<?php
session_start();

include("includes/db.php"); // Database connection


// Check if a product ID is provided
if (isset($_POST['product_id'])) {
    $product_id = intval($_POST['product_id']); // Ensure the product_id is an integer
    // Initialize the wishlist session if it doesn't exist
    if (!isset($_SESSION['wishlist'])) {
        $_SESSION['wishlist'] = []; 
    }

    // Check if the product is already in the wishlist
    if (!in_array($product_id, $_SESSION['wishlist'])) {
        // Fetch product details from the database
        $stmt = $connection->prepare("SELECT Brand_name, model FROM products WHERE product_id = ?");
        if ($stmt === false) {
            $_SESSION['error'] = "Database error: " . $connection->error;
            header("Location: wishlist.php"); // Redirect back to wishlist page
            exit();
        }

        $stmt->bind_param("i", $product_id);
        if (!$stmt->execute()) {
            $_SESSION['error'] = "Execution error: " . $stmt->error;
            header("Location: wishlist.php");
            exit();
        }
        
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Add product ID to wishlist
            $_SESSION['wishlist'][] = $product_id;
            $_SESSION['message'] = "Product added to wishlist.";
        } else {
            $_SESSION['error'] = "Product not found.";
        }
        
        $stmt->close();
    } else {
        $_SESSION['message'] = "Product is already in your wishlist.";
    }
    $connection->close(); // Close the database connection

    header("Location:wishlist.php"); // Redirect back to the wishlist page
    exit();
} else {
    $_SESSION['error'] = "No product ID provided.";
    header("Location: wishlist.php");
    exit();
}
?>

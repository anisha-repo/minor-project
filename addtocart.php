<?php
session_start();
if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
    // User is logged in, proceed with your logic
    echo "Welcome, user!";
} else {
    // User is not logged in, redirect to login page or show an error
    echo "You need to be logged in to access this page.";
    header("Location: login.php"); // Redirect to the login page
    exit();
}

 

include("includes/db.php"); // Database connection

// Check if a product ID is provided
if (isset($_POST['product_id'])) {
    $product_id = intval($_POST['product_id']); // Ensure the product_id is an integer

    // Initialize the cart session if it doesn't exist
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = []; 
    }

    // Check if the product is already in the cart
    if (array_key_exists($product_id, $_SESSION['cart'])) {
        // Increment the quantity if the product is already in the cart
        $_SESSION['cart'][$product_id]['quantity'] += 1;
        $_SESSION['message'] = "Product quantity updated.";
    } else {
        // Fetch product details from the database
        $stmt = $connection->prepare("SELECT Brand_name, model, original_price FROM products WHERE product_id = ?");
        if ($stmt === false) {
            $_SESSION['error'] = "Database error: " . $connection->error;
            header("Location: cart.php"); // Redirect back to cart page or previous page
            exit();
        }

        $stmt->bind_param("i", $product_id);
        if (!$stmt->execute()) {
            $_SESSION['error'] = "Execution error: " . $stmt->error;
            header("Location: cart.php");
            exit();
        }
        
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $product = $result->fetch_assoc();
            // Add product to cart
            $_SESSION['cart'][$product_id] = [
                'name' => $product['Brand_name'] . " " . $product['model'],
                'price' => $product['original_price'],
                'quantity' => 1
            ];
            $_SESSION['message'] = "Product added to cart.";
        } else {
            $_SESSION['error'] = "Product not found.";
        }
        
        $stmt->close();
    }
    $connection->close(); // Close the database connection

    header("Location: cart.php"); // Redirect back to a cart or product page
    exit();
} else {
    $_SESSION['error'] = "No product ID provided.";
    header("Location: cart.php");
    exit();
}
?>

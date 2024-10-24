<?php
include("includes/header.php");
include("includes/db.php"); // Database connection

// Check if a product ID is provided
if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];

    // Check if the cart session exists
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = []; // Initialize the cart session
    }

    // Check if the product is already in the cart
    if (array_key_exists($product_id, $_SESSION['cart'])) {
        // Increment the quantity if the product is already in the cart
        $_SESSION['cart'][$product_id]['quantity'] += 1;
    } else {
        // Fetch product details from the database
        $stmt = $connection->prepare("SELECT Brand_name, model, original_price FROM products WHERE product_id = ?");
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $product = $result->fetch_assoc();
            // Add product to cart
            $_SESSION['cart'][$product_id] = [
                'name' => $product['Brand_name'] . " " . $product['model'],
                'price' => $product['original_price'],
                'quantity' => 1
            ];
        }
        $stmt->close();
    }
    $connection->close(); // Close the database connection

    // Redirect back to the product page or a confirmation page
    header("Location: product_page.php?added_to_cart=1"); // Redirect with a success flag
    exit();
}


?>
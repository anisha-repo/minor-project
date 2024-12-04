<?php
// Include database connection
include("includes/db.php");

// Get the order ID from the URL query parameter
$orderId = $_GET['order_id'];

// Fetch order items with product details
$sql = "SELECT oi.*, p.model, oi.quantity, oi.price
        FROM order_items oi
        INNER JOIN products p ON oi.product_id = p.product_id
        WHERE oi.order_id = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("i", $orderId);
$stmt->execute();
$items_result = $stmt->get_result();

// Initialize an empty cart array
$cartItems = [];

while ($item = $items_result->fetch_assoc()) {
    // Add each item to the cart array
    $cartItems[] = [
        'product_id' => $item['product_id'],
        'model' => $item['model'],
        'quantity' => $item['quantity'],
        'price' => $item['price']
    ];
}

// Store cart items in session
$_SESSION['cart'] = $cartItems;

// Redirect to the cart page or checkout page
header("Location: cart.php");  // or checkout.php if ready
exit();
?>

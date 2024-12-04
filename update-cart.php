<?php
session_start();
include("includes/db.php");

if (isset($_POST['cart_id']) && isset($_POST['quantity'])) {
    $cart_id = $_POST['cart_id'];
    $quantity = $_POST['quantity'];

    // Update the quantity in the cart table
    $sql = "UPDATE cart_item SET quantity = ? WHERE cart_id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ii", $quantity, $cart_id);
    $stmt->execute();
    $stmt->close();

    // Redirect to cart page
    header("Location: cart.php");
    exit();
}
?>

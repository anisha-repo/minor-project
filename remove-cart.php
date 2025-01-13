<?php
session_start();
include("includes/db.php");

if (isset($_POST['cart_id'])) {
    $cart_id = $_POST['cart_id'];

    // Delete the item from the cart table
    $sql = "DELETE FROM cart_item WHERE id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $cart_id );
    $stmt->execute();
    $stmt->close();

    // Redirect to cart page
    header("Location: cart.php");
    exit();
}
?>

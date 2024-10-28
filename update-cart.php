<?php
session_start();

if (isset($_POST['product_id']) && isset($_POST['quantity'])) {
    $product_id = intval($_POST['product_id']);
    $quantity = intval($_POST['quantity']);

    if (isset($_SESSION['cart'][$product_id])) {
        // Update quantity
        if ($quantity > 0) {
            $_SESSION['cart'][$product_id]['quantity'] = $quantity;
            $_SESSION['message'] = "Quantity updated.";
        } else {
            unset($_SESSION['cart'][$product_id]); // Remove item if quantity is 0
            $_SESSION['message'] = "Product removed from cart.";
        }
    }

    header("Location: cart.php");
    exit();
}

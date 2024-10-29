<?php
session_start();

if (isset($_POST['product_id'])) {
    $product_id = intval($_POST['product_id']);

    if (isset($_SESSION['cart'][$product_id])) {
        unset($_SESSION['cart'][$product_id]); // Remove the item from the cart
        $_SESSION['message'] = "Product removed from cart.";
    }

    header("Location: cart.php");
    exit();
}

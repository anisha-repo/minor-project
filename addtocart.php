<?php
session_start();
include("includes/db.php");

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    die("You need to be logged in to add items to the cart.");
}

$user_id = $_SESSION['user_id']; // Get logged-in user ID

// Check if the product ID and quantity are provided
if (!isset($_POST['product_id'], $_POST['quantity'])) {
    die("Product ID and quantity are required.");
}

$product_id = (int)$_POST['product_id'];
$quantity = (int)$_POST['quantity'];

// Validate quantity input
if ($quantity <= 0) {
    die("Invalid quantity.");
}

// Check if the user exists
$sql_check_user = "SELECT user_id FROM user WHERE user_id = ?";
$stmt_user = $connection->prepare($sql_check_user);
$stmt_user->bind_param("i", $user_id);
$stmt_user->execute();
$stmt_user->store_result();

if ($stmt_user->num_rows == 0) {
    die("Invalid user ID.");
}
$stmt_user->close();

// Check if the product exists and get its price
$sql_get_price = "SELECT original_price FROM products WHERE product_id = ?";
$stmt_price = $connection->prepare($sql_get_price);
$stmt_price->bind_param("i", $product_id);
$stmt_price->execute();
$stmt_price->bind_result($price);
$stmt_price->fetch();
$stmt_price->close();

if (!$price) {
    die("Product not found.");
}

// Check if the product is already in the user's cart
$sql_check_cart = "SELECT id FROM cart_item WHERE user_id = ? AND product_id = ?";
$stmt_cart = $connection->prepare($sql_check_cart);
$stmt_cart->bind_param("ii", $user_id, $product_id);
$stmt_cart->execute();
$stmt_cart->store_result();

if ($stmt_cart->num_rows > 0) {
    // Product already in cart; update quantity
    $stmt_cart->close();
    $sql_update = "UPDATE cart_item SET quantity = quantity + ? WHERE user_id = ? AND product_id = ?";
    $stmt_update = $connection->prepare($sql_update);
    $stmt_update->bind_param("iii", $quantity, $user_id, $product_id);
    if ($stmt_update->execute()) {
        header("Location: cart.php");
        exit();
    } else {
        die("Error updating cart: " . $stmt_update->error);
    }
    $stmt_update->close();
} else {
    // Product not in cart; insert a new row
    $stmt_cart->close();
    $sql_insert = "INSERT INTO cart_item(user_id, product_id, quantity, price) VALUES (?, ?, ?, ?)";
    $stmt_insert = $connection->prepare($sql_insert);
    $stmt_insert->bind_param("iiid", $user_id, $product_id, $quantity, $price);
    if ($stmt_insert->execute()) {
        header("Location: cart.php");
        exit();
    } else {
        die("Error adding to cart: " . $stmt_insert->error);
    }
    $stmt_insert->close();
}
?>

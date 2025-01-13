<?php
session_start();
include("includes/db.php"); // Database connection

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'User is not logged in.']);
    exit();
}

// Check if product_id is passed
if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    $user_id = $_SESSION['user_id']; // Get the logged-in user's ID

    // Check if the product is already in the user's wishlist
    $sql = "SELECT * FROM user_wishlist WHERE user_id = ? AND product_id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ii", $user_id, $product_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        // Product is not in wishlist, so add it
        $sql = "INSERT INTO user_wishlist (user_id, product_id) VALUES (?, ?)";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("ii", $user_id, $product_id);
        if ($stmt->execute()) {
            echo json_encode(['success' => true, 'message' => 'Product added to your wishlist.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to add product to wishlist.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Product is already in your wishlist.']);
    }

    $stmt->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Product ID is missing.']);
}

$connection->close();
?>

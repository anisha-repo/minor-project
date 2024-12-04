<?php
session_start();
include("includes/db.php");

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id']; // Get the logged-in user ID

    // Check if the product ID and quantity are provided
    if (isset($_POST['product_id']) && isset($_POST['quantity'])) {
        $product_id = $_POST['product_id'];
        $quantity = $_POST['quantity'];

        // Validate quantity input
        if (!is_numeric($quantity) || $quantity <= 0) {
            echo "Invalid quantity.";
            exit();
        }

        // Get the product's price from the database
        $sql = "SELECT original_price FROM products WHERE product_id = ?";
        $stmt = $connection->prepare($sql);
        if ($stmt === false) {
            echo "Database error: " . $connection->error;
            exit();
        }
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        $stmt->bind_result($price);
        $stmt->fetch();
        $stmt->close();

        // If the product exists, insert it into the cart table
        if ($price) {
            // Check if the product is already in the cart for the current user
            $sql_check = "SELECT id FROM cart_item WHERE user_id = ? AND product_id = ?";
            $stmt_check = $connection->prepare($sql_check);
            $stmt_check->bind_param("ii", $user_id, $product_id);
            $stmt_check->execute();
            $stmt_check->store_result();

            if ($stmt_check->num_rows > 0) {
                // If product already exists in the cart, update quantity
                $stmt_check->close();
                $sql_update = "UPDATE cart_item SET quantity = quantity + ? WHERE user_id = ? AND product_id = ?";
                $stmt_update = $connection->prepare($sql_update);
                $stmt_update->bind_param("iii", $quantity, $user_id, $product_id);
                $stmt_update->execute();
                $stmt_update->close();
                echo "Product quantity updated in the cart.";
            } else {
                // If product doesn't exist in the cart, insert a new row
                $stmt_check->close();
                $sql_insert = "INSERT INTO cart_item(user_id, product_id, quantity, price) VALUES (?, ?, ?, ?)";
                $stmt_insert = $connection->prepare($sql_insert);
                $stmt_insert->bind_param("iiid", $user_id, $product_id, $quantity, $price);
                if ($stmt_insert->execute()) {
                    echo "Product added to the cart successfully.";
                } else {
                    echo "Error adding product to the cart.";
                }
                $stmt_insert->close();
            }

            // Redirect to the cart page after successful operation
            header("Location: cart.php");
            exit();
        } else {
            echo "Product not found.";
        }
    } else {
        echo "Product ID and quantity are required.";
    }
} else {
    echo "You need to be logged in to add items to the cart.";
}
?>

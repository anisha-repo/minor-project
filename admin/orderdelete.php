<?php
// Include database connection
include '../includes/db.php';

// Check if the order_id is passed
if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id']; // Get the order_id from the URL parameter

    // Begin the transaction
    $connection->begin_transaction();

    try {
        // First, delete the related payments in the payments table
        $sql = "DELETE FROM payments WHERE order_id = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("i", $order_id);
        $stmt->execute();

        // Then, delete the related items in the order_items table
        $sql = "DELETE FROM order_items WHERE order_id = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("i", $order_id);
        $stmt->execute();

        // Now, delete the order from the orders table
        $sql = "DELETE FROM orders WHERE order_id = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("i", $order_id);
        $stmt->execute();

        // Commit the transaction
        $connection->commit();

        // Redirect to the admin orders page or some success page
        header("Location: admin_orders.php?status=success");
        exit();
    } catch (Exception $e) {
        // If there is an error, rollback the transaction
        $connection->rollback();
        echo "Error deleting the order: " . $e->getMessage();
    }

} else {
    echo "No order ID provided.";
}
?>

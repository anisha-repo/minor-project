<?php
// Include database connection
include '../includes/db.php';

// Get the order_id from URL
$order_id = $_GET['order_id'];

// Fetch order details
$sql = "SELECT * FROM orders WHERE order_id = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("i", $order_id);
$stmt->execute();
$order_result = $stmt->get_result();
$order = $order_result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Update order status
    $status = $_POST['status'];
    $sql_update = "UPDATE orders SET status = ? WHERE order_id = ?";
    $stmt_update = $connection->prepare($sql_update);
    $stmt_update->bind_param("si", $status, $order_id);
    $stmt_update->execute();
    header("Location: admin_orders.php"); // Redirect to orders page
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Order</title>
    <link rel="stylesheet" href="edit_order.css">
</head>
<body>
    <header>
        <h1>Admin Panel</h1>
        <nav>
            <a href="admin_dashboard.php">Dashboard</a>
            <a href="admin_orders.php">Orders</a>
            <!-- Add other admin pages here -->
        </nav>
    </header>

    <main>
        <h2>Edit Order #<?php echo $order['order_id']; ?></h2>
        <form action="" method="POST">
            <label for="status">Order Status:</label>
            <select name="status" id="status">
                <option value="Pending" <?php echo ($order['status'] == 'Pending') ? 'selected' : ''; ?>>Pending</option>
                <option value="Shipped" <?php echo ($order['status'] == 'Shipped') ? 'selected' : ''; ?>>Shipped</option>
                <option value="Delivered" <?php echo ($order['status'] == 'Delivered') ? 'selected' : ''; ?>>Delivered</option>
            </select>
            <input type="submit" value="Update Status">
        </form>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Admin Panel</p>
    </footer>
</body>
</html>

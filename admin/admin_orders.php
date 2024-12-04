<?php
// Include database connection
include '../includes/db.php';

// Fetch orders from the database
$sql = "SELECT * FROM orders ORDER BY order_date DESC";
$stmt = $connection->prepare($sql);
$stmt->execute();
$orders_result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Orders</title>
    <link rel="stylesheet" href="admin_orders.css">
</head>
<body>
    <header>
        <h1>Admin Panel</h1>
        <nav>
            <a href="dashboard.php">Dashboard</a>
            <a href="admin_orders.php">Orders</a>
            <!-- Add other admin pages here -->
        </nav>
    </header>

    <main>
        <h2>All Orders</h2>
        <?php if ($orders_result->num_rows > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>User ID</th>
                        <th>Order Date</th>
                        <th>Total Amount</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($order = $orders_result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($order['order_id']); ?></td>
                            <td><?php echo htmlspecialchars($order['user_id']); ?></td>
                            <td><?php echo htmlspecialchars($order['order_date']); ?></td>
                            <td>Rs. <?php echo htmlspecialchars($order['total_amount']); ?></td>
                            <td><?php echo htmlspecialchars($order['status']); ?></td>
                            <td>
                                <a href="view_order.php?order_id=<?php echo $order['order_id']; ?>">View</a> |
                                <a href="edit_order.php?order_id=<?php echo $order['order_id']; ?>">Edit</a> |
                                <a href="orderdelete.php?order_id=<?php echo $order['order_id']; ?>" onclick="return confirm('Are you sure you want to delete this order?');">Delete</a>
                                
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No orders found.</p>
        <?php endif; ?>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Admin Panel</p>
    </footer>
</body>
</html>

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

// Fetch order items
$sql_items = "SELECT oi.*, p.model, pi.image_url
              FROM order_items oi
              INNER JOIN products p ON oi.product_id = p.product_id
              INNER JOIN productimages pi ON p.product_id = pi.product_id
              WHERE oi.order_id = ?";
$stmt = $connection->prepare($sql_items);
$stmt->bind_param("i", $order_id);
$stmt->execute();
$order_items_result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <link rel="stylesheet" href="view_order.css">
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
        <h2>Order #<?php echo $order['order_id']; ?></h2>
        <p><strong>Date:</strong> <?php echo $order['order_date']; ?></p>
        <p><strong>Status:</strong> <?php echo $order['status']; ?></p>
        <p><strong>Total Amount:</strong> Rs. <?php echo $order['total_amount']; ?></p>

        <h3>Order Items</h3>
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($item = $order_items_result->fetch_assoc()): ?>
                    <tr>
                        <td><img src="<?php echo $item['image_url']; ?>" alt="<?php echo $item['model']; ?>" width="50"></td>
                        <td><?php echo htmlspecialchars($item['model']); ?></td>
                        <td><?php echo htmlspecialchars($item['quantity']); ?></td>
                        <td>Rs. <?php echo htmlspecialchars($item['price']); ?></td>
                        <td>Rs. <?php echo htmlspecialchars($item['quantity'] * $item['price']); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Admin Panel</p>
    </footer>
</body>
</html>

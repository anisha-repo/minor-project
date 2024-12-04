<?php
include("includes/header.php");
include("includes/db.php");

// Get the current user ID (replace with your user authentication logic)
$userId = $_SESSION['user_id'];

// Fetch orders for the current user
$sql = "SELECT 
        o.order_id, 
        o.order_date,
        (SELECT SUM(oi.quantity * p.original_price) 
         FROM order_items oi 
         INNER JOIN products p ON oi.product_id = p.product_id 
         WHERE oi.order_id = o.order_id) AS total_amount,
        GROUP_CONCAT(p.model SEPARATOR ', ') AS products
    FROM orders o
    INNER JOIN order_items oi ON o.order_id = oi.order_id
    INNER JOIN products p ON oi.product_id = p.product_id
    WHERE o.user_id = ?
    GROUP BY o.order_id, o.order_date";
$stmt = $connection->prepare($sql);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>
    <link rel="stylesheet" href="styles/myorders.css">
</head>
<body>
    <div class="container">
        <h2>Your Orders</h2>

        <table class="orders-table">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Date</th>
                    <th>Total</th>
                  <!--  <th>Status</th> -->
                  <th>Product</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['order_id']; ?></td>
                        <td><?php echo $row['order_date']; ?></td>
                        <td><?php echo $row['total_amount']; ?></td>
                        <td><?php echo $row['model']; ?></td>
                     <!--   <td><?php echo $row['status']; ?></td> -->
                        <td>
                            <a href="order-details.php?order_id=<?php echo $row['order_id']; ?>">View Details</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script src="js/orders.js"></script>
</body>
</html>
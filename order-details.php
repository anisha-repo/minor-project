<?php
// Include database connection
include("includes/header.php");
include("includes/db.php");

// Get the order ID from the URL query parameter
$orderId = $_GET['order_id'];

// Fetch order details
$sql = "SELECT * FROM orders WHERE order_id = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("i", $orderId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $order = $result->fetch_assoc();
}
// Fetch order items with product details
$sql = "SELECT oi.*, p.model, pi.image_url
        FROM order_items oi
        INNER JOIN products p ON oi.product_id = p.product_id
        INNER JOIN productimages pi ON p.product_id = pi.product_id
        WHERE oi.order_id = ?
        GROUP BY oi.id";
$stmt = $connection->prepare($sql);
$stmt->bind_param("i", $orderId);
$stmt->execute();
$items_result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <link rel="stylesheet" href="styles/oder-details.css">
</head>
<body>
    <div class="container">
       <h2>Order Details</h2>
        <div class="order-summary">
            <h3>Order #<?php echo $order['order_id']; ?></h3>
            <p><strong>Date:</strong> <?php echo $order['order_date']; ?></p>
          <p><strong>Status:</strong> <?php echo $order['status']; ?></p> 
        </div>
        <div class="shipping-info">
            <h3>Shipping Information</h3>
            <p><strong>Address:</strong> <?php echo $order['user_address']; ?></p>
            <p><strong>Delivery Date:</strong> <?php echo $order['delivery_date']; ?></p>
        </div> 

        <div class="items-purchased">
            <h3>Items Purchased</h3>
            <table class="items-table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Price</th>

                    </tr>
                </thead>
                <tbody>
                    <?php while ($item = $items_result->fetch_assoc()) { ?>
                        <tr>
                            <td><img src="<?php echo $item['image_url']; ?>" alt="<?php echo $item['model']; ?>"></td>
                            <td><?php echo $item['model']; ?></td>
                            <td><?php echo $item['quantity']; ?></td>
                            <td><?php echo $item['price']; ?></td>
                           
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

       <!-- <div class="order-total">
            <h3>Order Summary</h3>
            <p><strong>Subtotal:</strong> <?php echo $order['subtotal']; ?></p>
            <p><strong>Shipping:</strong> <?php echo $order['shipping_cost']; ?></p> 
             <p><strong>Total:</strong> <?php echo $order['total_amount']; ?></p>
        </div>

        <div class="payment-info">
            <h3>Payment Information</h3>
            <p><strong>Payment Method:</strong> <?php echo $order['payment_method']; ?></p>
            <p><strong>Billing Address:</strong> <?php echo $order['billing_address']; ?></p>
        </div> -->

        <div class="action-buttons">
        <a href="reorder.php?order_id=<?php echo $order['order_id']; ?>" class="action-btn">Reorder</a>
            <button class="action-btn" onclick="contactSupport()">Contact Support</button>
        </div>
    </div>
    <?php
 include("includes/footer.php");
?>
    <script src="js/order-details.js"></script>
</body>
</html>
<?php
include("includes/header.php");
include("includes/db.php");
// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id']; // Get the logged-in user ID

    // Retrieve the cart items from the database
    $sql = "SELECT c.id, p.model, c.quantity, c.price 
            FROM cart_item c 
            INNER JOIN products p ON c.product_id = p.product_id 
            WHERE c.user_id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $cart_empty = false;
    } else {
        $cart_empty = true;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Shopping Cart</title>
    <link rel="stylesheet" type="text/css" href="styles/cart.css">
</head>
<body>
    <header>
        <h1>Your Shopping Cart</h1>
    </header>
    <main>
        <?php if ($cart_empty): ?>
            <p>Your cart is empty. <a href="index.php">Continue Shopping</a></p>
        <?php else: ?>
            <table border="1">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total_price = 0;
                    while ($row = $result->fetch_assoc()):
                        $subtotal = $row['price'] * $row['quantity'];
                        $total_price += $subtotal;
                    ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['model']); ?></td>
                        <td>Rs. <?php echo htmlspecialchars($row['price']); ?></td>
                        <td>
                            <form action="update-cart.php" method="POST">
                                <input type="number" name="quantity" value="<?php echo $row['quantity']; ?>" min="1" max="5">
                                <input type="hidden" name="cart_id" value="<?php echo $row['id']; ?>">
                               <!-- <input type="submit" value="Update"> -->
                            </form>
                        </td>
                        <td>Rs. <?php echo htmlspecialchars($subtotal); ?></td>
                        <td>
                            <form action="remove-cart.php" method="POST">
                                <input type="hidden" name="cart_id" value="<?php echo $row['id']; ?>">
                                <input type="submit" value="Remove">
                            </form>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <h2>Total Price: Rs. <?php echo htmlspecialchars($total_price); ?></h2>
            <form action="clear-cart.php" method="POST">
                <input type="submit" value="Clear Cart">
            </form>
            <form action="checkout.php" method="POST">
                <input type="submit" value="Proceed to Checkout">
            </form>
        <?php endif; ?>
    </main>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> soulmate. All rights reserved.</p>
    </footer>
</body>
</html>

<?php
} else {
    echo '<div class="login-message">
            <p>You need to <a href="login.php">log in</a> to view your cart.</p>
          </div>';
}
?>

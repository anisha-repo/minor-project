<?php
include("includes/header.php");

// Check if the cart is empty
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    $cart_empty = true;
} else {
    $cart_empty = false;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Shopping Cart</title>
    <link rel="stylesheet" type="text/css" href="styles/cart.css"> <!-- Link to your CSS file for styling -->
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
                    foreach ($_SESSION['cart'] as $product_id => $details): 
                        $subtotal = $details['price'] * $details['quantity'];
                        $total_price += $subtotal;
                    ?>
                    <tr>
                        <td><?php echo htmlspecialchars($details['name']); ?></td>
                        <td>Rs. <?php echo htmlspecialchars($details['price']); ?></td>
                        <td>
                            <form action="update-cart.php" method="POST">
                                <input type="number" name="quantity" value="<?php echo $details['quantity']; ?>" min="1" max="5">
                                <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                                <input type="submit" value="Update">
                            </form>
                        </td>
                        <td>Rs. <?php echo htmlspecialchars($subtotal); ?></td>
                        <td>
                            <form action="remove-cart.php" method="POST">
                                <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                                <input type="submit" value="Remove">
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <h2>Total Price: Rs. <?php echo htmlspecialchars($total_price); ?></h2>
            <form action="clear-cart.php" method="POST">
                <input type="submit" value="Clear Cart">
            </form>
            <form action="adress.php" method="POST">
                <input type="submit" value="Proceed to Checkout">
            </form>
        <?php endif; ?>
    </main>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> soulmate. All rights reserved.</p>
    </footer>
</body>
</html>

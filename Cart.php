<?php
session_start();

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "Your cart is empty.";
    exit();
}

echo "<h1>Your Shopping Cart</h1>";
echo "<table>";
echo "<tr><th>Product</th><th>Price</th><th>Quantity</th><th>Total</th></tr>";

$total_price = 0;
foreach ($_SESSION['cart'] as $product_id => $item) {
    $total = $item['price'] * $item['quantity'];
    $total_price += $total;
    echo "<tr>
            <td>{$item['name']}</td>
            <td>Rs. {$item['price']}</td>
            <td>{$item['quantity']}</td>
            <td>Rs. {$total}</td>
          </tr>";
}

echo "<tr><td colspan='3'>Total Price</td><td>Rs. $total_price</td></tr>";
echo "</table>";

// Optionally, add a checkout button
echo '<a href="checkout.php">Proceed to Checkout</a>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cart - E-commerce</title>
  <link rel="stylesheet" href="styles/AddToCart.css">
</head>
<body>
  <div class="cart-container">
    <h1>Your Shopping Cart</h1>
    <div id="cart-items">
      <div class="cart-item">
        <div class="item-details">
          <p>Product Name</p>
          <p>Price: <span class="price">Rs. 7000.00</span></p>
          <div class="quantity">
            <button class="decrease">-</button>
            <input type="number" class="quantity-input" value="1" min="1">
            <button class="increase">+</button>
          </div>
          <button class="remove-btn">Remove</button>
        </div>
      </div>
    </div>
    
    <div class="cart-summary">
      <h3>Summary</h3>
      <p>Subtotal: <span id="subtotal">Rs. 7000.00</span></p>
      <p>Shipping: <span id="shipping">Rs. 500.00</span></p>
      <p>Total: <span id="total">Rs. 7500.00</span></p>
      <button class="checkout-btn">Proceed to Checkout</button>
    </div>
  </div>

  <script src="AddToCart.js"></script>
</body>

</html>



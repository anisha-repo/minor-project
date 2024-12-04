<?php
// Include header and database connection
include("includes/header.php");
include("includes/db.php");

function getCartItems($user_id, $connection) {
    // Retrieve cart items for the user from the cart_items table
    $sql = "SELECT ci.id, ci.product_id, ci.quantity, p.model, p.original_price 
            FROM cart_item ci
            JOIN products p ON ci.product_id = p.product_id
            WHERE ci.user_id = ?";
    
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $user_id);  // Bind user_id parameter
    $stmt->execute();
    
    // Fetch all cart items
    $result = $stmt->get_result();
    $cartItems = [];
    
    while ($row = $result->fetch_assoc()) {
        $cartItems[] = $row;
    }
    
    return $cartItems;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['payment-method'])) {
    // Ensure user is logged in and retrieve user ID
  
    $user_id = $_SESSION['user_id'] ?? 1;  // Default to user ID 1 if not logged in
    
    // Get user address and phone number
    $userAddress = trim($_POST['user-address'] ?? '');
   
    $userPhoneNumber = trim($_POST['user-phone-number'] ?? '');
    
    
    if (empty($userAddress) || empty($userPhoneNumber)) {
        echo "Address and Phone Number are required.";
        var_dump($_POST); 
        echo "User Address: " . htmlspecialchars($userAddress) . "<br>";
        echo "User Phone Number: " . htmlspecialchars($userPhoneNumber) . "<br>";
        exit();
    }
    
    // Retrieve cart items
    $cartItems = getCartItems($user_id,$connection);
    
    if (empty($cartItems)) {
        echo "Your cart is empty.";
        exit();
    }

    // Calculate total amount
    $total_amount = 0;
    foreach ($cartItems as $item) {
        $total_amount += $item['quantity'] * $item['original_price'];
    }

    // Retrieve payment method
    $payment_method = $_POST['payment-method'];

    // Insert order into orders table
    $orderSql = "INSERT INTO orders (user_id, total_amount, order_date, user_address, user_phone_number) 
                 VALUES (?, ?, NOW(), ?, ?)";
    $stmt = $connection->prepare($orderSql);
    $stmt->bind_param("idss", $user_id, $total_amount, $userAddress, $userPhoneNumber);
    $stmt->execute();
    $orderId = $stmt->insert_id;


    // Insert payment details into the database
    $paymentSql = "INSERT INTO payments (user_id, order_id, payment_method, total_amount, payment_status, payment_date)
                   VALUES (?, ?, ?, ?, 'Pending', NOW())";
    $stmt = $connection->prepare($paymentSql);
    $stmt->bind_param("iiss", $user_id, $orderId, $payment_method, $total_amount);
    $stmt->execute();

    // Insert cart items into order_items table
    $orderItemsSql = "INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)";
    $stmt = $connection->prepare($orderItemsSql);
    
    foreach ($cartItems as $item) {
        $stmt->bind_param("iiid", $orderId, $item['product_id'], $item['quantity'], $item['original_price']);
        $stmt->execute();
    }

    // Clear the cart after placing the order
    $order_id = $stmt->insert_id;
$sql = "DELETE FROM cart_item WHERE user_id = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();

    // Redirect to thank you page
    header("Location: THANK YOU PAGE.php?order_id=$orderId");
    exit();
}

// Close connection
$connection->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Sneaker Store</title>
    <link rel="stylesheet" href="styles/checkout.css">
</head>
<body>

    <div class="checkout-container">
   
        <h2>Checkout</h2>
        <div class="user-info">
        <form id="checkoutForm" action="checkout.php" method="POST" onsubmit="return validateCheckoutForm()">
       
  
      <label for="user-address" class="user-info">Address</label>
      <input class="user-info" type="text" id="user-address" name="user-address" placeholder="Enter your address">
  
      <label class="user-info" for="user-phone-number">Phone Number</label>
      <input class="user-info" type="text" id="user-phone-number" name="user-phone-number" placeholder="Enter your phone number">
  
      

</div>

            <h3>Select Payment Method</h3>
  
            <div class="payment-option">
                <input type="radio" id="cod" name="payment-method" value="COD" checked>
                <label for="cod">Cash on Delivery (COD)</label>
            </div>

            <div class="payment-option">
                <input type="radio" id="card" name="payment-method" value="Card">
                <label for="card">Debit / Credit Card</label>
                <div id="card-details" class="payment-details hidden">
                    <label for="card-number">Card Number</label>
                    <input type="text" id="card-number" name="card-number" placeholder="XXXX-XXXX-XXXX-XXXX">

                    <label for="card-name">Name on Card</label>
                    <input type="text" id="card-name" name="card-name" placeholder="Cardholder's Name">

                    <label for="card-expiry">Expiry Date</label>
                    <input type="text" id="card-expiry" name="card-expiry" placeholder="MM/YY">

                    <label for="card-cvv">CVV</label>
                    <input type="text" id="card-cvv" name="card-cvv" placeholder="XXX">
                </div>
            </div>

            <div class="payment-option">
                <input type="radio" id="netbanking" name="payment-method" value="NetBanking">
                <label for="netbanking">Net Banking</label>
                <div id="netbanking-details" class="payment-details hidden">
                    <label for="bank-name">Select Bank</label>
                    <select id="bank-name" name="bank-name">
                        <option value="">Select Bank</option>
                        <option value="hdfc">HDFC Bank</option>
                        <option value="icici">ICICI Bank</option>
                        <option value="sbi">State Bank of India</option>
                        <option value="axis">Axis Bank</option>
                    </select>
                </div>
            </div>

            <div class="payment-option">
                <input type="radio" id="emi" name="payment-method" value="EMI">
                <label for="emi">EMI (Easy Installments)</label>
                <div id="emi-details" class="payment-details hidden">
                    <label for="emi-bank">Select Bank for EMI</label>
                    <select id="emi-bank" name="emi-bank">
                        <option value="">Select Bank</option>
                        <option value="hdfc">HDFC Bank</option>
                        <option value="icici">ICICI Bank</option>
                        <option value="sbi">State Bank of India</option>
                    </select>

                    <label for="emi-tenure">Select Tenure</label>
                    <select id="emi-tenure" name="emi-tenure">
                        <option value="">Select Tenure</option>
                        <option value="3">3 months</option>
                        <option value="6">6 months</option>
                        <option value="12">12 months</option>
                    </select>
                </div>
            </div>

            <button class="place-order"type="submit">Place Order</button>
        </form>
    </div>

    <script src="js/checkout.js"></script>
</body>
</html>

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
            <h3>Order #12345</h3>
            <p><strong>Date:</strong> October 1, 2024</p>
            <p><strong>Status:</strong> Shipped</p>
        </div>
        <div class="shipping-info">
            <h3>Shipping Information</h3>
            <p><strong>Address:</strong> SWAMI</p>
            <p><strong>Delivery Date:</strong> Expected on October 10, 2024</p>
        </div>

        <div class="items-purchased">
            <h3>Items Purchased</h3>
            <table class="items-table">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Black Sneakers</td>
                        <td>1</td>
                        <td>RS1100.00</td>
                        <td>RS1100.00</td>
                    </tr>
                    <tr>
                        <td>White Sneakers</td>
                        <td>1</td>
                        <td>RS1100.00</td>
                        <td>RS1100.00</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="order-total">
            <h3>Order Summary</h3>
            <p><strong>Subtotal:</strong> RS2200.00</p>
            <p><strong>Shipping:</strong> Free</p>
            <p><strong>Total:</strong> RS2200.00</p>
        </div>

        <div class="payment-info">
            <h3>Payment Information</h3>
            <p><strong>Payment Method:</strong> Credit Card (**** 1234)</p>
            <p><strong>Billing Address:</strong> SWAMI</p>
        </div>

        <div class="action-buttons">
            <button class="action-btn" onclick="reorder()">Reorder</button>
            <button class="action-btn" onclick="contactSupport()">Contact Support</button>
        </div>
    </div>

    <script src="js/order-details.js"></script>
</body>
</html>

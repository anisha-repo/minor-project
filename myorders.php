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
                    <th>Order #</th>
                    <th>Date</th>
                    <th>Items</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>#12345</td>
                    <td>Oct 1, 2024</td>
                    <td>2 Pairs of Sneakers</td>
                    <td>RS 900.00</td>
                    <td>Shipped</td>
                    <td>
                        <button class="action-btn" onclick="trackOrder('#12345')">Track</button>
                        <button class="action-btn" onclick="viewOrderDetails('#12345')">View Details</button>
                    </td>
                </tr>
                <tr>
                    <td>#12346</td>
                    <td>Sep 25, 2024</td>
                    <td>1 Pair of Sneakers</td>
                    <td>RS 110.00</td>
                    <td>Delivered</td>
                    <td>
                        <button class="action-btn" onclick="trackOrder('#12346')">Track</button>
                        <button class="action-btn" onclick="viewOrderDetails('#12346')">View Details</button>
                    </td>
                </tr>
            </tbody>
        </table>

        <div id="orderDetails" class="order-details"></div>
    </div>

    <script src="js/orders.js"></script>
</body>
</html>

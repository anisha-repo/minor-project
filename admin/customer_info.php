<?php
session_start();
include("../includes/db.php"); // Database connection

// Fetch user orders and information by joining the orders and users table
$query = "SELECT 
            u.user_id, 
            u.`first-name`, 
            u.`last-name`,
            u.email, 
            u.`phone-no`, 
            u.address, 
            o.order_id, 
            o.order_date, 
            o.total_amount 
          FROM 
            user u 
          JOIN 
            orders o ON  u.user_id = o.user_id 
          ORDER BY 
            o.order_date DESC"; // Optional: Order by order date

$result = $connection->query($query);

if (!$result) {
    die("Query Failed: " . $connection->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Orders - Admin Panel</title>
    <link rel="stylesheet" href="../admin/customer_info.css" />
</head>
<body>
    <div class="main-content">
        <h1>Sole Mate</h1>
        <header>
            <h1>Customer Orders Information</h1>
            <div class="admin-info">
                <input type="text" id="searchBar" placeholder="Search by Name" class="search-bar" />
            </div>
        </header>

        <div class="customer-table-container">
            <table class="customer-table">
                <thead>
                    <tr>
                        <th>first Name</th>
                        <th>last Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Order Number</th>
                        <th>Order Date</th>
                        <th>Total Amount</th>
                    </tr>
                </thead>
                <tbody id="customerTableBody">
                    <?php
                    // Loop through the result set and display each user order in the table
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td data-name="' . htmlspecialchars($row['first-name']) . '">' . htmlspecialchars($row['first-name']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['last-name']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['email']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['phone-no']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['address']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['order_id']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['order_date']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['total_amount']) . '</td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="customer_orders.js" defer></script>
</body>
</html>

<?php
$connection->close(); // Close the database connection
?>

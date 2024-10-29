<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
include("includes/db.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_product'])) {
    $product_id = intval($_POST['product_id']);
    $sql = "DELETE FROM products WHERE product_id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
}

$result = $connection->query("SELECT * FROM products");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Products</title>
</head>
<body>
    <h1>Manage Products</h1>
    <table border="1">
        <tr>
            <th>Product ID</th>
            <th>Brand</th>
            <th>Model</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['product_id']; ?></td>
            <td><?php echo $row['Brand_name']; ?></td>
            <td><?php echo $row['model']; ?></td>
            <td><?php echo $row['original_price']; ?></td>
            <td>
                <form method="POST" action="">
                    <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                    <button type="submit" name="delete_product">Delete</button>
                </form>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    <a href="dashboard.php">Back to Dashboard</a>
</body>
</html>

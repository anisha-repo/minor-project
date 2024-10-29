<?php

include("includes/header.php");
include("includes/db.php"); // Database connection

// Check for messages
$message = isset($_SESSION['message']) ? $_SESSION['message'] : '';
$error = isset($_SESSION['error']) ? $_SESSION['error'] : '';
unset($_SESSION['message'], $_SESSION['error']); // Clear messages after displaying them

// Initialize wishlist
$wishlist = isset($_SESSION['wishlist']) ? $_SESSION['wishlist'] : [];

// Fetch products from the database
$products = [];
if (!empty($wishlist)) {
    $ids = implode(',', array_map('intval', $wishlist)); // Sanitize IDs for SQL
    $sql = "SELECT 
            p.product_id, 
            p.Brand_name,
            p.model, 
            p.original_price, 
            (SELECT i.image_url 
             FROM productimages i 
             WHERE i.product_id = p.product_id 
             LIMIT 1) AS image_url
        FROM 
            products p
             WHERE product_id IN ($ids)";
    $result = $connection->query($sql);
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    }
}
$connection->close(); // Close the database connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Wishlist</title>
    <link rel="stylesheet" href="styles/WishList.css">
</head>
<body>

<div class="container">
    <h1>Your Wishlist</h1>
    
    <?php if ($message): ?>
        <div class="alert alert-success"><?php echo htmlspecialchars($message); ?></div>
    <?php endif; ?>
    
    <?php if ($error): ?>
        <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
    <?php endif; ?>
    
    <section class="products-container">

    <div class="product-gallery">
        <?php if (!empty($products)): ?>
            <?php foreach ($products as $product): ?>
                <?php 
                echo '<div class="product">';
                echo '<span>';
                  echo '<a href="detailpage.php?product_id=' . $product['product_id'] . '"><img src="' . htmlspecialchars($product['image_url']) . '" alt="' . htmlspecialchars($product['model']) . '"></a>'; 
                 echo '<h3>' . htmlspecialchars($product['Brand_name']) . '</h3>';
                echo '<p>' . htmlspecialchars($product['model']) . '</p>';
                echo '<p>Price: Rs. ' . htmlspecialchars($product['original_price']) . '</p>';
                echo'  <form action="remove_from_wishlist.php" method="POST">';
                echo ' <input type="hidden" name="product_id" value="'.$product['product_id'].'">';
                    echo' <button type="submit">Remove from Wishlist</button>';
                  echo '</form>';
                echo '</span>';
                echo '</div>';
                    
                    ?>
                    
            <?php endforeach; ?>
        <?php else: ?>
            <p>Your wishlist is empty.</p>
        <?php endif; ?>
    </ul>
</div>

</body>
</html>

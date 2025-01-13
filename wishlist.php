<?php

include("includes/header.php");
include("includes/db.php"); // Database connection

// Authentication check and login prompt
if (!isset($_SESSION['user_id'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Required</title>
    <link rel="stylesheet" href="styles/WishList.css"> <!-- Link to your CSS -->
    <style>
        body {
            font-family:  "Lato", sans-serif;
            padding: 0;
            margin: 0;
        }
        .login-prompt {
            text-align: center;
            background: white;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        .login-prompt h1 {
            color: #333;
            margin-bottom: 10px;
        }
        .login-prompt p {
            color: #555;
            margin-bottom: 20px;
        }
        .login-prompt a {
            text-decoration: none;
            color: white;
            background:rgb(6, 6, 6);
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
        }
        .login-prompt a:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class="login-prompt">
        <h1>Login Required</h1>
        <p>Please log in to view items in your wishlist.</p>
        <a href="login.php">Login</a>
    </div>
</body>
</html>
<?php
    exit(); // Stop further script execution
}

// If user is logged in, fetch the wishlist
$user_id = $_SESSION['user_id'];
$products = [];
$sql = "SELECT 
            p.product_id, 
            p.Brand_name,
            p.model, 
            p.original_price, 
            (SELECT i.image_url 
             FROM productimages i 
             WHERE i.product_id = p.product_id 
             LIMIT 1) AS image_url
        FROM products p
        JOIN user_wishlist uw ON uw.product_id = p.product_id
        WHERE uw.user_id = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}

$stmt->close(); // Close the prepared statement
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

    <section class="products-container">
        <div class="product-gallery">
            <?php if (!empty($products)): ?>
                <?php foreach ($products as $product): ?>
                    <div class="product">
                        <span>
                            <a href="detailpage.php?product_id=<?php echo $product['product_id']; ?>">
                                <img src="<?php echo htmlspecialchars($product['image_url']); ?>" alt="<?php echo htmlspecialchars($product['model']); ?>">
                            </a>
                            <h3><?php echo htmlspecialchars($product['Brand_name']); ?></h3>
                            <p><?php echo htmlspecialchars($product['model']); ?></p>
                            <p>Price: Rs. <?php echo htmlspecialchars($product['original_price']); ?></p>
                            <form action="remove_from_wishlist.php" method="POST">
                                <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                                <button type="submit">Remove from Wishlist</button>
                            </form>
                        </span>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <h4>Your wishlist is empty.</h4>
            <?php endif; ?>
        </div>
    </section>
</div>

</body>
</html>

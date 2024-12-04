<?php

include("../includes/db.php"); // Database connection



// Get the brand ID from the URL parameter
$brand_id = isset($_GET['brand_id']) ? $_GET['brand_id'] : '';

// Prepare the SQL statement
$sql = "SELECT 
            p.product_id, 
            p.Brand_name,
            p.model, 
            p.original_price, 
            (SELECT i.image_url 
             FROM productimages i 
             WHERE i.product_id = p.product_id 
             LIMIT 1) AS image_url,
            p.category_id,
            p.stock

         
        FROM 
            products p";

// Filter by brand ID if specified
if ($brand_id) {
    $sql .= " WHERE p.brand_id = ?"; // Filter by brand only
}

// Prepare the statement
$stmt = $connection->prepare($sql);
if ($brand_id) {
    $stmt->bind_param("s", $brand_id); // Bind the brand ID parameter
}
$stmt->execute();
$result = $stmt->get_result(); // Get the result set
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Info - Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../admin/product_info.css">
</head>
<body>
        <div class="product-info">
            <?php while ($row = $result->fetch_assoc()) { ?>
                <div class="product-card">
                    <a href="detailpage.php?product_id=<?php echo $row['product_id']; ?>">
                        <img src="<?php echo !empty($row['image_url']) ? '../'.htmlspecialchars($row['image_url']) : 'path/to/default-image.jpg'; ?>" alt="<?php echo htmlspecialchars($row['model']); ?>">
                    </a>
                    <h3><?php echo htmlspecialchars($row['Brand_name']); ?></h3>
                    <h2><?php echo htmlspecialchars($row['model']); ?></h2>
                    <p>Price: Rs. <?php echo htmlspecialchars($row['original_price']); ?></p>
                    <p class="Product_ID">ID: <?php echo htmlspecialchars($row['product_id']); ?></p>
                    <p class="category">Category: <?php echo htmlspecialchars($row['category_id']); ?></p>
                    <p class="price">Price: Rs. <?php echo htmlspecialchars($row['original_price']); ?></p>
                    <p class="stock-status">Stock: <span class="in-stock"><?php echo $row['stock'] > 0 ? 'In Stock' : 'Out of Stock'; ?></span></p>
                    <form action="" method="POST">
                        <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                        <button type="submit" name="delete_product" class="btn btn-danger">Delete Product</button>
                    </form>
                </div>
            <?php } ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="product_info.js" defer></script>
</body>
</html>
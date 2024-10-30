<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
include("../includes/db.php");

// Delete product if requested
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_product'])) {
    $product_id = intval($_POST['product_id']);
    $sql = "DELETE FROM products WHERE product_id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
}

// SQL to fetch products with their first image if available
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
$result = $connection->query($sql);
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
    <div class="main-content">
        <h1>Sole Mate</h1>
        <header>
            <h1>Product Information</h1>
            <div class="admin-info">
                
                <input type="text" id="searchOrder" placeholder="Search by Product ID">
              <a href="../admin/Product_adding_form.php">  <button class="add_product-btn">Add Product</button></a>
            </div>
        </header>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              Brands
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="admin/brandGallery.php?brand_id=101">Nike</a></li>
                <li><a class="dropdown-item" href="admin/brandGallery.php?brand_id=102">Puma</a></li>
                <li><a class="dropdown-item" href="admin/brandGallery.php?brand_id=104">Adidas</a></li>
                <li><a class="dropdown-item" href="admin/brandGallery.php?brand_id=103">Crocs</a></li>
                <li><a class="dropdown-item" href="admin/brandGallery.php?brand_id=106">New Balance</a></li>
                <li><a class="dropdown-item" href="admin/brandGallery.php?brand_id=107">Reebok</a></li>
                <li><a class="dropdown-item" href="admin/brandGallery.php?brand_id=105">Converse</a></li>
            
            </u>
        </div>

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

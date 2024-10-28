<?php
include("includes/header.php");
include("includes/db.php");

// Initialize filter variables with validation
$category_id = filter_input(INPUT_GET, 'category_id', FILTER_SANITIZE_STRING);
$type = filter_input(INPUT_GET, 'type', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY) ?? [];
$price = filter_input(INPUT_GET, 'original_price', FILTER_SANITIZE_STRING);

// Prepare the SQL query
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
        WHERE 1=1"; 

// Add filtering conditions
$params = [];
$types = '';

if ($category_id) {
    $sql .= " AND p.category_id = ?";
    $params[] = $category_id;
    $types .= 's'; // Assuming category_id is a string
}

if (!empty($type)) {
    $placeholders = implode(',', array_fill(0, count($type), '?'));
    $sql .= " AND p.type IN ($placeholders)";
    $params = array_merge($params, $type);
    $types .= str_repeat('s', count($type)); // Assuming types are strings
}

if ($price) {
    // Handle sorting based on price
    $sql .= ($price === 'high-to-low') ? " ORDER BY p.original_price DESC" : " ORDER BY p.original_price ASC";
}

// Prepare the statement
$stmt = $connection->prepare($sql);
if ($stmt === false) {
    die('SQL Error: ' . $connection->error);
}

// Bind parameters dynamically
if ($types) {
    $stmt->bind_param($types, ...$params);
}

// Execute the statement
$stmt->execute();
$result = $stmt->get_result();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Gallery</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="styles/gallery.css">
</head>
<body>

<section class="products-container">
    <?php include("includes/FILTER.html"); ?>
    <div class="product-gallery">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="product">';
                echo '<span>';
                echo '<div class="wishlist-icon">';
                echo '<button class="wish" data-product-id="' . htmlspecialchars($row['product_id']) . '">';
                echo ' <i class="fa-solid fa-heart fa-2xl wishlist" data-product-id="' . htmlspecialchars($row['product_id']) . '"></i>';
                echo '</button>';
                echo '</div>';
                echo '<a href="detailpage.php?product_id=' . htmlspecialchars($row['product_id']) . '"><img src="' . htmlspecialchars($row['image_url']) . '" alt="' . htmlspecialchars($row['model']) . '"></a>';
                echo '<h3>' . htmlspecialchars($row['Brand_name']) . '</h3>';
                echo '<p>' . htmlspecialchars($row['model']) . '</p>';
                echo '<p>Price: Rs. ' . htmlspecialchars($row['original_price']) . '</p>';
                echo '</span>';
                echo '</div>';
            }
        } else {
            echo "<p>No products found.</p>";
        }
        ?>
    </div>
</section>

<script src="js/brandGallery.js"></script>

</body>
</html>

<?php
$stmt->close();
$connection->close();
?>

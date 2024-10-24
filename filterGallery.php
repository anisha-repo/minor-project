<?php
include("includes/header.php");
include("includes/db.php"); // Database connection

// Initialize filter variables
$category_id = isset($_GET['category_id']) ? $_GET['category_id'] : '';
//$sizes = isset($_GET['size']) ? $_GET['size'] : [];
$price = isset($_GET['original_price']) ? $_GET['original_price'] : '';
$type = isset($_GET['type']) ? $_GET['type'] : [];

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
        WHERE 1=1"; // 1=1 allows easy appending of conditions

// Add filtering conditions
if ($category_id) {
    $sql .= " AND p.category_id = ?";
}

if (!empty($type)) {
    // Prepare a placeholder for the type IN clause
    $typePlaceholders = implode(',', array_fill(0, count($type), '?'));
    $sql .= " AND p.type IN ($typePlaceholders)";
}

if ($price) {
    // Depending on the value, modify the SQL query for price sorting
    if ($price === 'high-to-low') {
        $sql .= " ORDER BY p.original_price DESC";
    } else if ($price === 'low-to-high') {
        $sql .= " ORDER BY p.original_price ASC";
    }
}

// Prepare the statement
$stmt = $connection->prepare($sql);

// Bind parameters dynamically
$types = [];
$params = [];

// If category_id is set, bind it
if ($category_id) {
    $types[] = 's'; // Assuming category_id is a string
    $params[] = $category_id;
}

// Bind types
foreach ($type as $typeValue) {
    $types[] = 's'; // Assuming type is a string
    $params[] = $typeValue;
}

// Bind parameters to the statement
if ($types) {
    $stmt->bind_param(implode('', $types), ...$params);
}

// Execute the statement
$stmt->execute();
$result = $stmt->get_result(); // Get the result set
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Gallery</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styles/gallery.css">
</head>
<body>

<section class="products-container">
<?php 
    include("includes/FILTER.html"); 
    ?>
    <div class="product-gallery">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="product">';
                echo '<span>';
                echo '<div class="wishlist-icon">';
                echo '<button class="wish" data-product-id="' . $row['product_id'] . '">';
                echo ' <i class="fa-solid fa-heart fa-2xl wishlist" data-product-id="' . $row['product_id'] . '"></i>';
                echo '</button>';
                echo '</div>';
                echo '<a href="detailpage.php?product_id=' . $row['product_id'] . '"><img src="' . htmlspecialchars($row['image_url']) . '" alt="' . htmlspecialchars($row['model']) . '"></a>';
                echo '<h3>' . htmlspecialchars($row['Brand_name']) . '</h3>';
                echo '<p>' . htmlspecialchars($row['model']) . '</p>';
                echo '<p>Price: Rs. ' . htmlspecialchars($row['original_price']) . '</p>';
                echo '</span>';
                echo '</div>';
            }
        } else {
            echo "No products found.";
        }
        ?>
    </div>
</section>

<script src="js/brandGallery.js"></script>

</body>
</html>

<?php
$stmt->close(); // Close the statement
$connection->close(); // Close the connection
?>

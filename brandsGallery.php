<?php
include("includes/header.php");
include("includes/db.php"); // Database connection



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
             LIMIT 1) AS image_url
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
    <title>solemate</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styles/gallery.css">
</head>
<body>

<section class="products-container">
<?php 
    include("includes/FILTER.php"); 
    ?>
    <div class="product-gallery">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="product">';
                  echo '<span>';
                  echo  ' <form action="add_to_wishlist.php" method="POST">';
                  echo ' <input type="hidden" name="product_id" value="'.$row['product_id'].'">';
                   echo '<div class="wishlist-icon">';
                       echo '<button type="submit" class="wish" data-product-id="' . $row['product_id'] . '">'; // Use data attribute for product ID
                       echo ' <i class="fa-solid fa-heart fa-2xl wishlist" data-product-id="' . $row['product_id'] . '"></i>'; // Same here
                       echo '</button>';
                    echo '</div>';
                      echo '</form>' ;
                echo '<a href="detailpage.php?product_id=' . $row['product_id'] . '"><img src="' . htmlspecialchars($row['image_url']) . '" alt="' . htmlspecialchars($row['model']) . '"></a>';
                echo '<h3>' . htmlspecialchars($row['Brand_name']) . '</h3>';
                echo '<p>' . htmlspecialchars($row['model']) . '</p>';
                echo '<p>Price: Rs. ' . htmlspecialchars($row['original_price']) . '</p>';
               echo '<div id="message" class="message" style="color:red; text-align:center;">';
              
                    if (isset($_SESSION['message'])) {
                        echo $_SESSION['message'];
                        unset($_SESSION['message']); // Clear the message after displaying
                    }
                    
               echo' </div>'; 
                echo '</span>';
                echo '</div>';
            }
        } else {
            echo "No products found.";
        }
        ?>
    </div>
    </section>
    <?php
    include("includes/footer.php");
    ?>
<script src ="brandsGallery.php"></script>

</body>
</html>

<?php
$stmt->close(); // Close the statement
$connection->close(); // Close the connection
?>

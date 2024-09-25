<?php
include("includes/header.html");
include("includes/db.php");

 $sql = $sql = "SELECT 
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
        WHERE 
            p.brand_id = 104";

  $result = $connection->query($sql);
?>

<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>solemate</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styles/gallery.css">
</head>
<body>

    <section class="products-container">
           <div class="product-gallery">
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="product">';
                            echo '<span>';
                        
                            echo  '<a href="detailpage.php?product_id=' . $row['product_id'] . '"><img src="' . htmlspecialchars($row['image_url']) .'" alt="' . htmlspecialchars($row['model']) . '"></a>';
                            echo '<h3>' . htmlspecialchars($row['Brand_name']) . '</h3>';
                            echo '<p>' . htmlspecialchars($row['model']) . '</p>';
                            echo '<p>Price: $' . htmlspecialchars($row['original_price']) . '</p>';
                            echo '</span>';
                            echo '</div>';
                        }
                    } else {
                        echo "No products found.";
                    }
                    ?>
            
                                                         
        </div>
    </section>
    
    
    <script src="adidaslayout.js"></script>

    <?php
 include("includes/footer.html");
?>
</body>
</html>
<?php
$connection->close();
?>
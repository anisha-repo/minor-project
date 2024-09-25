<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "solemate";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = $sql = "SELECT 
            p.product_id, 
            p.model, 
            p.original_price, 
            (SELECT i.image_url 
             FROM productimages i 
             WHERE i.product_id = p.product_id 
             LIMIT 1) AS image_url
        FROM 
            products p
        WHERE 
            p.brand_id = 106";

  $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce Product Gallery</title>
    <style>
        .product-gallery {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }
        .product {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin: 10px;
            text-align: center;
            width: 220px;
        }
        .product img {
            max-width: 100%;
            border-radius: 5px;
        }
        button {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <h1>Product Gallery</h1>
    <div class="product-gallery">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="product">';
                echo '<img src="' . htmlspecialchars($row['image_url']) . '" alt="' . htmlspecialchars($row['model']) . '">';
                echo '<h3>' . htmlspecialchars($row['model']) . '</h3>';
                echo '<p>Price: $' . htmlspecialchars($row['original_price']) . '</p>';

                echo '</div>';
            }
        } else {
            echo "No products found.";
        }
        ?>
    </div>
</body>
</html>

<?php
$conn->close();
?>

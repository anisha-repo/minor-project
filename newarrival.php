<?php
include("includes/header.php");
include("includes/db.php");

// Fetch new arrivals from the database with the first image for each product
$sql = "SELECT p.product_id, p.model, p.original_price, pi.image_url 
        FROM products p 
        LEFT JOIN productimages pi ON p.product_id = pi.product_id 
        WHERE p.is_new = 1 
        GROUP BY p.product_id 
        ORDER BY p.arrival_date DESC";  // Optional: Order by the arrival date
$result = mysqli_query($connection, $sql);

// Check if there are results
if (mysqli_num_rows($result) > 0) {
    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $products = [];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sole Mate - New Arrivals</title>
    <link rel="stylesheet" href="styles/newarrival.css">
</head>
<body>
    
        <!-- Header Section -->
        <hr>
        <header class="new-arrival-header">
          
            <h1>Sole Mate</h1>
            <p>Your perfect shoe destination</p>
        </header>
    
        <!-- New Arrivals Section -->
        <section class="new-arrivals">
            <h2>New Arrivals</h2>
            <div class="shoe-container">
                <?php
                if (!empty($products)) {
                    // Loop through the products and display each one
                    foreach ($products as $product) {
                        echo '
                        <div class="shoe-card" data-bs-toggle="modal" data-bs-target="#imageModal" data-main-image="' . $product['image_url'] . '" data-other-images="shoe2.jpg,shoe3.jpg,shoe4.jpg">
                            <img src="' . $product['image_url'] . '" alt="' . $product['model'] . '">
                            <h3>' . $product['model'] . '</h3>
                            
                        </div>';
                    }
                } else {
                    echo "<p>No new arrivals at the moment. Please check back later!</p>";
                }
                ?>
            </div>
        </section>
    
        <!-- Coming Soon Section -->
        <section class="coming-soon">
            <h2>Coming Soon</h2>
            <p>Stay tuned for more amazing shoes!</p>
        </section>
        
        <?php include("includes/footer.php"); ?>
        
    </div>

    <script src="js/newarrival.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"></script>
    <script>
        // Function to change the main image when a thumbnail is clicked
        function changeMainImage(img) {
            document.getElementById('mainImage').src = img.src;
        }

        // When an image is clicked, update the modal with the images
        document.querySelectorAll('.shoe-card').forEach(function (card) {
            card.addEventListener('click', function (event) {
                const mainImage = card.getAttribute('data-main-image');
                const otherImages = card.getAttribute('data-other-images').split(',');

                // Set the main image in the modal
                document.getElementById('mainImage').src = mainImage;

                // Set the other images in the modal thumbnails
                const thumbImages = document.querySelectorAll('.thumb-img');
                thumbImages.forEach(function (thumbImg, index) {
                    thumbImg.src = otherImages[index];
                });
            });
        });
    </script>
</body>
</html>

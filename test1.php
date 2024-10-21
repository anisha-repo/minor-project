<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Gallery</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="stylesheet" href="styles/gallery2.css">
</head>
<body>

<section class="products-container">
    <div class="product-gallery" id="product-list">
        <!-- PHP code to fetch products goes here -->
        <!-- Example of product item structure -->
        <div class="product-item" data-id="1">
            <img src="images/sneaker1.jpg" alt="Sneaker 1">
            <h3>Sneaker 1</h3>
            <p>$100</p>
            <div class="wishlist-icon">
                <button class="wish" data-product-id="1">
                    <i class="fa-solid fa-heart wishlist"></i>
                </button>
            </div>
        </div>
        <!-- Repeat for more products -->
    </div>
</section>

<script src="adidaslayout2.js"></script>

</body>
</html>

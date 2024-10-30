<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You - Celebration</title>
    <link rel="stylesheet" href="styles/thankyou_celebration.css">
</head>
<body>
    <div class="thankyou-container">
        <h1>Thank You for Your Order!</h1>
        <p>Your order has been successfully placed and is being processed.</p>
        <p>We appreciate your purchase and will notify you once your items are shipped.</p>

       

        <a href="index.php" class="btn">Continue Shopping</a>
    </div>
    <div id="celebration-popup" class="celebration-popup hidden">
        <div class="popup-content">
            <h2>Congratulations!</h2>
            <p>Your order was successful! Enjoy a 10% discount on your next purchase with code <strong>CELEBRATE10</strong></p>
            <a href="index.php" class="btn popup-btn">Shop Now</a>
        </div>
    </div>

    <div class="confetti" id="confetti-container"></div>

    <script src="js/thankyou_celebration.js"></script>
</body>
</html>

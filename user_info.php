
<?php
include("includes/header.php");
include("includes/db.php"); // Database connection
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SOLEMATE</title>
    <link rel="stylesheet" href="styles/user_info.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="list-box">
        <ul class="list">
        <li><a href="customer-profile.php">CUSTOMER PROFILE</a></li>
        <li><a href="myorders.php">MY ORDERS</a></li>
        <li><a href="refund.php">REFUND POLICY</a></li>
        <li><a href="privacy.php">PRIVACY POLICY</a></li>
        <li><a href="support.php">SUPPORT</a></li>
        <li><a href="faq.php">FAQ</a></li>
        <li><a href="helpline.php">HELPLINE</a></li>
        <li><a href="our blog/index.html">OUR BLOG</a></li>
        <li><a href="feedback.php">FEEDBACK</a></li>
        <li><a href="logout.php">LOGOUT</a></li>
</ul>
    </div>
    <?php
    include("includes/footer.php");
    ?>
</body>
</html>
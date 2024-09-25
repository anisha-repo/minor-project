<?php
include("includes/header.html");
include("includes/db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONFIRMATION</title>
    <link rel="stylesheet" href="styles/login.css">
</head>
<body>
    <div class="container">
        <form id="loginForm" onsubmit="return validateForm()">
            <h2>Join the Sneaker Crew</h2>

            <label for="fname">First Name</label>
            <input type="text" id="fname" name="fname" placeholder="First Name" required>

            <label for="lname">Last Name</label>
            <input type="text" id="lname" name="lname" placeholder="Last Name" required>

            <label for="phone">Phone Number</label>
            <input type="tel" id="phone" name="phone" placeholder="Phone Number" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Email" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Password" required>

            <label for="address">Address</label>
            <textarea id="address" name="address" placeholder="Your Address" required></textarea>

            <button type="submit">Get Your Kicks</button>
        </form>
    </div>

    <script src="script.js"></script>
</body>
</html>

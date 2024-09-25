<?php
include("includes/header.html");
include("includes/db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>solemate</title>
    <link rel="stylesheet" href="styles/login.css">
</head>
<body>
    <div class="container">
        <form id="loginForm" onsubmit="return validateForm()">
            <h2>Join the Sneaker Crew</h2>

            <label for="fname" class="login">First Name</label>
            <input type="text" id="fname" class ="logininfo" name="fname" placeholder="First Name" required>

            <label for="lname" class="login">Last Name</label>
            <input type="text" id="lname" class ="logininfo" name="lname" placeholder="Last Name" required>

            <label for="phone" class="login">Phone Number</label>
            <input type="tel" id="phone" class ="logininfo" name="phone" placeholder="Phone Number" required>

            <label for="email" class="login">Email</label>
            <input type="email" id="email" class ="logininfo" name="email" placeholder="Email" required>

            <label for="password" class="login">Password</label>
            <input type="password" id="password" class ="logininfo" name="password" placeholder="Password" required>

            <label for="address" class="login">Address</label>
            <textarea id="address" class ="logininfo" name="address" placeholder="Your Address" required></textarea>

            <button class="login-btn" type="submit">Get Your Kicks</button>
        </form>
    </div>

    <script src="script.js"></script>
</body>
</html>

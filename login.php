<?php
include("includes/header.html");
include("includes/db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login/signup</title>
    <link rel="stylesheet" href="styles/login.css">
</head>
<body>
    <div class="container">
        <div class="tab-container">
            <button class="tab-link active" onclick="openTab('signin')">Sign In</button>
            <button class="tab-link" onclick="openTab('signup')">Sign Up</button>
        </div>
        <div id="signin" class="tab-content">
            <form id="signinForm" onsubmit="return validateSignInForm()">
                <h2>Sign In to Your Account</h2>

                <label for="email-signin">Email</label>
                <input type="email" id="email-signin" name="email-signin" placeholder="Email" required>

                <label for="password-signin">Password</label>
                <input type="password" id="password-signin" name="password-signin" placeholder="Password" required>

                <button type="submit">Sign In</button>
            </form>
        </div>
        <div id="signup" class="tab-content" style="display: none;">
            <form id="signupForm" onsubmit="return validateSignUpForm()">
                <h2>Join The Sneaker Crew</h2>

                <label for="fname">First Name</label>
                <input class="in-data" type="text" id="fname" name="fname" placeholder="First Name" required>

                <label for="lname">Last Name</label>
                <input  class="in-data" type="text" id="lname" name="lname" placeholder="Last Name" required>

                <label for="phone">Phone Number</label>
                <input class="in-data" type="tel" id="phone" name="phone" placeholder="Phone Number" required>

                <label for="email-signup">Email</label>
                <input class="in-data" type="email" id="email-signup" name="email-signup" placeholder="Email" required>

                <label for="password-signup">Password</label>
                <input class="in-data" type="password" id="password-signup" name="password-signup" placeholder="Password" required>

                <label for="address">Address</label>
                <textarea class="in-data" id="address" name="address" placeholder="Your Address" required></textarea>

                <button class="kicks" type="submit">GET YOUR KICKS</button>
            </form>
        </div>
    </div>

    <script src="js/login.js"></script>
</body>
</html>

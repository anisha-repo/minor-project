<?php

include("includes/header.php");
include("includes/db.php");

// After validating user credentials


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
            <button class="tab-link active" onclick="openTab('signin', this)">Sign In</button>
            <button class="tab-link" onclick="openTab('signup', this)">Sign Up</button>
        </div>
        <div id="signin" class="tab-content">
            <form id="signinForm" action="sign-in.php" method="POST" onsubmit="return validateSignInForm()">
                <div id="signin-error" class="error-message" style="color:red; text-align:center;">
                <?php
                    if (isset($_SESSION['error_message'])) {
                        echo $_SESSION['error_message'];
                        unset($_SESSION['error_message']); // Clear the message after displaying
                    }
                    ?>
                </div> <!-- Error display -->   
                <h2>Sign In to Your Account</h2>

                <label for="email-signin">Email</label>
                <input class="input-field" type="email" id="email-signin" name="email-signin" placeholder="Email" required>

                <label for="password-signin">Password</label>
                <input class="input-field" type="password" id="password-signin" name="password-signin" placeholder="Password" required>
                
                
                <button type="submit" class="submit-btn">Login</button>
                
            </form>
        </div>
        <div id="signup" class="tab-content" >
            <form id="signupForm" action="sign-up.php" method="POST" onsubmit="return validateSignUpForm()">
                <h2>Join The Sneaker Crew</h2>

                <label for="fname">First Name</label>
                <input class="in-data input-field" type="text" id="fname" name="fname" placeholder="First Name" required>

                <label for="lname">Last Name</label>
                <input  class="in-data input-field" type="text" id="lname" name="lname" placeholder="Last Name" required>

                <label for="phone">Phone Number</label>
                <input class="in-data input-field" type="tel" id="phone" name="phone" placeholder="Phone Number" required>

                <label for="email-signup">Email</label>
                <input class="in-data input-field" type="email" id="email-signup" name="email-signup" placeholder="Email" required>

                <label for="password-signup">Password</label>
                <input class="in-data input-field" type="password" id="password-signup" name="password-signup" placeholder="Password" required>

                <label for="address">Address</label>
                <textarea class="in-data" id="address" name="address" placeholder="Your Address" required></textarea>

                <button type="submit" class="submit-btn">GET YOUR KICKS</button>
            </form>
        </div>
    </div>
   
    <?php
    include("includes/footer.php");
    ?>
    <script src="js/login.js"></script>
</body>
</html>

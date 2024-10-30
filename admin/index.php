<?php
session_start();
include("../includes/db.php");

// After validating user credentials


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login/signup</title>
    <link rel="stylesheet" href="../admin/login.css">
</head>
<body>
   
        
            <form id="signinForm" action="login2.php" method="POST" onsubmit="return validateSignInForm()">
                <div id="signin-error" class="error-message" style="color:red; text-align:center;">
                <?php
                    if (isset($_SESSION['error_message'])) {
                        echo $_SESSION['error_message'];
                        unset($_SESSION['error_message']); // Clear the message after displaying
                    }
                    ?>
                </div> <!-- Error display -->   
                <h2>Sign In to Your Account</h2>

                <label for="user-signin">Name</label>
                <input class="input-field" type="name" id="name-signin" name="name-signin" placeholder="Name" required>

                <label for="password-signin">Password</label>
                <input class="input-field" type="password" id="password-signin" name="password-signin" placeholder="Password" required>
                
                
                <button type="submit" class="submit-btn">Login</button>
                
            </form>
       
        
  
   

    <script src="login.js"></script>
</body>
</html>

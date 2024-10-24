<?php

include("includes/db.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phone = $_POST['phone'];
    $email = $_POST['email-signup'];
    $password = password_hash($_POST['password-signup'], PASSWORD_DEFAULT);
    $address = $_POST['address'];

    // Check if the email already exists
    $stmt = $connection->prepare("SELECT `user-id` FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "An account with this email already exists.";
    } else {
        // Email is unique, proceed with insertion
        $stmt = $connection->prepare("INSERT INTO `user`( `first-name`, `last-name`, `phone-no`, `email`, `password`,`address`)  VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $fname, $lname, $phone, $email, $password, $address);

        
        if ($stmt->execute()) {
            // Redirect to a new page after successful sign-up
            header("Location: index.php"); // Change to your desired page
            exit(); // Make sure to call exit after the redirect
        } else {
            echo "Error: " . $stmt->error;
        }
    }

    $stmt->close();
}
$connection->close();
?>
<div id="signup" class="tab-content" style="display: none;">
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
   

    <script src="js/login.js"></script>
</body>
</html>




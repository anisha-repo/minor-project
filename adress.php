<!-- address_form.php -->
<?php
include("includes/header.php");
include("includes/db.php"); 

 $user_address = isset($_POST['user-address']) ? $_POST['user-address'] : null; 
 $user_phone_number = isset($_POST['user-phone-number']) ? $_POST['user-phone-number'] : null;


 $sql = "INSERT INTO orders ( user_address, user_phone_number)
            VALUES ( ?, ?)";
    $stmt = $connection->prepare($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <style>
        .user-info {
    margin-bottom: 20px; /* Space below the user info section */
}

.user-info label {
    display: block; /* Block display for labels */
    margin-bottom: 5px; /* Space below labels */
    font-weight: bold;
    margin-left:250px; /* Make labels bold */
}

.user-info input[type="text"] {
    width: 60%; /* Full width input fields */
    padding: 10px;
    margin-left:250px; /* Padding inside the input fields */
    margin-bottom: 15px; /* Space below input fields */
    border: 1px solid #ccc; /* Light border for input fields */
    border-radius: 4px; /* Rounded corners for input fields */
    font-size: 16px; /* Font size for input fields */
}
.next-button {
    background-color: gray; /* Blue background */
    color: white; /* White text color */
    padding: 10px 15px; /* Padding around the button */
    border: none; /* No border */
    border-radius: 4px; /* Rounded corners */
    cursor: pointer; /* Pointer cursor on hover */
    font-size: 16px; /* Font size for button */
    margin-top: 15px; /* Space above the button */
    width: 60%;
    margin-left:250px; /* Full width button */
}

.next-button:hover {
    background-color: black;
    color:gray; /* Darker blue on hover */
}
h3{
    text-align: center;
}

    </style>
</head>
<body>
<div class="user-info">
    <h3 >Enter Shipping Information</h3>
    <label for="user-address">Address</label>
    <input type="text" id="user-address" name="user-address" placeholder="Enter your address" required>

    <label for="user-phone-number">Phone Number</label>
    <input type="text" id="user-phone-number" name="user-phone-number" placeholder="Enter your phone number" required>
    
   <a href="checkout.php"> <button type="button" class="next-button">Next</button></a>
</div>


<script>
    function validateAddressForm() {
        // Get the values from the input fields
        const address = document.getElementById('user-address').value;
        const phoneNumber = document.getElementById('user-phone-number').value;

        // Regular expression for validating phone number (adjust as needed)
        const phonePattern = /^[0-9]{10}$/;

        // Validate address and phone number
        if (!address) {
            console.log('Please enter your address.');
            return false; // Prevent form submission
        }

        if (!phoneNumber.match(phonePattern)) {
            console.log('Please enter a valid phone number (10 digits).');
            return false; // Prevent form submission
        }

        
       
        
    }
    // Attach the validateAddressForm function to the Next button
    document.addEventListener("DOMContentLoaded", function() {
        const nextButton = document.querySelector('.next-button');
        if (nextButton) {
            nextButton.addEventListener('click', validateAddressForm);
        }
    });
</script>

</body>
</html>

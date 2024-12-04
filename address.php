<!-- address_form.php -->
<?php
include("includes/header.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <style>
        .user-info {
    margin-bottom: 40px; /* Space below the user info section */
}

.user-info label {
    display: block; /* Block display for labels */
    margin-top: 15px;
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
  
<form action="checkout.php" method="POST" onsubmit="return validateCheckoutForm()">
    <label for="user-address" class="user-info">Address</label>
    <input class="user-info" type="text" id="user-address" name="user-address" placeholder="Enter your address">

    <label class="user-info" for="user-phone-number">Phone Number</label>
    <input class="user-info" type="text" id="user-phone-number" name="user-phone-number" placeholder="Enter your phone number">

    <button type="submit" class="next-button">Place Order</button>
</form>

</div>


<script>
    function validateCheckoutForm() {
        // Get form field values
        var address = document.getElementById('user-address').value;
        var phoneNumber = document.getElementById('user-phone-number').value;

        // Check if address and phone number are filled out
        if (address === "" || phoneNumber === "") {
            alert("Address and Phone Number are required.");
            return false; // Prevent form submission
        }

        // Optionally, check for phone number format
        var phoneRegex = /^[0-9]{10}$/; // Simple check for 10-digit phone number
        if (!phoneRegex.test(phoneNumber)) {
            alert("Please enter a valid 10-digit phone number.");
            return false; // Prevent form submission
        }

        // If everything is valid, allow the form to submit
        return true;
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

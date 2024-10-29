<?php
include("includes/header.php");
include("includes/db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Profile</title>
    <link rel="stylesheet" href="styles/profile.css">
</head>
<body>
    <div class="container">
        <h2> Profile</h2>

        <form id="profileForm" class="profile-form">
            <div class="form-group">
                <label for="firstName">First Name</label>
                <input type="text" id="firstName" name="firstName" value="XYZ" required>
            </div>

            <div class="form-group">
                <label for="lastName">Last Name</label>
                <input type="text" id="lastName" name="lastName" value="ZYX" required>
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" id="address" name="address" value="123 SWAMI SOUTH" required>
            </div>

            <div class="form-group">
                <label for="gender">Gender</label>
                <select id="gender" name="gender" required>
                    <option value="male" selected>Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone" value="+123" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="XXXXXXXXXX" required>
            </div>

            <div class="form-group">
                <button type="submit" class="action-btn">Save Changes</button>
            </div>
        </form>

        <div id="successMessage" class="success-message" style="display: none;">
            Profile updated successfully!
        </div>
    </div>

    <script src="js/profile.js"></script>
</body>
</html>

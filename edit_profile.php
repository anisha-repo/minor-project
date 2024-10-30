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
    <h2>Profile</h2>

    <?php if (isset($_GET['success'])): ?>
        <div id="successMessage" class="success-message">
            Profile updated successfully!
        </div>
    <?php endif; ?>

    <form action="update_profile.php" method="POST" id="profileForm" class="profile-form">
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
            <label for="phone">Phone Number</label>
            <input type="tel" id="phone" name="phone" value="+123" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="XXXXXXXXXX" required>
        </div>

        <div class="form-group">
            <label for="password">password</label>
            <input type="password" id="password" name="password" value="XXXXXXXXXX" required>
        </div>

        <div class="form-group">
            <button type="submit" class="action-btn">Save Changes</button>
        </div>
    </form>
</div>

</body>
</html>

<?php
include("includes/header.php");
include("includes/db.php");



// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Get the user ID from session
$user_id = $_SESSION['user_id'];

// Fetch user profile data from the database
$sql = "SELECT `user_id`, `first-name`, `last-name`, `phone-no`, `email`, `address`, `password`, `created-at`, `modified-at`  FROM `user` WHERE user_id = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link rel="stylesheet" href="styles/profile.css">
</head>
<body>
    <div class="container">
        <h2>My Profile</h2>

        <?php if ($user): ?>
            <div class="profile-info">
                <p><strong>First Name:</strong> <?php echo htmlspecialchars($user['first-name']); ?></p>
                <p><strong>Last Name:</strong> <?php echo htmlspecialchars($user['last-name']); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
                <p><strong>Phone:</strong> <?php echo htmlspecialchars($user['phone-no']); ?></p>
                <p><strong>Address:</strong> <?php echo htmlspecialchars($user['address']); ?></p>
                <p><strong>Member Since:</strong> <?php echo date("M d, Y", strtotime($user['created-at'])); ?></p>
            </div>
            <button class="action-btn" onclick="window.location.href='edit_profile.php'">Edit Profile</button>
        <?php else: ?>
            <p>User information could not be found.</p>
        <?php endif; ?>
    </div>
</body>
</html>



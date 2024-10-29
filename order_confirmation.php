<?php
session_start();
$orderPlaced = false;

// Check if order was placed successfully
if (isset($_SESSION['order_success']) && $_SESSION['order_success']) {
    $orderPlaced = true;
    unset($_SESSION['order_success']); // Unset session variable after use
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <link rel="stylesheet" href="styles/confirmation.css">
    <style>
        /* Basic styling for the modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 300px;
            top: 100px;
            width: 50%;
            height: 50%;
            background-color: rgba(0, 0, 0, 0.5);
            align-items: center;
            justify-content: center;
        }

        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            text-align: center;
            max-width: 500px;
            margin: auto;
        }

        .close-button {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 1.5em;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="confirmation-container">
        <?php if ($orderPlaced): ?>
            <!-- Modal HTML Structure -->
            <div id="orderModal" class="modal">
                <div class="modal-content">
                    <span class="close-button" onclick="closeModal()">&times;</span>
                    <h2>Order Confirmation</h2>
                    <p>Your order has been placed successfully!</p>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <script>
    // Open modal if the order was placed
    window.onload = function() {
        <?php if ($orderPlaced): ?>
            document.getElementById('orderModal').style.display = 'block';
        <?php endif; ?>
    };

    // Close modal function with redirection to homepage
    function closeModal() {
        document.getElementById('orderModal').style.display = 'none';
        window.location.href = 'index.php'; // Redirects to homepage, adjust 'index.php' if homepage path is different
    }
</script>

    
</body>
</html>

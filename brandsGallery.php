<?php
include("includes/header.php");
include("includes/db.php"); // Database connection

// Check if the user is authenticated
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

// Get the brand ID from the URL parameter
$brand_id = isset($_GET['brand_id']) ? $_GET['brand_id'] : '';

// Get other filter parameters
$category_id = filter_input(INPUT_GET, 'gender', FILTER_SANITIZE_STRING);
$size = filter_input(INPUT_GET, 'size', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY) ?? [];
$price = filter_input(INPUT_GET, 'price', FILTER_SANITIZE_STRING);
$type = filter_input(INPUT_GET, 'occasion', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY) ?? [];

// Start the SQL query
$sql = "SELECT 
            p.product_id, 
            p.Brand_name, 
            p.model, 
            p.original_price, 
            (SELECT i.image_url 
             FROM productimages i 
             WHERE i.product_id = p.product_id 
             LIMIT 1) AS image_url 
        FROM products p 
        WHERE 1=1"; // Start with a condition that is always true

$params = [];
$types = '';

// Apply gender filter
if ($category_id) {
    $sql .= " AND p.category_id = ?";
    $params[] = $category_id;
    $types .= 's'; // Assuming category_id is a string
}

// Apply size filter
if (!empty($size)) {
    $placeholders = implode(',', array_fill(0, count($size), '?'));
    $sql .= " AND p.size IN ($placeholders)";
    $params = array_merge($params, $size);
    $types .= str_repeat('s', count($size)); // Assuming size values are strings
}

// Apply occasion filter
if (!empty($type)) {
    $placeholders = implode(',', array_fill(0, count($type), '?'));
    $sql .= " AND p.type IN ($placeholders)";
    $params = array_merge($params, $type);
    $types .= str_repeat('s', count($type)); // Assuming type values are strings
}

// Apply brand filter if brand_id is set
if ($brand_id) {
    $sql .= " AND p.brand_id = ?";
    $params[] = $brand_id;
    $types .= 's'; // Assuming brand_id is a string (or integer)
}

// Apply price sorting if price filter is set
if ($price) {
    if ($price === 'high-to-low') {
        $sql .= " ORDER BY p.original_price DESC";
    } else {
        $sql .= " ORDER BY p.original_price ASC";
    }
}

// Prepare the statement
$stmt = $connection->prepare($sql);
if ($stmt === false) {
    die('SQL Error: ' . $connection->error);
}

// Bind the parameters dynamically
if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
}

$stmt->execute();
$result = $stmt->get_result(); // Get the result set

// Fetch wishlist for authenticated users (if any)
$wishlist = [];
if ($user_id) {
    $wishlist_sql = "SELECT product_id FROM user_wishlist WHERE user_id = ?";
    $wishlist_stmt = $connection->prepare($wishlist_sql);
    $wishlist_stmt->bind_param("i", $user_id);
    $wishlist_stmt->execute();
    $wishlist_result = $wishlist_stmt->get_result();

    // Store product IDs in an array for easy checking
    while ($row = $wishlist_result->fetch_assoc()) {
        $wishlist[] = $row['product_id'];
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>solemate</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="stylesheet" href="styles/gallery.css">
    <style>
    .wishlist {
        cursor: pointer;
        color: #ccc; /* Default color for empty heart */
    }
    .wishlist.added {
        color: red; /* Color when added */
    }
    .wishlist:hover {
        color: #f44336; /* Hover color */
    }
    </style>
</head>
<body>

<section class="products-container">
    <?php include("includes/FILTER.php"); ?>
    <div class="product-gallery">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Check if this product is in the wishlist
                $is_in_wishlist = in_array($row['product_id'], $wishlist);
                
                // Set heart class based on whether the product is in the wishlist
                $heart_class = $is_in_wishlist ? 'fa-solid fa-heart fa-2xl wishlist added' : 'fa-regular fa-heart fa-2xl wishlist';
                
                echo '<div class="product">';
                echo '<span>';
                echo  ' <form action="add_to_wishlist.php" method="POST" class="wishlist-form" id="form-' . $row['product_id'] . '">';
                echo ' <input type="hidden" name="product_id" value="'.$row['product_id'].'">';
                echo '<div class="wishlist-icon">';
                echo '<button type="button" class="wish" data-product-id="' . $row['product_id'] . '">';
                echo ' <i class="' . $heart_class . '" data-product-id="' . $row['product_id'] . '"></i>';
                echo '</button>';
                echo '</div>';
                echo '</form>';
                echo '<a href="detailpage.php?product_id=' . $row['product_id'] . '"><img src="' . htmlspecialchars($row['image_url']) . '" alt="' . htmlspecialchars($row['model']) . '"></a>';
                echo '<h3>' . htmlspecialchars($row['Brand_name']) . '</h3>';
                echo '<p>' . htmlspecialchars($row['model']) . '</p>';
                echo '<p>Price: Rs. ' . htmlspecialchars($row['original_price']) . '</p>';
                echo '</span>';
                echo '</div>';
            }
        } else {
            echo "No products found.";
        }
        ?>
    </div>
</section>

<?php include("includes/footer.php"); ?>

<script src="js/brandGallery.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const wishButtons = document.querySelectorAll('.wish');

    wishButtons.forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault(); // Prevent default form submission

            const productId = button.getAttribute('data-product-id'); // Get product ID
            const formId = 'form-' + productId; // Form ID dynamically
            const form = document.getElementById(formId); // Get the form by ID

            // Check if the user is authenticated
            const isAuthenticated = <?php echo json_encode(isset($_SESSION['user_id'])); ?>;
            if (!isAuthenticated) {
                window.location.href = 'login.php';
                return;
            }

            // Store the scroll position
            sessionStorage.setItem('scrollPosition', window.scrollY);

            // Send AJAX request to add to wishlist
            fetch('add_to_wishlist.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams(new FormData(form)),
            })
                .then(response => response.json()) // Parse JSON response
                .then(data => {
                    const feedbackElement = document.getElementById('wishlist-feedback');

                    // Show feedback message in the UI
                    feedbackElement.textContent = data.message;
                    feedbackElement.style.color = data.success ? 'green' : 'red';
                    feedbackElement.style.display = 'block';

                    if (data.success) {
                        // Update heart icon class
                        const heartIcon = button.querySelector('i');
                        heartIcon.classList.add('added'); // Color the heart
                        heartIcon.classList.remove('fa-regular'); // Remove outline
                        heartIcon.classList.add('fa-solid'); // Make it solid
                    }

                    // Hide the feedback after 3 seconds
                    setTimeout(() => {
                        feedbackElement.style.display = 'none';
                    }, 3000);
                })
                .catch(error => {
                    console.error('Error:', error);
                    const feedbackElement = document.getElementById('wishlist-feedback');
                    feedbackElement.textContent = 'An unexpected error occurred.';
                    feedbackElement.style.color = 'red';
                    feedbackElement.style.display = 'block';

                    // Hide the feedback after 3 seconds
                    setTimeout(() => {
                        feedbackElement.style.display = 'none';
                    }, 3000);
                });
        });
    });

    // Restore scroll position after reload
    const scrollPosition = sessionStorage.getItem('scrollPosition');
    if (scrollPosition) {
        window.scrollTo(0, scrollPosition);
        sessionStorage.removeItem('scrollPosition');
    }
});


</script>

</body>
</html>

<?php 
$stmt->close(); // Close the statement
$connection->close(); // Close the connection
?>

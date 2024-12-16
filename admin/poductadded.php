<?php
// Include the database connection
include '../includes/db.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and sanitize it
    $productName = mysqli_real_escape_string($connection, $_POST['product_name']);
    $brand = mysqli_real_escape_string($connection, $_POST['brand']);
    $brand_id = mysqli_real_escape_string($connection, $_POST['brand_id']);
    $productID = mysqli_real_escape_string($connection, $_POST['product_id']);
    $price = mysqli_real_escape_string($connection, $_POST['price']);
    $stockStatus = mysqli_real_escape_string($connection, $_POST['stock_status']);
    $aboutProduct = mysqli_real_escape_string($connection, $_POST['about_product']);
    $productDetails = mysqli_real_escape_string($connection, $_POST['product_details']);
    $category = mysqli_real_escape_string($connection, $_POST['category_id']);
    $type = mysqli_real_escape_string($connection, $_POST['Type']);

    // Handle "New Arrivals" fields
    $arrivalDate = mysqli_real_escape_string($connection, $_POST['arrival_date'] ?? date('Y-m-d')); // Default to today if not provided
    $isNew = isset($_POST['is_new']) ? 1 : 0; // Checkbox value, 1 if checked, 0 otherwise

    // Insert data into the products table
    $sql = "INSERT INTO products (model, brand_name, brand_id, product_id, original_price, category_id, `type`, stock, about, description, arrival_date, is_new) 
            VALUES ('$productName', '$brand', '$brand_id', '$productID', '$price', '$category', '$type', '$stockStatus', '$aboutProduct', '$productDetails', '$arrivalDate', '$isNew')";

    if ($connection->query($sql) === TRUE) {
        $newProductId = $connection->insert_id; // Get the newly inserted product ID
        echo "Product added successfully!<br>";

        // Handle file upload for product images
        $targetDir = "../uploads/";
        $imageURLs = [];

        // Check if the product images are uploaded
        if (isset($_FILES['product_images']) && !empty($_FILES['product_images']['tmp_name'][0])) {
            // Loop through each uploaded file and insert into the image table
            foreach ($_FILES['product_images']['tmp_name'] as $key => $tmpName) {
                $targetFile = $targetDir . basename($_FILES['product_images']['name'][$key]);
                $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

                // Check if the file is a valid image
                $check = getimagesize($tmpName);
                if ($check !== false) {
                    if (move_uploaded_file($tmpName, $targetFile)) {
                        // Save each image URL for insertion
                        $imageURLs[] = $targetFile;

                        // Insert the image into the productimages table with the new product ID
                        $altText = pathinfo($targetFile, PATHINFO_FILENAME); // Use filename as alt text
                        $imageSql = "INSERT INTO productimages (product_id, image_url, alt_text, created_at) 
                                     VALUES ('$newProductId', '$targetFile', '$altText', NOW())";

                        if (!$connection->query($imageSql)) {
                            echo "Error inserting image: " . $connection->error . "<br>";
                        } else {
                            echo "Image uploaded successfully: " . $targetFile . "<br>";
                        }
                    } else {
                        echo "Error uploading file: " . $_FILES['product_images']['name'][$key] . "<br>";
                    }
                } else {
                    echo "File " . $_FILES['product_images']['name'][$key] . " is not a valid image.<br>";
                }
            }
        } else {
            echo "No product images were uploaded.<br>";
        }
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection) . "<br>";
    }
}

// Close the database connection
mysqli_close($connection);
?>

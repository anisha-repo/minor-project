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
    $aboutProduct = mysqli_real_escape_string($conn, $_POST['about_product']);
    $productDetails = mysqli_real_escape_string($conn, $_POST['product_details']);
    $category=mysqli_real_escape_string($connection, $_POST['category_id']);
   $type= mysqli_real_escape_string($connection, $_POST['type']);
    // Handle file upload for product images
    $targetDir = "../uploads/";
    $targetFile = $targetDir . basename($_FILES["product_image"]["name"]);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    
    // Check if image file is a real image
    $check = getimagesize($_FILES["product_image"]["tmp_name"]);
    if ($check !== false) {
        // Move file to target directory
        if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $targetFile)) {
            $imageUrl = $targetFile;
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "File is not an image.";
    }

    // Insert data into the products table
    $sql = "INSERT INTO products (product_name, brand, brand_id,product_id, price, category_id,`type`,stock_status, about_product, product_details, image_url) 
            VALUES ('$productName', '$brand', '$productID',$brand_id, '$price', '$category' , '$type' ,'$stockStatus', '$aboutProduct', '$productDetails', '$imageUrl')";
    
    if ($connection->query($sql) === TRUE) {
      echo "Product added successfully!";
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($connection);
  }
}

// Close database connection
mysqli_close($connection);
?>



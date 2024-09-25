<?php
// Database connection
$servername="localhost";
$username="root";
$password="";
$database = "solemate";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST['product_id'];
    $image = $_FILES['image'];

    // Validate the uploaded file
    if ($image['error'] === UPLOAD_ERR_OK) {
        // Define the target directory and file name
        $targetDir = "uploads/";
        $imageName = basename($image['name']);
        $targetFile = $targetDir . uniqid() . "-" . $imageName; // Use unique ID to avoid conflicts

        // Move the uploaded file to the target directory
        if (move_uploaded_file($image['tmp_name'], $targetFile)) {
            // Prepare the SQL statement
            $sql = "INSERT INTO productimages (product_id, image_url, alt_text) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $alt_text = $imageName; // You can customize this if needed

            // Bind parameters and execute
            $stmt->bind_param("iss", $product_id, $targetFile, $alt_text);
            if ($stmt->execute()) {
                echo "Image uploaded and saved to the database successfully!";
            } else {
                echo "Error: " . $stmt->error;
            }

            // Close statement
            $stmt->close();
        } else {
            echo "Error moving the uploaded file.";
        }
    } else {
        echo "Error uploading file.";
    }
}

// Close connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload</title>
</head>
<body>
    
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <label for="product_id">Product ID:</label>
        <input type="text" name="product_id" required><br><br>
        <label for="image">Upload Image:</label>
        <input type="file" name="image" accept="image/*" required><br><br>
        <button type="submit">Upload Image</button>
    </form>
</body>
</html>



<?php 


// Include the database connection
include '../includes/db.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and sanitize it
    $brand = mysqli_real_escape_string($connection, $_POST['brand']);
    $brand_id = mysqli_real_escape_string($connection, $_POST['brand_id']);

  

    // Insert data into the brand table
    $sql = "INSERT INTO `brand`(`brand_id`, `brand_name`) 
            VALUES ( '$brand', $brand_id)";
    if ($connection->query($sql) === TRUE) {
      echo "brand added successfully!";
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($connection);
  }
}

// Close database connection
mysqli_close($connection);
?>
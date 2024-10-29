<?php 


// Include the database connection
include '../includes/db.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and sanitize it
    $productName = mysqli_real_escape_string($connection, $_POST['model']);
    $brand = mysqli_real_escape_string($connection, $_POST['brand']);
    $brand_id = mysqli_real_escape_string($connection, $_POST['brand_id']);
    $productID = mysqli_real_escape_string($connection, $_POST['product_id']);
    $price = mysqli_real_escape_string($connection, $_POST['original_price']);
    $stockStatus = mysqli_real_escape_string($connection, $_POST['stock_status']);
    $aboutProduct = mysqli_real_escape_string($conn, $_POST['about']);
    $productDetails = mysqli_real_escape_string($conn, $_POST['description']);
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
    $sql = "INSERT INTO products (product_name, brand, brand_id,product_id, price, stock_status, about_product, product_details, image_url) 
            VALUES ('$productName', '$brand', '$productID',$brand_id, '$price', '$stockStatus', '$aboutProduct', '$productDetails', '$imageUrl')";
    
    if ($connection->query($sql) === TRUE) {
      echo "Product added successfully!";
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($connection);
  }
}

// Close database connection
mysqli_close($connection);
?>





<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Product Adding Page- Sole Mate</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="Product_adding_form.css" />
  </head>
  <body>
    <header>
      <h1>Add products</h1>
    </header>

    <main>
    <form id="contactForm" action=" " method="POST" enctype="multipart/form-data">
    <div class="input-group mb-3">
        <label for="product_image" class="col-sm-2 col-form-label">Product Images</label>
        <input type="file" class="form-control" id="product_image" name="product_image" />
    </div>
    <div class="row mb-3">
        <label for="product_name" class="col-sm-2 col-form-label">Product Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="product_name" name="product_name" />
        </div>
    </div>
    <div class="input-group mb-3">
        <label for="brand" class="col-sm-2 col-form-label">Brands</label>
        <select class="form-control" name="brand" id="brand">
            <option value="Puma">Puma</option>
            <option value="Converse">Converse</option>
            <option value="New Balance">New Balance</option>
            <option value="Reebok">Reebok</option>
            <option value="Crocs">Crocs</option>
            <option value="Nike">Nike</option>
            <option value="Adidas">Adidas</option>
        </select>
    </div>
    <div class="input-group mb-3">
        <label for="brand" class="col-sm-2 col-form-label">Brand Id</label>
        <select class="form-control" name="brand" id="brand">
            <option value="101">Nike - 101</option>
            <option value="102">puma - 102</option>
            <option value="103">Crocs - 103</option>
            <option value="104">Adidas - 104</option>
            <option value="105">Converse - 105</option>
            <option value="106">New Balance - 106</option>
            <option value="107">Reebok - 107</option>
        </select>
    </div>
    <div class="row mb-3">
        <label for="product_id" class="col-sm-2 col-form-label">Product ID</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="product_id" name="product_id" />
        </div>
    </div>
    <div class="row mb-3">
        <label for="price" class="col-sm-2 col-form-label">Price</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="price" name="price" />
        </div>
    </div>
    <div class="row mb-3">
        <label for="about_product" class="col-sm-2 col-form-label">About Product</label>
        <div class="col-sm-10">
            <textarea class="form-control" id="about_product" name="about_product" rows="3" placeholder="Enter a brief description of the product"></textarea>
        </div>
    </div>

    <!-- New text area for Product Details -->
    <div class="row mb-3">
        <label for="product_details" class="col-sm-2 col-form-label">Product Details</label>
        <div class="col-sm-10">
            <textarea class="form-control" id="product_details" name="product_details" rows="5" placeholder="Enter detailed information about the product"></textarea>
        </div>
    </div>
    <fieldset class="row mb-3">
        <legend class="col-form-label col-sm-2 pt-0">Stock Status</legend>
        <div class="col-sm-10">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="stock_status" id="stock_in" value="In-Stock" checked />
                <label class="form-check-label" for="stock_in">In-Stock</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="stock_status" id="stock_out" value="Out Of Stock" />
                <label class="form-check-label" for="stock_out">Out Of Stock</label>
            </div>
        </div>
    </fieldset>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

    </main>

   
    <script src="Product_adding_form.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
      integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
      crossorigin="anonymous"
    ></script>
  </body>
</html>

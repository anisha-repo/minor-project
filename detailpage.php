<?php
 include("includes/header.html");
 include("includes/db.php");

// Fetch product details
$product_id = isset($_GET['product_id']) ? intval($_GET['product_id']) : 0;

// Validate the product ID
if ($product_id <= 0) {
    echo "Invalid product ID.";
    exit;
}

// Prepare the SQL statement to fetch product details
$sql_product = "SELECT Brand_name, model, description, original_price, about
                FROM products
                WHERE product_id = ?";
$stmt_product = $connection->prepare($sql_product);

if ($stmt_product === false) {
    die("MySQL prepare error: " . $connection->error);
}

// Bind the parameter and execute the statement
$stmt_product->bind_param("i", $product_id);
if ($stmt_product->execute() === false) {
    die("Execute error: " . $stmt_product->error);
}
$result_product = $stmt_product->get_result();

// Check if the product exists
if ($result_product->num_rows > 0) {
    $product = $result_product->fetch_assoc();

    // Prepare SQL to fetch images
    $sql_images = "SELECT image_url FROM productimages WHERE product_id = ?";
    $stmt_images = $connection->prepare($sql_images);

    if ($stmt_images === false) {
        die("MySQL prepare error for images: " . $connection->error);
    }

    // Bind the parameter and execute the statement
    $stmt_images->bind_param("i", $product_id);
    if ($stmt_images->execute() === false) {
        die("Execute error for images: " . $stmt_images->error);
    }
    $result_images = $stmt_images->get_result();

    // Fetch all images into an array
    $images = [];
    while ($image = $result_images->fetch_assoc()) {
        if ($image['image_url']) {
            $images[] = $image['image_url'];
        }
    }

} else {
    echo "Product not found.";
    exit;
}


$currentProductId = isset($_GET['product_id']) ? (int)$_GET['product_id'] : 0;;

// Get the current product's category
$result = $connection->query("SELECT Brand_id FROM products WHERE product_id = $currentProductId");
$currentProduct = $result->fetch_assoc();

$sql  = "SELECT
            p.product_id,
            p.Brand_name,
            p.model,
            p.original_price,
            (SELECT i.image_url
             FROM productimages i
             WHERE i.product_id = p.product_id
             LIMIT 1) AS image_url
        FROM
            products p
        WHERE
        product_id != $currentProductId LIMIT 5";

  $result = $connection->query($sql);




// Close the database connections
$stmt_product->close();
$stmt_images->close();
$connection->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="styles/detailpage.css">
</head>
<body>
   <main>
        <div class="content"><!--content start -->
          <div class="container-fluid"><!--container start-->
            <div class="row" id="productmain"><!--row start-->

                    <!--display-image--start-->

               <div class="col-md-3"><!--col-md-3-start-->
                  <div class="product-grid">
                      <?php foreach ($images as $image_url): ?>
                        <div class="grid-item">
                           <img src="<?php echo htmlspecialchars($image_url); ?>" alt="Product Image">
                        </div>
                            <?php endforeach; ?>
                  </div>

                  </div><!--col-md-3-end-->
                      <!--display-image--end-->
                  <div class="col-md-6 pro-details-hide"><!--col-md-6-start-->
                       <div class="box">
                           <h3><?php echo htmlspecialchars($product['Brand_name']); ?></h3>
                           <h4><?php echo htmlspecialchars($product['model']); ?></h4>
                           <p class="price">Rs.<?php echo htmlspecialchars($product['original_price']); ?>&nbsp&nbsp&nbsp&nbsp</p>
                        </div>


                        <h4 class="size-text">Shoe size(UK)</h4>

                                <!--shoe-size-start-->

                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group" id="sizeSelect">
                              <input type="radio" onclick="check()" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
                              <label class="btn btn-outline-primary" for="btnradio1" value="7">7</label>

                              <input type="radio" onclick="check()"class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                              <label class="btn btn-outline-primary" for="btnradio2" value="8">8</label>

                              <input type="radio" onclick="check()"class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
                              <label class="btn btn-outline-primary" for="btnradio3" value="9">9</label>

                               <input type="radio" onclick="check()" class="btn-check" name="btnradio" id="btnradio4" autocomplete="off">
                              <label class="btn btn-outline-primary" for="btnradio4" value="10">10</label><!--shoe-size-start-->
                        </div>


                                <!--quantity-start-->
                    <div class="qty" >
                        <div class="btns-qty">
                            <div><label class="qty-text">QTY:-</label></div>&nbsp&nbsp&nbsp&nbsp

                            <div><button type="button"id="dec">-</button></div>&nbsp&nbsp

                            <div class="qty_numbers" id="counting">1</div>&nbsp&nbsp

                            <div><button  type="button" id="inc">+</button></div>
                        </div>
                    </div>
                         <!--quantity-end-->

                          <!--add-to-cart-start-->
                        <div class="add-to-cart" id="addToCart">
                                <button class="add_cart" type="submit" id="cart">
                                    <i class='fas fa-cart-plus'>&nbsp&nbspAdd to Cart</i>
                                </button>
                                 <p id="message"></p>
                        </div>
                        <!--add-to-cart-end-->

                        <!--Accordian start-->
                        <div class="prod-details">
                               <div class="Acord">
                                        <button class="accordion" aria-expanded="false">Product details</button>
                                        <div class="panel">
                                        <p><?php echo htmlspecialchars($product['description']); ?></p>
                                        </div>
                                </div>
                                <div class="Acord">
                                        <button class="accordion">About product</button>
                                        <div class="panel">
                                        <p><?php echo htmlspecialchars($product['about']); ?></p>
                                        </div>
                                </div>
                        </div>
                        <!--Accordian end-->

                    </div><!--col-md-6-end-->

                </div><!--row end-->

               &nbsp&nbsp


   <div class="container-fluid you-may-like"><!--container start-->
    <h3>YOU MAY LIKE</h3>
            <div class="flex-container">
            <?php
                    if ($currentProduct)
                    {
                        if ($result->num_rows > 0)
                        {

                            while ($product =$result->fetch_assoc())
                             {

                               echo'<div class="products you-may-like-product">';

                                echo  '<a href="detailpage.php?product_id=' . $product['product_id'] . '"><img src="' . htmlspecialchars($product['image_url']) .'" alt="' . htmlspecialchars($product['model']) . '"></a>';
                                // echo '<div class="you-may-like-product">';
                                echo '<a href="detailpage.php?product_id=' . $product['product_id'] . '"><h5 class="product-name">'.htmlspecialchars($product['Brand_name']) . '</h5></a>' ;

                                echo '<p class = "product-price">price:' . htmlspecialchars($product['original_price']) . '</p>';
                                echo '</div>';
                             }
                        }
                        else
                        {
                            echo 'No related products found.';
                        }
                    }
                    else
                    {
                     echo 'Product not found.';
                    }

                ?>

                </div><!--container end-->



                    </div>
                </div>
            </div><!--container end 2-->

        </div><!--content end-->
    </main>

   <script src="js/cart.js"></script>

<?php
 include("includes/footer.html");
?>
</body>
</html>

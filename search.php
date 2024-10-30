<?php
include("includes/header.php");
include("includes/db.php");

// Get and sanitize the search query
$search_query = filter_input(INPUT_GET, 'query', FILTER_SANITIZE_STRING);

if ($search_query) {
    // Prepare the SQL query to search for products by name or description
    $sql = "SELECT p.product_id, p.Brand_name, p.model, p.original_price, 
                (SELECT i.image_url 
                 FROM productimages i 
                 WHERE i.product_id = p.product_id 
                 LIMIT 1) AS image_url
            FROM products p
            WHERE p.Brand_name LIKE ? OR p.model LIKE ?";
    
    $stmt = $connection->prepare($sql);
    if ($stmt === false) {
        die('SQL Error: ' . $connection->error);
    }

    // Add wildcards to the search query for partial matching
    $search_term = "%" . $search_query . "%";
    $stmt->bind_param("ss", $search_term, $search_term);

    // Execute the query
    $stmt->execute();
    $result = $stmt->get_result();

    // Display the results
   echo' <section class="products-container">';
   echo '<div class="product-gallery">';
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="product">';
              echo '<span>';
              echo  ' <form action="add_to_wishlist.php" method="POST">';
              echo ' <input type="hidden" name="product_id" value="'.$row['product_id'].'">';
               echo '<div class="wishlist-icon">';
                   echo '<button type="submit" class="wish" data-product-id="' . $row['product_id'] . '">'; // Use data attribute for product ID
                   echo ' <i class="fa-solid fa-heart fa-2xl wishlist" data-product-id="' . $row['product_id'] . '"></i>'; // Same here
                   echo '</button>';
                echo '</div>';
                  echo '</form>' ;
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
  echo'</div>';
  echo' </section >';


    include("includes/footer.php");
    
}
?>
<style>
   
   body {
  font-family:  "Lato", sans-serif;
  background-color: #f4f4f4;
  padding: 0;
  margin: 0;
}
   .products-container {
  padding: 20px;
  display: grid; /* Keep grid */
  grid-template-columns: 1fr 3fr; /* Filter takes 1/4 of the width, product gallery takes 3/4 */
  gap: 20px;/* Space between the form and the gallery */

}

.product-gallery 
{

  grid-column: 2;
  width: auto; /* Allow the grid to control the width */
  padding: 1rem; /* Add padding instead of margin */
  margin-left: 0; /* Remove excess margin */
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  row-gap: 20px;
  }
  
.product 
{   
    border-radius: 5px;
    align-items: center;
    border: 2px solid white;
    text-align: center;
    margin-right: 2%;
    margin-left: 2%;
    padding-bottom: 5%;
    right: 10px;
}
.product img {
  background-color: #F4F4F4;
  display: block;
 height: 250px;
  width: 300px;
  margin-top: 1.5rem;
  margin-left: 1.5rem;
  margin-right: 1.5rem;
  align-items: center;
  object-fit: contain;
  
}

.wish {
  border: 0;
  cursor: pointer;
  padding: 0;
  top:25px;
  left:130px;
  color: gray;
  position: relative; /* Adjust if needed */
}

/* Added focus style for button */
.wish:focus {
  outline: none; /* Remove default outline */
}
.wishlist-icon {
  cursor: pointer;
}
.wish:focus .wishlist {
  color:  red; /* Outline on focus */
  outline-offset: 2px; /* Offset for better visibility */
}


.wishlist {
  color: gray; /* Default color */
  transition: color 0.3s; /* Smooth transition */
}

.wishlist:active {
  color: red; /* Color when active */
}

@keyframes beat {
  0% {
      transform: scale(1.4);
  }
  50% {
      transform: scale(0.8);
  }
  100% {
      transform: scale(1);
  }
}

@media (max-width: 768px) {
  .products-container {
      grid-template-columns: 1fr; /* Stack items on top of each other for smaller screens */
  }

  .product-gallery {
      grid-template-columns: repeat(2, 1fr); /* 2 columns for medium screens */
  }
}

@media (max-width: 480px) {
  .product-gallery {
      grid-template-columns: 1fr; /* 1 column for mobile screens */
  }
}

    </style>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="styles/FiLTER.css">
</head>
<body>
    <div class="filter-section" >
        <i class="fa-solid fa-bars">&nbsp&nbsp&nbsp&nbsp&nbspFILTER</i>
    </br></br>
    <form method="get" action="photogallery.php">
    <input type="hidden" name="category_id" value="<?php echo htmlspecialchars($category_id); ?>">
    
        <div class="filter-heading" onclick="toggleFilter('brands-options')">Brand</div>
        <div class="filter-options" id="brands-options">
            <label><input type="radio" name="brand" value="101"> Nike</label>
            <label><input type="radio" name="brand" value="102"> Puma</label>
            <label><input type="radio" name="brand" value="103"> Crocs</label>
            <label><input type="radio" name="brand" value="104"> Adidas</label>
            <label><input type="radio" name="brand" value="105"> Converse</label>
            <label><input type="radio" name="brand" value="106"> New Balance</label>
            <label><input type="radio" name="brand" value="107"> Reebok</label>
        </div>

        <div class="filter-heading" onclick="toggleFilter('size-options')">Size</div>
        <div class="filter-options" id="size-options">
            <label><input type="checkbox" name="size" value="5"> 5</label>
            <label><input type="checkbox" name="size" value="6"> 6</label>
            <label><input type="checkbox" name="size" value="7"> 7</label>
            <label><input type="checkbox" name="size" value="8"> 8</label>
            <label><input type="checkbox" name="size" value="9"> 9</label>
        </div>

        <div class="filter-heading" onclick="toggleFilter('price-options')">Price</div>
        <div class="filter-options" id="price-options">
            <label><input type="radio" name="price" value="high-to-low"> High to Low</label>
            <label><input type="radio" name="price" value="low-to-high"> Low to High</label>
        </div>

        <div class="filter-heading" onclick="toggleFilter('occasion-options')">Occasion</div>
        <div class="filter-options" id="occasion-options">
            <label><input type="checkbox" name="occasion" value="casual"> Casual</label>
            <label><input type="checkbox" name="occasion" value="sports"> Sports</label>
            <label><input type="checkbox" name="occasion" value="slides"> Slides</label>
        </div>
        <button class="submit-filter" type="submit">Apply Filters</button>
    </form>
    </div>

    <script src="js/FILTER.js"></script>
</body>
</html>
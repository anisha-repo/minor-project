<?php
session_start(); // Start the session at the very top

// Include any necessary files or configurations here
?>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styles/headerStyles.css"/>
    <title>Sneaker Shoes Online</title>
  </head>
<body>
<nav id="nav">
    <div class="navTop" >
        <div class="navItem">
            <div class="navBar">
            <span class="SOUL MATE">SOLE</br>MATE</span>
            </div>
        </div>
        <div class="navItem" >

            <div class="search">
            <form action="search.php" method="get" class="search-form">
                <input type="text" name="query" placeholder="Search..." class="searchInput" >
               <button type="submit" style="background-color: gray; border: none;"><i class="fas fa-search" style="color: #ffffff; font-size: 15px;"></i></button>
            </form>
            </div>
        </div>
        <div class="navItem">
            <span>
            <?php if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true): ?>
                    <a href="user_info.php"><i class="fa-solid fa-user" style="color: #fafafa; font-size: 40px;"></i></a>
                <?php else: ?>
                    <a href="login.php"><i class="fa-solid fa-user" style="color: #fafafa; font-size: 40px;"></i></a>
                <?php endif; ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="wishlist.php">
                    <i class="fa-solid fa-heart" style="color: white; font-size: 40px;"></i>
                    </a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <a href="Cart.php"><i class="fa-solid fa-cart-shopping"style="color: white; font-size: 40px;"></i></a>

            </span>
        </div>
    </div>
    <div class="navBottom" id="menu">
        <a href="index.php">HOME</a>
        <a href="newarrival.php" class="menuItem">NEW ARRIVAL</a>
        <a href="photogallery.php?category_id=9" class="menuItem"> WOMEN</a>
        <a href="photogallery.php?category_id=6" class="menuItem"> MEN </a>
        <div class="dropdown">
            <button class="dropbtn" style="font-size: 18px">BRANDS</button>
            <div class="dropdown-content">
             
              <a href="brandsGallery.php?brand_id=101">Nike</a>
              <a href="brandsGallery.php?brand_id=102">Puma</a>
              <a href="brandsGallery.php?brand_id=105">Converse</a>
              <a href="brandsGallery.php?brand_id=104">Adidas</a>
              <a href="brandsGallery.php?brand_id=106">New Balance</a>
              <a href="brandsGallery.php?brand_id=103">Crocs</a>
              <a href="brandsGallery.php?brand_id=107">REEBOK</a>
                
            </div>
          </div>
        

    </div>
</nav>
<script src="js/headerNav.js"></script>
</body>

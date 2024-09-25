<?php

 include("includes/header.html");
 include("includes/db.php");

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styles/homepageCss.css"/>
    <title>solemate</title>
  </head>
  <body>
    <div class="slider" >
        <div class="sliderWrapper">
            <div class="sliderItem" >
                <img src="imgs/NIKE.png" alt="" class="sliderImg" >
                <div class="sliderBg"></div>
                <h1 class="sliderTitle">NIKE</br> NEW</br>SEASON</h1>
                <h2 class="sliderPrice">14,975/-</h2>
                <a href="#product">
                    <button class="buyButton">BUY NOW!</button>
                </a>
            </div>
            <div class="sliderItem" >
                <img src="imgs/PUMA.png" alt="" class="sliderImg" >
                <div class="sliderBg"></div>
                <h1 class="sliderTitle">PUMA</br> NEW</br>SEASON</h1>
                <h2 class="sliderPrice">5,999/-</h2>
                <a href="#product">
                    <button class="buyButton">BUY NOW!</button>
                </a>
            </div>
            <div class="sliderItem" >
                <img src="imgs/ADIDAS.png" alt="" class="sliderImg" >
                <div class="sliderBg"></div>
                <h1 class="sliderTitle">ADIDAS</br> NEW</br>SEASON</h1>
                <h2 class="sliderPrice">10,999/-</h2>
                <a href="#product">
                    <button class="buyButton">BUY NOW!</button>
                </a>
            </div>
            <div class="sliderItem" >
                <img src="imgs/CONVERSE.png" alt="" class="sliderImg" >
                <div class="sliderBg"></div>
                <h1 class="sliderTitle">CONVERSE</br> NEW</br>SEASON</h1>
                <h2 class="sliderPrice">6,999/-</h2>
                <a href="#product">
                    <button class="buyButton">BUY NOW!</button>
                </a>
            </div>
            <div class="sliderItem" >
                <img src="imgs/NEWBALANCE.png" alt="" class="sliderImg" >
                <div class="sliderBg"></div>
                <h1 class="sliderTitle">NEW BALANCE</br> NEW</br>SEASON</h1>
                <h2 class="sliderPrice">9,799/-</h2>
                <a href="#product">
                    <button class="buyButton">BUY NOW!</button>
                </a>
            </div>
        </div>
    </div>

    <div class="features">
        <div class="feature">
            <img src="https://raw.githubusercontent.com/ZeroOctave/ZeroOctave-Javascript-Projects/main/assets/Images/sneaker-images/shipping.png" class="featureIcon">
            <span class="featureTitle">FREE SHIPPING</span>
            <span class="featureDesc">Free worldwide shipping on all orders.</span>
        </div>
        <div class="feature">
            <img src="https://raw.githubusercontent.com/ZeroOctave/ZeroOctave-Javascript-Projects/main/assets/Images/sneaker-images/return.png" class="featureIcon">
            <span class="featureTitle">30 DAYS RETURN</span>
            <span class="featureDesc">No question return and refund in 14 days</span>
        </div>
        <div class="feature">
            <img src="https://raw.githubusercontent.com/ZeroOctave/ZeroOctave-Javascript-Projects/main/assets/Images/sneaker-images/contact.png" class="featureIcon">
            <span class="featureTitle">CONTACT US!</span>
            <span class="featureDesc">Keep in touch via email and support system</span>
        </div>
    </div>

    <div class="product" id="product" >
        <img src="imgs/image.png" alt="" class="productImg">
        <div class="productDetails">
            <h1 class="productTitle" >AIR FORCE 1</h1>
            <h2 class="productPrice">16,625/-</h2>
            <p class="productDesc">
                Once upon a midnight dreary, this Air Force 1 looked extra eerie. Shadows crept from beneath the "AIR", while ghoulish green accents added Halloween flair. And that all-black upper with reflective-design coating … well, it let others know they'd better beware. You get the idea.
            <p>
                SKU: DQ7666-001
            </p>
            </p>
            <h2> Shoe size(Uk)</h2>
            <div class="sizes">
                <div class="size">6</div>
                <div class="size">7</div>
                <div class="size">8</div>
                <div class="size">9</div>
            </div>
            <button class="productButton">BUY NOW !</button>
        </div>
        <div class="payment" >
            <h1 class="payTitle">Personal Information</h1>
            <label>Name and Surname</label>
            <input type="text" placeholder="John Doe" class="payInput">
            <label>Phone Number</label>
            <input type="text" placeholder="+1 234 5678" class="payInput" >
            <label>Address</label>
            <input type="text" placeholder="Elton St 21 22-145" class="payInput">
            <h1 class="payTitle">Card Information</h1>
            <div class="cardIcons" >
                <img src="https://raw.githubusercontent.com/ZeroOctave/ZeroOctave-Javascript-Projects/main/assets/Images/sneaker-images/visa.png" width="40" alt="" class="cardIcon" >
                <img src="https://raw.githubusercontent.com/ZeroOctave/ZeroOctave-Javascript-Projects/main/assets/Images/sneaker-images/master.png" width="40" alt="" class="cardIcon" >
            </div>
            <input type="password" class="payInput" placeholder="Card Number" >
            <div class="cardInfo" >
                <input type="text" placeholder="mm" class="payInput sm">
                <input type="text" placeholder="yyyy" class="payInput sm">
                <input type="text" placeholder="cvv" class="payInput sm">
            </div>
            <button class="payButton" >Checkout !</button>
            <span class="close">X</span>
        </div>
    </div>

    <div class="gallery" >
        <div class="galleryItem">
            <h1 class="galleryTitle" >Be Yourself!</h1>
            <img src="https://images.pexels.com/photos/9295809/pexels-photo-9295809.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500"
                alt="" class="galleryImg">
        </div>
        <div class="galleryItem">
            <img src="https://images.pexels.com/photos/1040427/pexels-photo-1040427.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500"
                alt="" class="galleryImg">
            <h1 class="galleryTitle">This is the First Day of Your New Life</h1>
        </div>
        <div class="galleryItem">
            <h1 class="galleryTitle">Just Do it!</h1>
            <img src="https://images.pexels.com/photos/7856965/pexels-photo-7856965.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500"
                alt="" class="galleryImg">
        </div>
    </div>

    <div class="newSeason">
        <div class="nsItem">
            <img src="https://images.pexels.com/photos/4753986/pexels-photo-4753986.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500"
                alt="" class="nsImg">
        </div>
        <div class="nsItem">
            <h3 class="nsTitleSm">WINTER NEW ARRIVALS</h3>
            <h1 class="nsTitle">New Season</h1>
            <h1 class="nsTitle">New Collection</h1>
            <h1 class="nsTitle">Coming Soon</h1>
            <a href="#nav">
                <button class="nsButton">CHOOSE YOUR STYLE</button>
            </a>
        </div>
        <div class="nsItem">
            <img src="https://images.pexels.com/photos/7856965/pexels-photo-7856965.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500"
                alt="" class="nsImg">
        </div>
    </div>
   <?php
    include("includes/footer.html");
    ?>

    <script src="script.js"></script>

  </body>
</html>
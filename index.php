<?php
include("includes/db.php");
 include("includes/header.html");
?>
   <main>
        <div class="content"><!--content start -->
            <div class="container-fluid"><!--container start 1-->
              <div class="col-md-12"><!--col-md-12 start-->
                    <ul class="breadcrumb">
                      <li><a href="#">Home</a></li>&nbsp&nbsp
                      <li>Sneakers</li>
                      <li><a href="#">Adidas</a></li>
                   </ul>
              </div>  <!--col-md-12 end-->
            </div><!--container end 1-->
            <div class="container-fluid"><!--container start-->
                <div class="row" id="productmain"><!--row start-->
                   
                    <!--display-image--start-->
                  
                    <div class="col-md-3"><!--col-md-3-start-->
                        <div class="mySlides fade" >
                              <div class="numbertext">1 / 2</div>
                              <img src="styles/luis-felipe-lins-LG88A2XgIXY-unsplash (1).jpg" style="width:100%">
                              </div>

                            <div class="mySlides fade">
                              <div class="numbertext">2 / 2</div>
                              <img src="styles/luis-felipe-lins-LG88A2XgIXY-unsplash (1).jpg" style="width:100%">
                            </div>

                         <a class="prev" onclick="plusSlides(-1)">❮</a>
                         <a class="next" onclick="plusSlides(1)">❯</a>

                    <div style="text-align:center">
                          <span class="dot" onclick="currentSlide(1)"></span> 
                          <span class="dot" onclick="currentSlide(2)"></span> 
                    </div>

                    </div><!--col-md-3-end-->

                  
                      
                      <!--display-image--end-->

                    <div class="col-md-6 pro-details-hide"><!--col-md-6-start-->
                       <div class="box">
                           <h3>Sneaker</h3>
                           <p>product Description</p>
                           <p class="price">rs.1500&nbsp&nbsp&nbsp&nbsp</p>
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
                                        <button class="accordion" aria-expanded="false">About product</button>
                                        <div class="panel">
                                        <p>Lorem ipsum...</p>
                                        </div>
                                </div>  
                                <div class="Acord">     
                                        <button class="accordion">product detail</button>
                                        <div class="panel">
                                        <p>Lorem ipsum...</p>
                                        </div>
                                </div>
                        </div>   
                        <!--Accordian end-->
                    
                    </div><!--col-md-6-end-->
                    
                </div><!--row end-->
                                
               &nbsp&nbsp  
                
                <div class="container-fluid you-may-like"><!--container start-->
                    <div class="row same-height-row"><!--row start-->
                       <div class="col-md-6 col-sm-12"><!--col-md-6-start-->
                            <h3 class="text-center">You may also like</h3>
                       </div><!--col-md-6-end-->
                    </div><!--row end-->

                    <!--<div class="row">
                        <div class="center-responsive">
                           <div class="products">
                              <a href="index.php"><img src="styles/luis-felipe-lins-LG88A2XgIXY-unsplash (1).jpg" alt=""/></a>
                              <div class="you-may-like-product">
                                <a href=index.php><h5 class="product-name">sneakers</h5></a>
                                <p class="product-price"><small class="text-danger"><s>Rs. 1500</s></small></p>&nbsp&nbsp
                                <span class="text-success">Rs.1000</span>
                               </div>
                            <div>

                            <div class="products">
                              <a href="index.php"><img src="styles/luis-felipe-lins-LG88A2XgIXY-unsplash (1).jpg" alt=""/></a>
                              <div class="you-may-like-product">
                                <a href=index.php><h5 class="product-name">sneakers</h5></a>
                                <p class="product-price"><small class="text-danger"><s>Rs. 1500</s></small></p>&nbsp&nbsp
                                <span class="text-success">Rs.1000</span>
                              </div>
                            <div>
                        </div>
                    </div>-->
                    <div class="flex-container">
                      <div class="products">
                        <a href="index.php"><img src="styles/luis-felipe-lins-LG88A2XgIXY-unsplash (1).jpg" alt=""/></a>
                              <div class="you-may-like-product">
                                <a href=index.php><h5 class="product-name">sneakers</h5></a>
                                <p class="product-price"><small class="text-danger"><s>Rs. 1500</s></small></p>
                                <p class="actual-price">Rs.1000</p>
                               </div>
                      </div>
                      <div class="products">
                        <a href="index.php"><img src="styles/luis-felipe-lins-LG88A2XgIXY-unsplash (1).jpg" alt=""/></a>
                              <div class="you-may-like-product">
                                <a href=index.php><h5 class="product-name">sneakers</h5></a>
                                <p class="product-price"><small class="text-danger"><s>Rs. 1500</s></small></p>
                                <p class="actual-price">Rs.1000</p>
                               </div>
                      </div>
                      <div class="products">
                        <a href="index.php"><img src="styles/luis-felipe-lins-LG88A2XgIXY-unsplash (1).jpg" alt=""/></a>
                              <div class="you-may-like-product">
                                <a href=index.php><h5 class="product-name">sneakers</h5></a>
                                <p class="product-price"><small class="text-danger"><s>Rs. 1500</s></small></p>
                               <p class="actual-price">Rs.1000</p>
                               </div>
                      </div>

                       <div class="products">
                        <a href="index.php"><img src="styles/luis-felipe-lins-LG88A2XgIXY-unsplash (1).jpg" alt=""/></a>
                              <div class="you-may-like-product">
                                <a href=index.php><h5 class="product-name">sneakers</h5></a>
                                <p class="product-price"><small class="text-danger"><s>Rs. 1500</s></small></p>
                                <p class="actual-price">Rs.1000</p>
                               </div>
                      </div>

                       <div class="products">
                        <a href="index.php"><img src="styles/luis-felipe-lins-LG88A2XgIXY-unsplash (1).jpg" alt=""/></a>
                              <div class="you-may-like-product">
                                <a href=index.php><h5 class="product-name">sneakers</h5></a>
                                <p class="product-price"><small class="text-danger"><s>Rs. 1500</s></small></p>
                                <p class="actual-price">Rs.1000</p>
                               </div>
                      </div>
                    </div>


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

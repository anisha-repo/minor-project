<?php
 include("includes/db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>soulemate</title>
    <link rel="stylesheet" type="text/css" href=styles/style.css>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
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
                    <div class="col-md-3"><!--col-md-3-start-->
                        <div class="img_thumbnail">
                           <img src="styles/luis-felipe-lins-LG88A2XgIXY-unsplash (1).jpg" alt="" />
                           <div class="img_small">
                               <img src="luis-felipe-lins-LG88A2XgIXY-unsplash (1).jpg"alt=""class="active"/>
                               <img src="styles/luis-felipe-lins-LG88A2XgIXY-unsplash (1).jpg" alt="" />
                               <img src="styles/luis-felipe-lins-LG88A2XgIXY-unsplash (1).jpg" alt="" />
                               <img src="styles/luis-felipe-lins-LG88A2XgIXY-unsplash (1).jpg" alt="" />
                           </div>
                        </div>
                    </div><!--col-md-3-end-->
                     
                    <div class="col-md-6 pro-details-hide"><!--col-md-6-start-->
                       <div class="box">
                           <h1>Sneaker</h1>
                           <p>product Description</p>
                          
                           <p class="price">rs.1500&nbsp&nbsp&nbsp&nbsp</p>
                           
                           <span class="text-primary">40% Off</span>
                        </div>
                        <div class="row">
                           
                            <p class="text-control-buttons qt-sneaker text-center">
                                <label class="control-label size">
                                    <legend class="varient-label"><b>Size(UK)&nbsp&nbsp</b></legend>
                                    <span class="size-buttons"> <!--size-button start-->
                                       <button type="button" class="buttons">6</button> 
                                       <button type="button" class="buttons">7</button> 
                                       <button type="button" class="buttons">8</button> 
                                       <button type="button" class="buttons">9</button> 
                                    </span><!--size-button end-->
                                </label>    
                               
                                <label class="control-label">
                                      <button class="col-md-9 btn btn-info text-center" type="submit" id="cart">
                                        <i class="fa fa-shopping-cart">Add to cart</i>
                                      </button>
                                </label> 
                            </p>
                        </div>
                        <div class="Acord"> <!--Accordian start-->
                                <button class="accordion">About product</button>
                                <div class="panel">
                                <p>Lorem ipsum...</p>
                                </div>

                                <button class="accordion">product detail</button>
                                <div class="panel">
                                <p>Lorem ipsum...</p>
                                </div>

                        </div><!--Accordian end-->
                    </div><!--col-md-6-end-->
                </div><!--row end-->
                <hr>
                <div class="container-fluid you-may-like"><!--container start-->
                    <div class="row same-height-row"><!--row start-->
                       <div class="col-md-6 col-sm-12"><!--col-md-6-start-->
                            <h3 class="text-center">You may also like</h3>
                       </div><!--col-md-6-end-->
                    </div><!--row end-->

                    <div class="row"><!--row start-->
                        <div class="center-responsive"><!--col-md-3-start-->
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
                        </div><!--col-md-3-end-->
                    </div><!--row end-->

                    
                </div><!--container end-->
               
                
                      
                    </div>
                </div>
            </div><!--container end 2-->

        </div><!--content end-->
    </main>





    <script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>
</body>
</html>
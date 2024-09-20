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
</head>
<body>
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
            <main id="products">
            <div class="container-fluid"><!--container start-->
                <div class="producat_wrapper" id="productmain"><!--row start-->
                    <div class="producat_image" style="background-color:red;"><!--col-md-3-start-->
                      <div class="img_thumbnail">
                          product image
                      </div>
                    </div><!--col-md-3-end-->
                     
                    <div class="producat_content pro-details-hide"><!--col-md-6-start-->
                     <div class="box">
                        <h1>Sneaker</h1>
                        <p>product Description</p>
                        <p>product Description</p>
                        <p>product Description</p>
                        <p>product Description</p>
                        <p>product Description</p>
                        <p class="price">rs.1500&nbsp&nbsp&nbsp&nbsp
                            <span class="text-primary">40% Off</span>
                        </p>
                    </div>
                        <div class="row">
                            <p class="text-control-buttons qt-sneaker text-center qty">
                                <label class="control-label siz"><b>size&nbsp&nbsp&nbsp&nbsp</b>
                            <span class="size-buttons"> <!--size-button start--><button>6</button> 
                            <button>7</button> 
                            <button>8</button> 
                            <button>9</button> 
                           </span><!--size-button end-->
                                <label class="control-label qty"><b>Quantity</b>
                                    <select>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                    <button class="col-md-9 btn btn-info text-center" type="submit" id="cart">
                                   <i class="fafa-shopping-cart">Add to cart</i>
                                    </button>
                                </label>  
                            </label>
                            </p>
                        </div>
                       

               
                    </div><!--col-md-6-end-->
                </div><!--row end-->
            </div><!--container end 2-->

        </div><!--content end-->
    </main>
</body>
</html>
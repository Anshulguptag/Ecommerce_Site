<!DOCTYPE html>
<?php include("functions/functions.php") ?>
<html lang="en" dir="ltr">
<head>
  <title>fullcart</title>
  <link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
  <link rel="stylesheet" href="styles/style.css" media="all" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Exo" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Handlee" rel="stylesheet">
  
</head>
<body>
  <div class="header">
        <ul id="head">  
          <li><a href="index.php">JOIN</a></li>
          <li><a href="all_products.php">SIGNIN</a></li>
          <li><a href="custmor/my_account.php">MAIL</a></li>
          <li><a href="#">TOTAL PRICE: ₹ <?php total_price(); ?></a></li>
          <a href="#">
          <span class="glyphicon glyphicon-shopping-cart" style="margin-right: 80px;margin-left: -15px;"><?php total_items(); ?></span>
          </a>
        </ul>
<hr>
<h1 id="logo">fullcart.com</h1>
<div id="form">
          <form method="get" action="results.php" enctype="multipart/form-data">
            <input type="text" name="user_query" placeholder="Search a product" style="float: right; margin-right: 90px;"/>
            <input type="submit" name="search" value="search" style="float: right; margin-right: 5px; margin-left: -300px;"/>
          </form>
      </div>      
  <div class="menubar">
    
    <ul id="menu">
      <li><div class="dropdown" style="margin-left: 150px;">
        <button class="dropbtn"><a href="index.php" style="text-decoration: none; color:black;" >HOME</a></button>
        
      </div>
      </li>
      <li><div class="dropdown" style="margin-left: 15px;">
        <button class="dropbtn"><a href="all_products.php" style="text-decoration: none; color:black;">ALL</a></button>
        <div class="dropdown-content">
          <!--<?php getCats(); ?>-->
        </div>
      </div>
      </li>
      <?php indigetCats(); ?>
      
    </ul>
  </div>
  <br>
  <div class="header_wrapper">
        <img id="banner" src="images/advertisement.gif"/>
     </div> 
      <?php
                if(isset($_GET['add_cart'])){

                  $product_id = $_GET['add_cart'];
                    
                  $get_pro = "select * from products where product_id='$product_id'";

                  $run_pro = mysqli_query($con, $get_pro);

                  while($row_pro=mysqli_fetch_array($run_pro)){
                    $pro_id = $row_pro['product_id'];
                    $pro_title = $row_pro['product_title'];
                    $pro_price = $row_pro['product_price'];
                    $pro_image = $row_pro['product_image'];
                    $pro_desc = $row_pro['product_desc'];
                     echo "
                        <div id='single_product'>
                          <h3>$pro_title</h3>
                          <img src='admin_area/product_images/$pro_image' width='400' height='300' />
                          <h3>₹ $pro_price</h3>
                          <a href='index.php?pro_id=$pro_id' style='float:left;'>Go back</a>
                          <a href='details.php?add_cart=$pro_id&cond=yes'><button type='button' class='btn'>
                          <span class='glyphicon glyphicon-shopping-cart'></span> Add to Cart
                          </button></a>
                        </div>
                     ";
                  }
                }

               ?>
        <?php if(isset($_GET['cond']))
     {
      cart('details',$_GET['cond']);  
     }
      ?>
       <div id="footer">
        <h2 style="text-align: center; padding-top: 30px; font-size:20px; ">FOLLOW US ON</h2>
        <a href="#" class="fa fa-facebook"></a>
        <a href="#" class="fa fa-twitter"></a>
        <a href="#" class="fa fa-google"></a>
    <a href="#" class="fa fa-linkedin"></a>
    <a href="#" class="fa fa-instagram"></a>
    
    <h2 style="text-align: center; padding-top: 30px; font-size:20px; ">&copy; 2018 fullcart</h2>
    <h4 style="text-align: center; font-size:20px; ">fullcart.com</h4>
        
      </div>
</body>
</html>
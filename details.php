<!DOCTYPE html>
<?php
include("functions/functions.php") ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Shopping Mart</title>

    <link rel="stylesheet" href="styles/style.css" media="all" />
  </head>
  <body>
    <!--Main Container starts here-->
    <div class="main_wrapper">

      <!--Header starts here-->
      <div class="header_wrapper">
        <img id="logo" src="images/logo.jpg"/>
        <img id="banner" src="images/iphonex.gif"/>
      </div>
      <!--Header ends here-->

      <!--Navbar starts here-->
      <div class="menubar">
        <ul id="menu">
          <li><a href="index.php">Home</a></li>
          <li><a href="all_products.php">All Products</a></li>
          <li><a href="customer/my_account.php">My Account</a></li>
          <li><a href="#">Sign Up</a></li>
          <li><a href="cart.php">Shopping cart</a></li>
          <li><a href="#">Contact us</a></li>
        </ul>

        <div id="form">
          <form method="get" action="results.php" enctype="multipart/form-data">
            <input type="text" name="user_query" placeholder="Search a product"/>
            <input type="submit" name="search" value="search"/>
          </form>
      </div>
    </div>
      <!--Navbar ends here-->

      <!--Content wrapper starts here-->
      <div class="content_wrapper">
        <div id="sidebar">
          <div id="sidebar_title">Categories</div>
          <ul id="cats">
            <!--
            <li><a href="#">Laptops</a></li>
            <li><a href="#">Computers</a></li>
            <li><a href="#">Mobiles</a></li>
            <li><a href="#">Cameras</a></li>
            <li><a href="#">iPads</a></li>
          -->
          <?php getCats(); ?>

          </ul>

          <div id="sidebar_title">Brands</div>
          <ul id="cats">
            <!--
            <li><a href="#">HP</a></li>
            <li><a href="#">DELL</a></li>
            <li><a href="#">APPLE</a></li>
            <li><a href="#">MOTOROLA</a></li>
            <li><a href="#">LG</a></li>
          -->
          <?php getBrands(); ?>

          </ul>

        </div>
        <div id="content_area">
          <?php cart('details') ?>
          <div id="shopping_cart">
            <span style="float:right; font-size:18px; padding:5px; line-height: 40px; ">Welcome Guest!
              <b style="color:yellow">Shopping Cart- </b>Total items:  Total Price: <a href="cart.php" style="color:lightgreen">Go to Cart</a>
            </span>

          </div>

            <div id="products_box">

              <?php
               echo isset($_GET['pro_id']);
                if(isset($_GET['pro_id'])){

                  $product_id = $_GET['pro_id'];

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
                          <a href='index.php?add_cart=$pro_id'><button style='float: right'>Add to Cart</button></a>
                          </div>
                     ";
                  }
                }

               ?>


        </div>
      </div>
    </div>
      <!--Contet wrapper ends here-->

      <div id="footer">
        <h2 style="text-align: center; padding-top: 30px;">&copy; 2018 by www.eezykart.com</h2>
      </div>



    </div>
    <!--Main Containers End here-->
  </body>
</html>

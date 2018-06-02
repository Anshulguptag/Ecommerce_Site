<!DOCTYPE html>
<?php
include("functions/functions.php") ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>India Mart</title>

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
          <li><a href="custmor/my_account.php">My Account</a></li>
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
          <?php cart('index') ?>
          <div id="shopping_cart">
            <span style="float:right; font-size:18px; padding:5px; line-height: 40px; ">Welcome Guest!
              <b style="color:yellow">Shopping Cart- </b>Total items: <?php total_items(); ?> Total Price: ₹ <?php total_price(); ?> <a href="cart.php" style="color:lightgreen">Go to Cart</a>
            </span>

          </div>
          <?php $ip=getIp(); ?>
            <div id="products_box">

            <form action="" method="post" enctype="multipart/form-data">
              <table align="center" width="700" bgcolor="skyblue">
                <tr align="center">
                  <td colspan="5"><h2>Update your cart or checkout</h2></td>
                </tr>

                <tr>
                  <th>Remove</th>
                  <th>Product(s)</th>
                  <th>Quantity</th>
                  <th>Total price</th>
                </tr>
                
        <?php 

          $total=0;
          global $con;
          $ip = getIp();
          $sel_price = "select * from cart where ip_add='$ip'";
          $run_price = mysqli_query($con, $sel_price);
          while($p_price=mysqli_fetch_array($run_price))
          {
            $pro_id = $p_price['p_id'];
            $pro_price = "select * from products where product_id='$pro_id'";
            $run_pro_price = mysqli_query($con, $pro_price);

            while($pp_price = mysqli_fetch_array($run_pro_price))
            {
              $product_price = array($pp_price['product_price']);
              $product_title = $pp_price['product_title'];
              $product_image = $pp_price['product_image'];
              $single_price = $pp_price['product_price'];
         
          

      ?> 
        <tr align="center">
          <td><input type="checkbox" name="remove[]"/></td>
          <td><?php echo $product_title; ?><br>
            <img src="admin_area/product_images/<?php echo $product_image?>" width="60" height="60"/> </td>
          <td><input type="text" size="3" name="qty"/></td>
          <td><?php echo '₹',$single_price ?></td>
        </tr>

        <?php }}?>
    </table>
  </form>

                  
        </div>
      </div>
    </div>
      <!--Contet wrapper ends here-->

      <div id="footer">
        <h2 style="text-align: center; padding-top: 30px;">&copy; 2018 by www.indiamart.me</h2>
      </div>



    </div>
    <!--Main Containers End here-->
  </body>
</html>

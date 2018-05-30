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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
  <div class="header">
        <ul id="head">  
          <li><a href="index.php">JOIN</a></li>
          <li><a href="all_products.php">SIGNIN</a></li>
          <li><a href="custmor/my_account.php">MAIL</a></li>
          <li><a href="#">TOTAL PRICE: ₹ <?php total_price(); ?></a></li>
          <li>
          <a href="#">
          <span class="glyphicon glyphicon-shopping-cart"><?php total_items(); ?></span>
          </a>
      </li>
        </ul>
<hr>
<h1 id="logo">fullcart.com</h1>
<div id="form">
          <form method="get" action="results.php" enctype="multipart/form-data">
            <input type="text" name="user_query" placeholder="Search a product" style="float: right; margin-right: 10px;"/>
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
     if(isset($_GET['cond']))
     {
      cart('index',$_GET['cond']);  
     }
      ?>
     <?php

                if(isset($_GET['search'])){

                $search_query = $_GET['user_query'];

                $get_pro = "select * from products where product_keywords like '%$search_query%'";

                $run_pro = mysqli_query($con, $get_pro);

                $count_keywords = mysqli_num_rows($run_pro);

                if($count_keywords==0){

                  echo"<h2 style='padding: 20px;'>There is no product in this category!</h2>";
                  exit();
                }


                while($row_pro=mysqli_fetch_array($run_pro)){
                  $pro_id = $row_pro['product_id'];
                  $pro_cat = $row_pro['product_cat'];
                  $pro_brand = $row_pro['product_brand'];
                  $pro_title = $row_pro['product_title'];
                  $pro_price = $row_pro['product_price'];
                  $pro_image = $row_pro['product_image'];

                   echo "
                      <div id='single_product'>
                        <h3>$pro_title</h3>
                        <img src='admin_area/product_images/$pro_image' width='180' height='180' />
                        <h3>₹ $pro_price</h3>
                        <a href='details.php?add_cart=$pro_id' style='float:left;'>Details</a>
              <a href='index.php?add_cart=$pro_id&cond=yes'>
              <button type='button' class='btn'>
          <span class='glyphicon glyphicon-shopping-cart'></span> Add to Cart
        </button>
        </a>
                        </div>
                   ";
                }
              }
            ?> 
       <div id="footer">
        <h2 style="text-align: center; padding-top: 30px; font-size:20px; ">FOLLOW US ON</h2>
        <a href="https://www.facebook.com/anshul.gupta.9480111" class="fa fa-facebook"></a>
        <a href="#" class="fa fa-twitter"></a>
        <a href="#" class="fa fa-google"></a>
    <a href="#" class="fa fa-linkedin"></a>
    <a href="https://www.instagram.com/i_am_a_gupta.97/?hl=en" class="fa fa-instagram"></a>
    
    <h2 style="text-align: center; padding-top: 30px; font-size:20px; ">&copy; 2018 fullcart</h2>
    <h4 style="text-align: center; font-size:20px; ">fullcart.com</h4>
        
      </div>
</body>
</html>
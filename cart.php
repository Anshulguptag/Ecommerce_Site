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
  <!--<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">-->
  <link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Handlee" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
  input[type=number]{
      width: 170px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      text-align: center;
      font-size: 18px;
  }
  </style>
</head>
<body>
  <div class="header">
        <ul id="head">  
          <li><a href="index.php">JOIN</a></li>
          <li><a href="all_products.php">SIGNIN</a></li>
          <li><a href="custmor/my_account.php">MAIL</a></li>
          <li><a href="#">TOTAL PRICE: ₹ <?php total_price(); ?></a></li>
          <li>
          <a href="cart.php">
          <span class="glyphicon glyphicon-shopping-cart" style="margin-right: 80px;margin-left: -15px;"><?php total_items(); ?></span>
          </a>
          </li>
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
          </div></li>
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
      <center><h2 style="font-size: 50px; font-family: 'Poiret One', cursive; border-bottom: 1px solid black;">
          <span class="glyphicon glyphicon-shopping-cart" style="margin-right: 10px;"></span>
          Your cart items</h2></center>
    
    <?php 
    global $con;
    $ip = getIp();
    $get_pro = "select * from cart where ip_add='$ip'";
    $run_pro = mysqli_query($con, $get_pro);    
      while($row_pro=mysqli_fetch_array($run_pro)){
        $product_id = $row_pro['p_id'];
        $quantity = $row_pro['qty'];
        $get_prod = "select * from products where product_id='$product_id'";
        $run_pro1 = mysqli_query($con, $get_prod);
        while($pro_row=mysqli_fetch_array($run_pro1))
          {
            
            $pro_id = $pro_row['product_id'];
            $pro_cat = $pro_row['product_cat'];
            $pro_brand = $pro_row['product_brand'];
            $pro_title = $pro_row['product_title'];
            $pro_price = $pro_row['product_price'];
            $pro_image = $pro_row['product_image'];
            $net_price = $quantity*$pro_price;
            echo "
            <div id='single_product'>
              <h3>$pro_title</h3>
              <img src='admin_area/product_images/$pro_image' width='300' height='300' />
              <h3 >₹ $net_price</h3>
              <!--<h3 style='text-align: center;'><span style='background-color: green; padding: 10px; color: white; text-align: center;'>+</span><span style='padding: 20px;'>$quantity</span><span style='background-color: red; padding: 11px; color: white; text-align: center;'>-</span></h3>-->
              <center><input id='items' type='number' value='$quantity' min='0' max='6'></center>

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
      <script>
        document.getElementById('items').onkeypress =
          function (e) {
            var ev = e || window.event;
            if(ev.charCode < 48 || ev.charCode > 57) {
              return false; // not a digit
            } else if(this.value * 10 + ev.charCode - 48 > this.max) {
               return false;
            } else {
               return true;
            }
          }
      </script>     

</body>
</html>
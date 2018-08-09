<?php 
session_start();
include("functions/functions.php") ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>

  <title>fullcart</title>
<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">    
  <link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
  <link rel="stylesheet" href="styles/style.css" media="all" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Exo" rel="stylesheet">
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
  .button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 16px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
}

  .button1 {
      background-color: white; 
      color: black; 
      border: 2px solid #4CAF50;
    }

  .button1:hover {
    background-color: #4CAF50;
    color: white;
  }
  #a1{
    text-decoration: none;
    color: black;    
  }

  #a1:hover{
    color: white;
  }

  #submit1{
    margin-top: 15px; 
    color: white;
    padding: 16px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
    background-color: white; 
    color: black; 
    border: 2px solid #008CBA;
  }

  #submit1:hover{
    background-color: #008CBA;
    color: white;
  }
  #submit2{
    margin-top: 15px; 
    color: white;
    padding: 16px 32px;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
    background-color: white; 
    color: black; 
    border: 2px solid #f44336;
  }
  #submit2:hover{
    background-color: #f44336;
    color: white;
  }
    h2{
        font-size: 50px; 
        font-family: 'Poiret One', cursive; 
        border-bottom: 1px solid black;
    }    
    table{
     width: 700px;   
    }
    @media screen and (max-width: 475px){
        h2{
            font-size: 40px;
        }
        
        h3{
            font-size: 15px;
        }
        
        img{
            height: 30px;
            width: 30px;
        }
        
        table{
            width: 420px;
        }
            input[type=number]
        {
           width: 70px; 
        }
        td{
            padding: 2px 2px;
        }
        #submit1{
            width: 50px;
        }
    }    
    </style>
</head>
<body>
  <div class="header">
        <ul id="head">  
          <li><a href="regester.php">JOIN</a></li>
          <li><a href="custmor/my_account.php">MAIL</a></li>
          <li><a href="#">TOTAL PRICE: ₹ <?php total_price(); ?></a></li>
          <li>
          <a href="cart.php">
          <span class="glyphicon glyphicon-shopping-cart" style="margin-right: -20px; margin-left: -10px;"><?php total_items(); ?></span>
          </a>
      </li>
      <li>
        <?php
        if(!isset($_SESSION['customer_email'])){
          echo "<a href='login_connection.php'>LOGIN</a>";
        }
        else{
         echo "<a href='Logout.php'>LOGOUT</a>"; 
        }
        ?>
       </li> 
        </ul>
          
<hr>
<h1 id="logo">fullcart.com</h1>
<div id="form">
          <form method="get" action="results.php" enctype="multipart/form-data">
            <input type="text" name="user_query" placeholder="Search a product" style="float: right; margin-top: 9px;"/>
            <input type="submit" name="search" value="search" style="float: right; margin-right: 5px; margin-top: 9px;"/>
          </form>
      </div>      
  <div class="menubar">
    
    <ul id="menu">
      <li><div class="dropdown" id="home">
        <button class="dropbtn" ><a href="index.php" style="text-decoration: none; color:black;" >HOME</a></button>
        
      </div>
      </li>
      <li><div class="dropdown" id="all">
        <button class="dropbtn"><a href="all_products.php" style="text-decoration: none; color:black;">ALL</a></button>
        
      </div>
      </li>
      <?php indigetCats(); ?>
      
    </ul>
  </div>
  <br>
  <div class="header_wrapper">
        <img id="banner" src="images/advertisement.gif"/>
     </div> 
      <center><h2>
          <span class="glyphicon glyphicon-shopping-cart" style="margin-right: 10px;"></span>
          Your cart items</h2></center>
          <form action="" method="post" enctype="multipart/form-data">
            <table align="center" >
              <tr align="center">
                <th><center><h3> Product(s)</h3></center></th>
                <th><center><h3>Quantity</h3></center></th>
                <th><center><h3>Total Price</h3></center></th>
              </tr>
              <?php 
                $total=0;
                  global $con;
                  $ip = getIp();
                  $sel_price = "select * from cart where ip_add='$ip'";
                  $run_price = mysqli_query($con, $sel_price);
                  if(mysqli_num_rows($run_price)>0)
                  {
                    $prod_id = array();
                  
                    while($p_price=mysqli_fetch_array($run_price))
                    {
                      $pro_id = $p_price['p_id'];
                      array_push($prod_id, $pro_id);
                      $qty = $p_price['qty'];
                      $pro_price = "select * from products where product_id='$pro_id'";
                      $run_pro_price = mysqli_query($con, $pro_price);

                      while($pp_price = mysqli_fetch_array($run_pro_price))
                      {
                        $product_price = array($pp_price['product_price']*$qty);
                        $product_title = $pp_price['product_title'];
                        $product_image = $pp_price['product_image'];
                        $single_price = $pp_price['product_price'];
                        $values = array_sum($product_price);
                        $total+=$values;
                 
               ?>     
              <tr align="center">

                <td><u><?php echo $product_title; ?></u><br>
                <img src="admin_area/product_images/<?php echo $product_image;?>" width="60" height="60"/>
                </td>
                <td><input type="number" name="quantity[]" value="<?php echo $qty ?>" min="0" max="6" /></td>
                <td><span style="font-size: 21px;">₹<?php echo $qty*$single_price ?></span></td>
              </tr>
              <?php
                  }
                  }  
              ?> 
              <tr align="center">
                <td><input type="submit" name="update_cart" value="Update cart" id="submit2"/></td>
                <td></td>
                <td><button class="button button1"><a href="checkout.php" id="a1">Checkout</a></button>   
            </table>
          </form> 
      <?php 
          
          $ip = getIp();
          $array_values = array_values($prod_id);
          if(isset($_POST['update_cart']))
          {
            $i=0;
            foreach($_POST['quantity'] as $quantity){
                if($quantity!=0)
                {  
                    if($quantity>6 || $quantity <0)
                    {
                        echo "<script>alert(Don't be oversmart)</script>";
                    }
                    else
                    {
                       $update_quant = "update cart set qty = '$quantity' where ip_add='$ip' AND p_id='$prod_id[$i]'";
                        mysqli_query($con, $update_quant);
                    }
                }
                else
                {
                  $update_quant = "delete from cart where ip_add='$ip' AND p_id='$prod_id[$i]'";
                  mysqli_query($con, $update_quant);
                
                }
                $i =$i+1;
                
              }
            echo "<script>window.open('cart.php','_self')</script>";  
          }
          if(isset($_POST['continue']))
          {
            echo "<script>window.open('index.php','_self')</script>";
          }
          
      }
          else{
      ?>
      <center><h2 style="font-size: px; font-family: 'Poiret One', cursive; ">No item is present :'(</h2></center>
      <?php
               }
      ?>         
    
    
    <div id="footer">
        <h2 style="text-align: center; padding-top: 30px; font-size:20px; color: #FFF; border-bottom: none;">FOLLOW US ON</h2>
        <a href="https://www.facebook.com/anshul.gupta.9480111" class="fa fa-facebook"></a>
        <a href="#" class="fa fa-twitter"></a>
        <a href="#" class="fa fa-google"></a>
    <a href="#" class="fa fa-linkedin"></a>
    <a href="https://www.instagram.com/i_am_a_gupta.97/?hl=en" class="fa fa-instagram"></a>
    
    <h2 style="text-align: center; padding-top: 30px; font-size:20px; color: #FFF;border-bottom: none;">&copy; 2018 fullcart</h2>
    <h4 style="text-align: center; font-size:20px; color: #FFF;">fullcart.com</h4>
        
      </div>
</body>
</html>
    
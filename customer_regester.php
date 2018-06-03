<!DOCTYPE html>
<?php 
session_start();
include("functions/functions.php") ?>
<?php include("includes/db.php") ?>
<html lang="en" dir="ltr">
<head>

  <title>fullcart</title>
  <link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Exo" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Handlee" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <style>
  #uname, #country, #city, input[type=number], input[type=file], input[type=email], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
  }

  #new_reg{
    font-size: 20px;

  }
  #one {
      background-color: #4CAF50;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 100%;
  }

  #one:hover {
      opacity: 0.8;
  }

  .cancelbtn {
      width: auto;
      padding: 10px 18px;
      background-color: #f44336;
      color: #FFF;
  }


  .container {
      padding: 16px;
  }

  span.psw {
      float: right;
      padding-top: 7px;
  }

  /* Change styles for span and cancel button on extra small screens */
  @media screen and (max-width: 300px) {
      span.psw {
         display: block;
         float: none;
      }
      .cancelbtn {
         width: 100%;
      }
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
          <span class="glyphicon glyphicon-shopping-cart" ><?php total_items(); ?></span>
          </a>
      </li>
        </ul>
<hr>
<h1 id="logo">fullcart.com</h1>
<div id="form">
          <form method="get" action="results.php" enctype="multipart/form-data">
            <input type="text" name="user_query" placeholder="Search a product" style="float: right; margin-top: 20px;"/>
            <input type="submit" name="search" value="search" style="float: right; margin-right: 5px; margin-top: 20px;"/>
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
    <form action="customer_regester.php" method="post" enctype="multipart/form-data">
  
  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input id="uname" type="text" placeholder="Enter username" name="uname" required>

    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="email" required>
        
    <label for="pass"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="pass" required>
    
    <label for="Add"><b>Address</b></label>
    <br>
    <textarea name="c_address" cols="120" rows="10"></textarea>

    <br>
    <label for="country"><b>Country</b></label>
    <select id="country" name="country" required>
    <option value="Select Country">Select Country</option>
    <option value="India">India</option>
    <option value="Australia">Australia</option>
    <option value="USA">USA</option>
    <option value="Canada">Canada</option>
    </select>

    <label for="city"><b>City</b></label>
    <select id="city" name="city" required>
    <option value="Select City">Select City</option>
    <option value="Delhi">Delhi</option>
    <option value="Banglore">Banglore</option>
    <option value="Mumbai">Mumbai</option>
    <option value="Chennai">Chennai</option>
    </select>

    <label for="c_number"><b>Contact Number</b></label>
    <input type="number" placeholder="Enter Contact number" name="c_number" required>
    
    <label for="c_image"><b>Profile Image</b></label>
    <input type="file" name="c_image" required>
    
    <button id="one" type="submit" name="regester">Create Account</button>
    
  </div>

  
</form>

     <div id="footer">
        <h2 style="text-align: center; padding-top: 30px; font-size:20px; color: #FFF; ">FOLLOW US ON</h2>
        <a href="https://www.facebook.com/anshul.gupta.9480111" class="fa fa-facebook"></a>
        <a href="#" class="fa fa-twitter"></a>
        <a href="#" class="fa fa-google"></a>
    <a href="#" class="fa fa-linkedin"></a>
    <a href="https://www.instagram.com/i_am_a_gupta.97/?hl=en" class="fa fa-instagram"></a>
    
    <h2 style="text-align: center; padding-top: 30px; font-size:20px; color: #FFF;">&copy; 2018 fullcart</h2>
    <h4 style="text-align: center; font-size:20px; color: #FFF;">fullcart.com</h4>
        
      </div>
</body>
</html>

<?php
  global $con;
  if(isset($_POST['regester']))
  {
    $ip = getIp();
    $c_name = $_POST['uname'];
    $c_email = $_POST['email'];
    $c_password = $_POST['pass'];
    $c_country = $_POST['country'];
    $c_city = $_POST['city'];
    $c_number = $_POST['c_number'];
    $c_image = $_FILES['c_image']['name'];
    $c_image_temp = $_FILES['c_image']['tmp_name'];
    $c_addr = $_POST['c_addr'];

    move_uploaded_file($c_image_temp,"customer/customer_images/$c_image");

    $insert_c = "insert into customers (customer_ip, customer_name, customer_email, customer_pass, customer_country, customer_city, customer_contact, customer_image, customer_addr) values ('$ip','$c_name','$c_email','$c_password','$c_country','$c_city','$c_number','$c_image', '$c_addr')";

    $run_c = mysqli_query($con, $insert_c);

    $sel_cart = "select * from cart where ip_add='$ip'";

    $run_cart = mysqli_query($con, $sel_cart);

    $check_cart = mysqli_num_rows($run_cart);

    if($check_cart==0){
      $_SESSION['customer_email'] = $c_email;
      echo "<script>alert('Account has been created successfully, Thanks!')</script>";
      echo "<script>window.open('customer/my_account.php','_self')</script>";
    }
    else{
      $_SESSION['customer_email'] = $c_email;
      echo "<script>alert('Account has been created successfully, Thanks!')</script>";
      echo "<script>window.open('checkout.php','_self')</script>";
    }
  }

?>
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include("includes/db.php");
require_once 'vendor/autoload.php';
include("functions/functions.php");
use Twilio\Rest\Client;
?>
<!DOCTYPE html>
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
<style>
.card{
    background-color: #ae275f;
    #position: absolute;
    border-radius: 2%;
    margin-left: 400px;
    margin: auto;
    width: 35%;
    margin-top: 10px;
    }    
#master {
    width: 20%;
    margin-top: -70px;  
    margin-left: 370px;    
    height: auto;
}  

#one
    {
        margin-left: 570px;
        width: 200px;
    }
#cardno{
    border-radius: 4px;
    height: 30px;
    margin-left: 15px;
    width: 90%;
}
input[type=date]
    {
    border-radius: 4px;
    height: 30px;
    margin-top: 30px;
    margin-left: 15px;
    width: 20%;
}
    
#axis
    {
    width: 40%;
    height: 40%;
    margin-left: 27px;        
    }
#cardname{
    border-radius: 4px;
    height: 29px;
    margin-top: 19px;
    margin-left: 15px;
    width: 60%;
}
#cvv{
  border-radius: 4px;
    height: 30px;
    margin-top: 30px;
    margin-left: 15px;
    width: 20%;      
    }
h2{
    font-size: 50px; 
    font-family: 'Poiret One', cursive; 
    }
    
input[type=number] {
    width: 700px;
    padding: 12px 20px;
    margin-left: 300px;
    box-sizing: border-box;
    border: 3px solid #ccc;
    -webkit-transition: 0.5s;
    transition: 0.5s;
    outline: none;
}

input[type=text]:focus {
    border: 3px solid #555;
}    
    
img{  
   border-radius: 150px;    
}

#fname{
    margin-top: 20px;   
    }    
@media screen and (max-width: 900px) {
    .card{
        width: 100%;
            
        }
    h2{
            font-size: 40px;
        }
    #master {
        width: 15%;
        }
    
    #one{
        width: 50%;
        margin-left: 100px;
        }
    
    #cardno{
        width: 90%;
        }
    
    input[type=date]{
        width: 30%;
        }
    
    #axis
        {
        width: 20%;
        }
    #cardname{
        width: 50%;
        
        margin-bottom: 10px;
        }
    
    #cvv{
        width: 30%;      
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
        <button class="dropbtn"><a href="index.php" style="text-decoration: none; color:black;" >HOME</a></button>
        
      </div>
      </li>
      <li><div class="dropdown" id="all">
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
      if(strcmp($_GET['payment_opt'],"Debit card")==0) 
            {   
                
        ?>       
      <center><h2>Enter Card Details</h2></center>
      
      <form method='post' action='#S'> 
          
          <div class='card'>
    
              <img id='axis' src='creditcard/axis.png'>    
              <input id='cardno' type='number' maxlength='16' minlength='16' placeholder="Enter 16 digit card no." required='required' name='cardno'>
              <input type='date' placeholder='Enter Expiry date' required='required' name='date'>
              <input type='text' id='cvv' placeholder='CVV'maxlength='3' minlength='3' required='required' name='cvv'>
              <input id ='cardname' type='text' placeholder='Enter cardholder name' required='required' name='cardname'>    
              <img id='master' src='creditcard/visa.jpg'>
          </div>
          <button id="one" type="submit" name="login1">Make Payment</button>
      </form>    
      <?php
        }
      else
      {
      ?>
      <center><h2>Enter Account Number</h2></center>
      <center><img src="images/animated-4.gif"></center>
        <form method='post' action='#'>    
        <input type="number" id="fname" name="acc_no" placeholder="Enter Account Number" required='required'>
        <button id="one"  type="submit" name="login">Make Payment</button>
      </form>    
      <?php 
      }
      ?>
      
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
    </div>  
<?php
if(isset($_POST['login1']))
{
$cardno = $_POST['cardno'];
$date = $_POST['date'];
$cardname = $_POST['cardname'];
$cvv = $_POST['cvv'];

$sel_acc = "select * from bank where card_no='$cardno' and cvv='$cvv'";
    
$run_acc = mysqli_query($con, $sel_acc);

$check_account = mysqli_num_rows($run_acc);

$cart_amount = $_SESSION['total_amount'];    
if($check_account==0)
{
    echo "<script>alert('Their is no account is exist ');</script>";
}
else
{
    while($row_acc_pro=mysqli_fetch_array($run_acc)){
    $amount = $row_acc_pro['amount'];
    #echo $row_acc_pro['expirey_date'];
    #echo $date;    
    if($amount<$cart_amount)
    {
        echo "<script>alert('Insufficient balance')</script>";
    }
    
        else
        {
            $c_email = $_SESSION['customer_email'];
            $sel_number = "select customer_contact from customers where customer_email='$c_email'";
            $run_c = mysqli_query($con, $sel_number);
            $check_customer = mysqli_num_rows($run_c);
            while($row_c=mysqli_fetch_array($run_c))
            {
                $ph_no = $row_c['customer_contact'];
            }
            $_SESSION['ph_no'] = $ph_no;
            $_SESSION['card_no'] = $row_acc_pro['card_no'];
            $price = $_SESSION['total_amount'];
            $card_end = substr($row_acc_pro['card_no'],11,16);
            $otp = mt_rand(100000,1000000);
            $sid    = "ACced0da76ef275f87500dada44eb59ef8";
            $token  = "14a8f581749c107cef7b64a98ba66390";
            $twilio = new Client($sid, $token);
            $message = $twilio->messages    
                            ->create("+91$ph_no",
                                        array(
                                            "body" => "$otp is the OTP of trxn of INR $price at fullcart with your AXIS card ending $card_end.OTP is valid for 10 mins only. Pls do not share with anyone.",
                                            "from" => "+15392081150"
                                        )
                                );
            $_SESSION['cotp']=$otp;
                echo "<script>window.open('trans_otp.php','_self')</script>";
        }    
}
}
}
if(isset($_POST['login']))
{
    $acc_no = $_POST['acc_no'];
    $sel_acc = "select * from bank where acc_no='$acc_no'";
    
    $run_acc = mysqli_query($con, $sel_acc);

    $check_account = mysqli_num_rows($run_acc);

    $cart_amount = $_SESSION['total_amount'];    
    if($check_account==0)
    {
    echo "<script>alert('Their is no account is exist ');</script>";
    }
    else
    {
        while($row_acc_pro=mysqli_fetch_array($run_acc)){
        $amount = $row_acc_pro['amount'];
        #echo $row_acc_pro['expirey_date'];
        #echo $date;    
        if($amount<$cart_amount)
        {
            echo "<script>alert('Insufficient balance')</script>";
        }
        else
        {
            $c_email = $_SESSION['customer_email'];
            $sel_number = "select customer_contact from customers where customer_email='$c_email'";
            $run_c = mysqli_query($con, $sel_number);
            $check_customer = mysqli_num_rows($run_c);
            while($row_c=mysqli_fetch_array($run_c))
            {
                $ph_no = $row_c['customer_contact'];
            }
            $_SESSION['ph_no'] = $ph_no;
            $_SESSION['card_no'] = $row_acc_pro['card_no'];
            $price = $_SESSION['total_amount'];
            $card_end = substr($row_acc_pro['card_no'],11,16);
            $otp = mt_rand(100000,1000000);
            $sid    = "ACced0da76ef275f87500dada44eb59ef8";
            $token  = "14a8f581749c107cef7b64a98ba66390";
            $twilio = new Client($sid, $token);
            $message = $twilio->messages    
                            ->create("+91$ph_no",
                                        array(
                                            "body" => "$otp is the OTP of trxn of INR $price at fullcart with your AXIS card ending $card_end.OTP is valid for 10 mins only. Pls do not share with anyone.",
                                            "from" => "+15392081150"
                                        )
                                );
            $_SESSION['cotp']=$otp;
                echo "<script>window.open('trans_otp.php','_self')</script>";
        }
    }
}
}
?>
</body>
</html>

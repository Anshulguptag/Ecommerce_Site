<?php 
session_start();
include("functions/functions.php") ?>
<html>
    <head>
        <title></title>
        <link href="https://fonts.googleapis.com/css?family=Kotta+One" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Arimo" rel="stylesheet">    
        <style>
            h2
            {
                margin-left: 450px; 
                margin-top: 100px;
                font-size: 30px;
            }
            img
            {
                height: 80px;
                width: 180px;
                margin-top: -100px;
                margin-left: 720px;
            }
            button
            {
                background-color: blueviolet;
                color: white;
            }
        </style>
    </head>
    <body>
        <?php echo $_SESSION['cotp']; ?>
        <h2 style="font-family: 'Kotta One', serif;"><span style="color: maroon;">MasterCard</span><br><span style="color: orange;">SecureCode</span></h2>
        <img src="creditcard/axis.png">
        <h3 style="margin-left: 450px; font-family: 'Montserrat', sans-serif;">Enter OTP</h3>
        <p style="margin-left: 450px; font-size: 17px; font-family: 'Arimo', sans-serif;">The One Time Password has been sent to the below <br>registered mobile number.Please use the password and<br> authenticate transaction.</p>
        <p style="margin-left: 530px; font-size: 18px;"><span style="color:#000080; margin-left:3px;"><b>Mobile Number:</b></span>  xxxxxx<?php echo substr($_SESSION['ph_no'],6); ?> 
            <br>
            <span style="color: #af7f29"><b>Merchant Name:</b></span> fullcart
            <br>
            <span style="color: #000080; margin-left: 90px;"><b>Date:</b></span> <?php echo date("d-m-Y"); ?>
            <br>
            <span style="color: #000080; margin-left: 30px;"><b>Total charge:</b></span> ₹<?php total_price(); ?>.00
            <br>
            <span style="color: #000080; margin-left: 18px;"><b>Card Number:</b></span> <?php echo substr($_SESSION['card_no'],0,4); ?> xxxx xxxx
            <?php echo substr($_SESSION['card_no'],11,16); ?>
            <br>
            <span style="color: #000080; margin-left: -12px;"><b>Personal Greeting:</b></span> <span style="color: maroon"><b>Axis Bank</b></span>
            <form action='#' method='post'>
               <span style="color: #000080; margin-left: 625px;"><b>OTP:</b></span> <input type="number" name="otp" min="0" max="999999" >
                <br>
                <br>
                <button  type="submit" name="next" style=" margin-left: 590px;">Submit</button>
                
                <button  type="submit" name="next" style=" margin-left: 40px;">Cancel</button>

            </form>
        
        
    </body>
</html>
<?php
if(isset($_POST["next"])){
    $otp=$_SESSION['cotp'];
    $c_otp = $_POST['otp'];
    if($otp != $c_otp)
    {
        echo "<script>alert('Wrong OTP')</script>";
    }
    else
    {
        $card_no = $_SESSION['card_no'];
        $sel_price = "select amount from bank where card_no='$card_no'";
        $run_c = mysqli_query($con, $sel_price);  
        while($row_c=mysqli_fetch_array($run_c))
        {
           $price = $row_c['amount'];
        }
        $ip = getIp();
        $shop_price = $_SESSION['total_amount'];
        $net_amount = $price - $shop_price;
        $update_price = "update bank set amount = '$net_amount' where card_no='$card_no'";
        mysqli_query($con, $update_price);
        $update_quant = "delete from cart where ip_add='$ip'";
        mysqli_query($con, $update_quant);
        echo "<script>alert('Transaction has been done')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }
}
       
?>

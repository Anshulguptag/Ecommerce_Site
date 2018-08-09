<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include("includes/db.php");
require_once 'vendor/autoload.php';
use Twilio\Rest\Client;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V6</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
    
  <link rel="stylesheet" href="styles/style.css" media="all" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">
  </head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-85 p-b-20">    
                    <form class="login100-form validate-form" action="forgotPassword.php" method="post">
					<center><h1 id="logo">fullcart.com</h1></center>
				
                    <div class="wrap-input100 validate-input m-t-85 m-b-35" data-validate = "Enter email">
						<input class="input100" type="text" name="email">
						<span class="focus-input100" data-placeholder="Enter email"></span>
					</div>
                    
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="next">
							Next
						</button>
					</div>
                    
                    <ul class="login-more p-t-190">
						<li class="m-b-8">
							<span class="txt1">
								
							</span>

							<a href="#" class="txt2">
								
							</a>
						</li>

						<li>
							<span class="txt1">
								
							</span>

							<a href="regester.php" class="txt2">
								
							</a>
						</li>
					</ul>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
<?php
 if(isset($_POST["next"]))
  {
    global $con;  
    $c_email = $_POST['email'];
    $sel_number = "select customer_contact from customers where customer_email='$c_email'";
    $run_c = mysqli_query($con, $sel_number);
    $check_customer = mysqli_num_rows($run_c);

    if($check_customer==0)
    {
        echo "<script>alert('Email id is incorect, plz try again!')</script>";
        echo "<script>window.open('forgotPassword.php','_self')</script>";
    }
    else
    {
        $otp = mt_rand(100000,1000000);
        $sid    = "ACced0da76ef275f87500dada44eb59ef8";
        $token  = "14a8f581749c107cef7b64a98ba66390";
        $twilio = new Client($sid, $token);
        $_SESSION['email'] = $_POST['email'];
        while($row_c=mysqli_fetch_array($run_c))
        {
           $ph_no = $row_c['customer_contact'];
        }
        $message = $twilio->messages    
                        ->create("+91$ph_no",
                                    array(
                                        "body" => "Your OTP is: $otp",
                                        "from" => "+15392081150"
                                    )
                            );
        echo "<script>alert('OTP is sent to the register mobile number.!')</script>";
        $_SESSION['cotp']=$otp;
        echo "<script>window.open('verify_otp.php','_self')</script>";
        
    }
    

 }
    
?>
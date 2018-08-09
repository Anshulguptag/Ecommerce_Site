<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include("includes/db.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}

#email, input[type=password] {
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

.imgcontainer {
    text-align: center;
    width: 40%;
    margin: 24px 0 12px 0;
}

img.avatar {
    width: 40%;
    margin-left: 550px;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 7px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 475px) {
    .imgcontainer{
        margin-left: -350px;
    }
}
</style>
</head>
<body>

<h2>Login</h2>

<form action="login.php" method="post">
  <div class="imgcontainer">
    <img src="images/img_avatar2.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="email"><b>Email</b></label>
    <input id="email" type="email" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
        
    <button id="one" type="submit" name="login">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <a href="customer_regester.php" style="text-decoration: none;"><span id="new_reg">New? Register Here</span></a>
    <span class="psw">Forgot <a href="forgotPassword.php">password?</a></span>
  </div>
</form>

</body>
</html>
<?php

  if(isset($_POST["login"]))
  {
    $c_email = $_POST['email'];
    $c_pass = $_POST['psw'];
    $sel_c = "select * from customers where customer_pass='$c_pass' AND customer_email='$c_email'";
    
    $run_c = mysqli_query($con, $sel_c);

    $check_customer = mysqli_num_rows($run_c);

    if($check_customer==0)
    {
      echo "<script>alert('Password or Email is incorect, plz try again!')</script>";
      exit();
    }
    include("functions/functions.php");
    $ip = getIp();
      
    $sel_cart = "select * from cart where ip_add='$ip'";

    $run_cart = mysqli_query($con, $sel_cart);

    $check_cart = mysqli_num_rows($run_cart);

    if($check_customer>0 AND $check_cart==0)
    {
      $_SESSION['customer_email'] = $c_email;
      echo "<script>alert('You Logged in successfully, Thanks!')</script>";
      echo "<script>window.open('index.php','_self')</script>";
    }
    else{
      $_SESSION['customer_email'] = $c_email;
      echo "<script>alert('You Logged in successfully, Thanks!')</script>";
      echo "<script>window.open('index.php','_self')</script>";

    }

  }


?>
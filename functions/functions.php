<!DOCTYPE html>
<html>
<head>
  <title></title>
  <title>India Mart</title>
  <link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
  <link rel="stylesheet" href="styles/style.css" media="all" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Exo" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Handlee" rel="stylesheet">
  
</head>
<body>
<?php
$con = mysqli_connect("localhost","root","","ecommerce");
if(mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: ".mysqli_connect_errno();
}
function getIp()
{
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
          $ip = $_SERVER['HTTP_CLIENT_IP'];
      } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
          $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
      } else {
          $ip = $_SERVER['REMOTE_ADDR'];
      }
      return $ip;
}
function cart($request,$cond)
{
  if($cond=='yes')
   {
    if(isset($_GET['add_cart']))
    {
      global $con;
       $pro_id = $_GET['add_cart'];
       $ip = getIp();
       $check_prod = "select * from products where product_id='$pro_id'";
       $run_check1 = mysqli_query($con, $check_prod);
       if(mysqli_num_rows($run_check1)>0)
       {
        $check_pro = "select * from cart where ip_add='$ip' AND p_id='$pro_id'";
       $run_check = mysqli_query($con, $check_pro);
       if(mysqli_num_rows($run_check)>0){
         $check_qty =  "select qty from cart where ip_add='$ip' AND p_id='$pro_id'";
         $qty = mysqli_query($con, $check_qty);
         while ($row = $qty->fetch_assoc()) {
            $temp = $row['qty']+1;
            $update_quant = "update cart set qty = '$temp' where ip_add='$ip' AND p_id='$pro_id'";
            mysqli_query($con, $update_quant);
            
        }
        echo"<script>window.open('$request.php?add_cart=$pro_id&cond=No','_self')</script>";
       }

      else{
        $insert_pro = "insert into cart (p_id,ip_add,qty) values ('$pro_id','$ip','1')";
        $run_pro = mysqli_query($con, $insert_pro);
        echo $run_pro;
        if($run_pro)
          {
            //echo "<script>alert('Product Insert Successfully!')</script>";
            echo"<script>window.open('$request.php?add_cart=$pro_id&cond=No','_self')</script>";
          }
        }
        
       } 
       
    }
  }
}


function total_items(){
  global $con;
  $total_items=0;
  if(isset($_GET['add_cart'])){
    $ip=getIp();
    $get_items = "select qty from cart where ip_add='$ip'";
    $run_items = mysqli_query($con, $get_items);
    while($row_items_pro=mysqli_fetch_array($run_items)){
        $total_items+=$row_items_pro['qty'];

     } 
    //$count_items = mysqli_num_rows($run_items);
  }
    else{
      $ip=getIp();
      $get_items = "select qty from cart where ip_add='$ip'";
      $run_items = mysqli_query($con, $get_items);
      while($row_items_pro=mysqli_fetch_array($run_items)){
        $total_items+=$row_items_pro['qty'];

     } 
    
    }
    echo $total_items;
}

function total_price(){
$total=0;
global $con;
$ip = getIp();
$sel_price = "select * from cart where ip_add='$ip'";
$run_price = mysqli_query($con, $sel_price);
while($p_price=mysqli_fetch_array($run_price))
{
  $pro_id = $p_price['p_id'];
  $qty = $p_price['qty'];
  $pro_price = "select * from products where product_id='$pro_id'";
  $run_pro_price = mysqli_query($con, $pro_price);

  while($pp_price = mysqli_fetch_array($run_pro_price))
  {
    $product_price = array($pp_price['product_price']*$qty);
    $values = array_sum($product_price);

    $total+=$values;
  }
}    
echo $total;
$_SESSION['total_amount'] = $total;    
}
//getting the categories

function getCats()
{
  global $con;

  $get_cats = "select * from categories";

  $run_cats = mysqli_query($con, $get_cats);

  while($row_cats=mysqli_fetch_array($run_cats)){
    $cat_id = $row_cats['cat_id'];
    $cat_title = $row_cats['cat_title'];

    echo "<a href='index.php?cat=$cat_id'>$cat_title</a>";

  }
}

function indigetCats()
{
  global $con;
  $get_cats = "select * from categories";

  $run_cats = mysqli_query($con, $get_cats);

  while($row_cats=mysqli_fetch_array($run_cats)){
    $cat_id = $row_cats['cat_id'];
    $cat_title = $row_cats['cat_title'];
    $cat_title = strtoupper($cat_title);
    echo "
    <li>
      <div class='dropdown'>
        <button class='dropbtn'>
        <a href='#?cat=$cat_id' style='text-decoration: none; color: black; margin-left: 10px;'>$cat_title</a>
        </button>
        <div class='dropdown-content'>
        ";
        $get_cat_pro = "select * from products where product_cat='$cat_id'";
        $run_cat_pro = mysqli_query($con, $get_cat_pro);
        $count_cats = mysqli_num_rows($run_cat_pro);
        if($count_cats==0){
              echo"<a href='#'>There is no product in this category!</a>";
        }
         $a=[];
   
        while($row_cat_pro=mysqli_fetch_array($run_cat_pro)){
          $pro_brand = $row_cat_pro['product_brand'];
          $get_brand = "select brand_title from brands where brand_id='$pro_brand'";

          $run_brands = mysqli_query($con, $get_brand);
          while($row_brands=mysqli_fetch_array($run_brands)){
            $brand_name = $row_brands['brand_title'];
              if(in_array($brand_name, $a)==False)
              {
                echo "<a href='index.php?cat=$cat_id&brand=$pro_brand'>$brand_name</a>";
                array_push($a, $brand_name);  
              }
              
            }
          } 
      "
          </div>
        </div>
      </li>
      ";
  }
}

function getBrands()
{
  global $con;

  $get_brands = "select * from brands";

  $run_brands = mysqli_query($con, $get_brands);

  while($row_brands=mysqli_fetch_array($run_brands)){
    $brand_id = $row_brands['brand_id'];
    $brand_title = $row_brands['brand_title'];

    echo "<li><a href='index.php?brand=$brand_id'>$brand_title</a></li>";

  }
}

function getPro()
{
  if(!isset($_GET['cat']))
  {
    if(!isset($_GET['brand']))
    {
      global $con;

      $get_pro = "select * from products order by RAND() LIMIT 0,6";

      $run_pro = mysqli_query($con, $get_pro);

      while($row_pro=mysqli_fetch_array($run_pro)){
        $pro_id = $row_pro['product_id'];
        $pro_cat = $row_pro['product_cat'];
        $pro_brand = $row_pro['product_brand'];
        $pro_title = $row_pro['product_title'];
        $pro_price = $row_pro['product_price'];
        $pro_image = $row_pro['product_image'];
        
        $ip = getIp();
        $check_pro = "select * from cart where ip_add='$ip' AND p_id='$pro_id'";
        $run_check = mysqli_query($con, $check_pro);
        
      echo "
            <div id='single_product'>
              <h3>$pro_title</h3>
              <img src='admin_area/product_images/$pro_image' width='300' height='300' />
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
}
}

function getCatPro()
{
  if(isset($_GET['cat']))
  {
    $cat_id = $_GET['cat'];
    $pro_brand = $_GET['brand'];
  global $con;

  $get_cat_pro = "select * from products where product_cat='$cat_id' and product_brand='$pro_brand'";

  $run_cat_pro = mysqli_query($con, $get_cat_pro);

  $count_cats = mysqli_num_rows($run_cat_pro);

  if($count_cats==0){

    echo"<h2 style='padding: 20px;'>There is no product in this category!</h2>";
    exit();
  }


  while($row_cat_pro=mysqli_fetch_array($run_cat_pro)){
    $pro_id = $row_cat_pro['product_id'];
    $pro_cat = $row_cat_pro['product_cat'];
    $pro_brand = $row_cat_pro['product_brand'];
    $pro_title = $row_cat_pro['product_title'];
    $pro_price = $row_cat_pro['product_price'];
    $pro_image = $row_cat_pro['product_image'];


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
}
function getBrandPro()
{
  if(isset($_GET['brand']))
  {
    $brand_id = $_GET['brand'];

  global $con;

  $get_brand_pro = "select * from products where product_brand='$brand_id'";

  $run_brand_pro = mysqli_query($con, $get_brand_pro);

  $count_brands = mysqli_num_rows($run_brand_pro);

  if($count_brands==0){

    echo"<h2 style='padding: 20px;'>There is no product in this category!</h2>";
    exit();
  }


  while($row_brands_pro=mysqli_fetch_array($run_brand_pro)){
    $pro_id = $row_brands_pro['product_id'];
    $pro_cat = $row_brands_pro['product_cat'];
    $pro_brand = $row_brands_pro['product_brand'];
    $pro_title = $row_brands_pro['product_title'];
    $pro_price = $row_brands_pro['product_price'];
    $pro_image = $row_brands_pro['product_image'];


     echo "
        <div id='single_product'>
          <h3>$pro_title</h3>
          <img src='admin_area/product_images/$pro_image' width='180' height='180' />
          <h3>₹ $pro_price</h3>
          <a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
          <a href='index.php?add_cart=$pro_id'>
              <button type='button' class='btn'>
          <span class='glyphicon glyphicon-shopping-cart'></span> Add to Cart
        </button>
        </a>
          </div>
     ";

}
}
}
?>
</body>
</html>

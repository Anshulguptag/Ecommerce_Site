<?php 
session_start();
include("functions/functions.php") ?>
<?php include("includes/db.php"); 
?>
<!DOCTYPE html>
<html>
<head>
<style>
.card{
    background-color: #ae275f;
    border-radius: 2%;
    margin-left: 400px;
    margin: auto;
    height: 40%;
    width: 35%;
    margin-top: 50px;
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
    font-size: 20px;
}
#e_date    
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
    margin-left: 15px;        
    }
#cardname{
    border-radius: 4px;
    height: 29px;
    margin-top: 19px;
    margin-left: 15px;
    width: 60%;
}
h2{
    font-size: 50px; 
    font-family: 'Poiret One', cursive; 
    }    

#acc
    {
    width: 45%;
    padding: 12px 20px;
    margin-left: 380px;
    margin-top: 30px;
    font-size: 50px;    
    display: inline-block;
    border: 0px solid #ccc;
    box-sizing: border-box;
    }
    
#cvv{
    border-radius: 4px;
    height: 30px;
    margin-top: 30px;
    margin-left: 15px;
    width: 20%;      
    }  
@media screen and (max-width: 900px) {
    .card{
        width: 100%;
            
        }
    h2{
            font-size: 30px;
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
    #acc
    {
        width: 430px;
        margin-left: 10px;
        font-size: 30px;
    }
    #one{
        width: 50%;
        margin-left: 100px;
        }
    

}         
</style>
</head>
<body>
<center><h2 >
          Congratulation! Your account has been opened.</h2></center>

    
<?php
    if($_GET['from']=='register')
    {
     echo "<form method='post' action='index.php'>";   
    }
    else
    {
        echo "<form method='post' action='checkout.php'>";
    }
?>    
    
<div class='card'>
    
<img id='axis' src='creditcard/axis.png'>    
<br>
<?php 
$card_no= $_SESSION['card_no']; 
$cvv = $_SESSION['cvv'];
$e_date = $_SESSION['e_date'];    
$h_name = $_SESSION['h_name'];    
echo " <input id='cardno' type='number' maxlength='16' minlength='16' placeholder='$card_no' required='required' disabled>" ;  
echo "<input id='e_date' type='text' placeholder='$e_date' required='required' disabled>";
echo "<input type='text' id='cvv' placeholder='$cvv' required='required' disabled>";
echo "<input id ='cardname' type='text' placeholder='$h_name' required='required' disabled>";    
?>    
<img id='master' src='creditcard/visa.jpg'>
</div>
<?php
    $acc_no = $_SESSION['acc_no'];
    echo "
    <input id='acc' type='text' placeholder='Account No: $acc_no' name='pass' disabled></center>";
?>
<button id='one' type='submit' name='login'>Continue</button>
</form>    
</body>
</html>
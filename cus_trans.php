<?php
include "conn.php";
$rname=0;
$amount=0;
$GLOBALS['sbal']=0;
$GLOBALS['name']=" ";
$GLOBALS['email']=" ";

$sbal=0;

$rbal=0;
$cid=$_GET['cid'];
$q3="SELECT * FROM customer where cid=$cid";
$r3=mysqli_query($conn,$q3);
while($qr3 = mysqli_fetch_array($r3)){
  $sbal=$qr3['balance'];
  $GLOBALS['sbal']=$qr3['balance'];
  $GLOBALS['name']=$qr3['name'];
  $GLOBALS['email']=$qr3['email'];
 
    }
if(isset($_POST['submit']))
{
    $rname=$_POST['customer'];
    $amount=$_POST['val'];
    if($amount< $GLOBALS['sbal']){
      echo "<script type='text/javascript'>alert('insufficient Balance');</script>";
    }
     //echo $rname;
     //echo $amount;
     $q2="SELECT * FROM customer where cid=$rname";
$r2=mysqli_query($conn,$q2);
while($qr2 = mysqli_fetch_array($r2)){
  $rbal=$qr2['balance'];
    }
  
        mysqli_query($conn,"START TRANSACTION");
      //  echo "sbalance ".$sbal;
       // echo "rbalance ".$rbal;
        $rbal=$rbal+$amount;
$sbal=$sbal-$amount;
        $a1 = mysqli_query($conn,"UPDATE customer SET balance=$sbal WHERE cid=$cid");
        $a2 = mysqli_query($conn,"UPDATE customer SET balance=$rbal WHERE cid=$rname");
        $a3 = mysqli_query($conn,"INSERT INTO trans(sname,rname,amount) VALUES($cid,$rname,$amount)");

        
        if ($a1 and $a2 and $a3) {

            mysqli_query($conn,"COMMIT");
            header("location: succ.php");
exit;
        } else {        
          echo "can";
            mysqli_query($conn,"ROLLBACK");
        }
 

}


//echo "sbalance at ".$sbal;
//echo "rbalance at".$rbal;






?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
  <style>
  
  .payment-form{
	padding-bottom: 10px;
	font-family: 'Montserrat', sans-serif;
}

.payment-form.dark{
	background-color:#cedeeb ;
}

.payment-form .content{
	box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
	background-color: white;
}

.payment-form .block-heading{
    padding-top: 50px;
    margin-bottom: 40px;
    text-align: center;
}

.payment-form .block-heading p{
	text-align: center;
	max-width: 420px;
	margin: auto;
	opacity:0.7;
}

.payment-form.dark .block-heading p{
	opacity:0.8;
}

.payment-form .block-heading h1,
.payment-form .block-heading h2,
.payment-form .block-heading h3 {
	margin-bottom:1.2rem;
	color: #3b99e0;
}

.payment-form form{
	border-top: 2px solid #5ea4f3;
	box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
	background-color: #ffffff;
	padding: 0;
	max-width: 600px;
	margin: auto;
}

.payment-form .title{
	font-size: 1em;
	border-bottom: 1px solid rgba(0,0,0,0.1);
	margin-bottom: 0.8em;
	font-weight: 600;
	padding-bottom: 8px;
}

.payment-form .products{
	background-color: #f7fbff;
    padding: 25px;
}

.payment-form .products .item{
	margin-bottom:1em;
}

.payment-form .products .item-name{
	font-weight:600;
	font-size: 0.9em;
}

.payment-form .products .item-description{
	font-size:0.8em;
	opacity:0.6;
}

.payment-form .products .item p{
	margin-bottom:0.2em;
}

.payment-form .products .price{
	float: right;
	font-weight: 600;
	font-size: 0.9em;
}

.payment-form .products .total{
	border-top: 1px solid rgba(0, 0, 0, 0.1);
	margin-top: 10px;
	padding-top: 19px;
	font-weight: 600;
	line-height: 1;
}

.payment-form .card-details{
	padding: 25px 25px 15px;
}

.payment-form .card-details label{
	font-size: 12px;
	font-weight: 600;
	margin-bottom: 15px;
	color: #79818a;
	text-transform: uppercase;
}

.payment-form .card-details button{
	margin-top: 0.6em;
	padding:12px 0;
	font-weight: 600;
}

.payment-form .date-separator{
 	margin-left: 10px;
    margin-right: 10px;
    margin-top: 5px;
}

@media (min-width: 576px) {
	.payment-form .title {
		font-size: 1.2em; 
	}

	.payment-form .products {
		padding: 40px; 
  	}

	.payment-form .products .item-name {
		font-size: 1em; 
	}

	.payment-form .products .price {
    	font-size: 1em; 
	}

  	.payment-form .card-details {
    	padding: 40px 40px 30px; 
    }

  	.payment-form .card-details button {
    	margin-top: 2em; 
    } 
}===
  </style>
</head>
<body>
<!--<form method="post">
<label for="customer">Choose a customer:</label>
<select name="customer" id="customer">
<?php

/*
$q= "SELECT * FROM customer";
$result= mysqli_query($conn,$q);
while($query = mysqli_fetch_array($result))
{ 
 
?>

  <option value="<?php echo $query['cid']; ?>"><?php echo $query['name'];*/ ?></option>
 
  <?php //} ?>

</select>
<label for="val">Amount:</label>

<input type="number" name="val" id="val" >
<button type="submit" name="submit">Transfer</button>
</form>
-->

<main class="page payment-page">
    <section class="payment-form dark">
      <div class="container">
        <div class="block-heading">
          <h2>Payment</h2>
        </div>
        <form method="post">
          <div class="products">
            <h3 class="title">Checkout</h3>
            <div class="item">
              <span class="price"><?php   echo $GLOBALS['name']?></span>
              <p class="item-name">Name</p>
           
              <div class="total">Mail<span class="price"><?php echo $GLOBALS['email'];?></span></div>
            </div>
            
           
            <div class="item">
              <span class="price"><?php echo "Rs. ".$GLOBALS['sbal'];?></span>
              <p class="item-name">Balance</p>
            </div>
          </div>
          
          <div class="card-details">
            <h3 class="title">Name</h3>
            <div class="row">
              <div class="form-group col-sm-7">
                <label for="card-holder">Sender Name</label>
               <!-- <input id="card-holder" type="text" class="form-control" placeholder="Card Holder" aria-label="Card Holder" aria-describedby="basic-addon1">-->
               <form method="post">
<label for="customer">Choose a customer:</label>
<select name="customer"class="form-control"  id="customer">
<?php


$q= "SELECT * FROM customer";
$result= mysqli_query($conn,$q);
while($query = mysqli_fetch_array($result))
{ 
 
?>

  <option value="<?php echo $query['cid']; ?>"><?php echo $query['name']; ?></option>
 
  <?php } ?>

</select>


              </div>
           
              <div class="form-group col-sm-8">
                
                <label for="val">Amount:</label>

<input type="number"class="form-control" placeholder="Amount" min=0 max=<?php echo $GLOBALS['sbal'];?> name="val" id="val" >
<button type="submit" class="btn btn-primary btn-lg"name="submit">Transfer</button>
</form>
              </div>
              
              <div class="form-group col-sm-12">
               
              </div>
            </div>
          </div>
        </form>
      </div>
    </section>
  </main>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
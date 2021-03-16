<?php
include "conn.php";
$rname=0;
$amount=0;
$sbal=0;
$rbal=0;
$cid=$_GET['cid'];
if(isset($_POST['submit']))
{
    $rname=$_POST['customer'];
    $amount=$_POST['val'];
     echo $rname;
     echo $amount;
     $q2="SELECT * FROM customer where cid=$rname";
$r2=mysqli_query($conn,$q2);
while($qr2 = mysqli_fetch_array($r2)){
  $rbal=$qr2['balance'];
    }
    $q3="SELECT * FROM customer where cid=$cid";
    $r3=mysqli_query($conn,$q3);
    while($qr3 = mysqli_fetch_array($r3)){
      $sbal=$qr3['balance'];
        }
        mysqli_query($conn,"START TRANSACTION");
        echo "sbalance ".$sbal;
        echo "rbalance ".$rbal;
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
            mysqli_query($conn,"ROLLBACK");
        }
 

}


echo "sbalance at ".$sbal;
echo "rbalance at".$rbal;






?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post">
<label for="customer">Choose a customer:</label>
<select name="customer" id="customer">
<?php


$q= "SELECT * FROM customer";
$result= mysqli_query($conn,$q);
while($query = mysqli_fetch_array($result))
{ 
 
?>

  <option value="<?php echo $query['cid']; ?>"><?php echo $query['name']; ?></option>
 
  <?php } ?>

</select>
<label for="val">Amount:</label>

<input type="number" name="val" id="val" >
<button type="submit" name="submit">Transfer</button>
</form>
</body>
</html>
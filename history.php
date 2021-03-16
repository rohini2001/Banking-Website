
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 
    <title>Document</title>
<style>
body{
    background: #cedeeb no-repeat center  fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  }
 table{
    background:#ffffff;
    font-size: 15px;
    margin: auto;
   width: 80% !important; 
   text-align:center;
  }
  th{
      background:gray;
      color:white;
      text-align:center;
  }
.navbar button{
  margin: 12px 16px 12px 16px;;
}
</style>
</head>
<body>
<header>
<nav class="navbar navbar-expand-lg navbar-light bg-transparent">
  <div class="container-fluid ">
    <div class="navbar-header">
    </div>
    <ul class="nav navbar-nav">
      <li  class="btn btn-outline-dark  btn-lg" type="button" class="active"><a href="index.php">Home</a></li>
      <li><button type="button" class="btn btn-outline-dark  btn-lg"><a href="cus_details.php">customer</a></button></li>
   
    </ul>
    <ul class="nav navbar-nav navbar-right">
    <li><button type="button" class="btn btn-outline-dark  btn-lg"><a href="history.php">History</a></button></li>
    <li><button type="button" class="btn btn-outline-dark  btn-lg"><a href="transfer.php">Transfer</a></button></li>
    </ul>
  </div>

  
</nav>
</header>
<table>




</table>
</body>
</html>
<?php 
include "conn.php";
$q = "SELECT * FROM trans";
$r = mysqli_query($conn, $q);
echo "<table class='table table-striped table-hover table-border justify-content-center'>";?>
<tr>
    <th>Id</th>
    <th>Sender Name</th>
    <th>Reciver Name</th>
    <th>Amount</th>
  </tr>
<?php while($qr = mysqli_fetch_array($r)){
  echo "<tr>";
    echo "<th>".$qr['tid']."</td>";
    

    $sname=$qr['sname'];
    $rname = $qr['rname'];
    #echo "\n";
    $q1 = "SELECT name FROM customer where cid = $sname;";
    $r1 = mysqli_query($conn, $q1);
    while($qr1 = mysqli_fetch_array($r1)){
        echo "<td>".$qr1['name']."</td>";
    }

    $q3 = "SELECT name FROM customer where cid = $rname;";
    $r3 = mysqli_query($conn, $q3);
    while($qr3 = mysqli_fetch_array($r3)){
        echo "<td>".$qr3['name']."</td>";
    }
    echo "<td>".$qr['amount']."</td>";
 echo "</tr>";
}
echo "</table>";
?>
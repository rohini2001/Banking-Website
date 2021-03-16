

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
  body{
    background: url('12.jpg') no-repeat center  fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  }
.btnn{
  background-color: rgb(128, 128, 255);
  border: none;
  color: white;
  height :200px;
  width :200px;
  padding: 12px 16px;
  font-size: 30px;
  cursor: pointer;
  margin: 20px;
}
.container{
  margin-top:100px;
}
.glyphicon {
    font-size: 50px;
}
.navbar button{
  margin: 12px 16px 12px 16px;;
}


</style>
</head>
<body style="height:150px; ">

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
  
<div class="container my-4"> 
  
     
         <button  class="btnn btn btn-lg"><span class="glyphicon glyphicon-user"></span><br><a href="cus_details.php" class="text-white font-weight-bold text-center">Cuatomers</a></button> 
     
      
        <button  class="btnn  btn btn-lg"><span class="glyphicon glyphicon-transfer"></span><br><a href="transfer.php" class="text-white text-lg-center">Transfer</a></button>  
 
</div>


</body>
</html>

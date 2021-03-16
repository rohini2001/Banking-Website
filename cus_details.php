<?php
include "conn.php";



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
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
  
    margin: auto;
   width: 80% !important; 
  }
  th{
      background:gray;
      color:white;
  }
.container{
  margin-top:100px;
}
.glyphicon {
    font-size: 50px;
}

.navbar button{
  margin: 12px 16px 12px 16px;
  background: #efefef;
}
nav{
  margin-left:0px;
}
  </style>
</head>
<header>
<nav class="navbar navbar-expand-lg navbar-light bg-transparent">
  <div class="container-fluid ">
    <div class="navbar-header">
    </div>
    <ul class="nav navbar-nav">
      <li  class="btn   btn-lg" type="button" class="active"style="float:left;"><a href="index.php">Home</a></li>
      <li><button type="button" class="btn   btn-lg"><a href="cus_details.php">customer</a></button></li>
   
    </ul>
    <ul class="nav navbar-nav navbar-right">
    <li><button type="button" class="btn  btn-lg"><a href="history.php">History</a></button></li>
    <li><button type="button" class="btn  btn-lg"><a href="transfer.php">Transfer</a></button></li>
    </ul>
  </div>

  
</nav>
</header>
<body >
    

     <h1 class='text-center'>CUSTOMER DETAILS</h1>
     <table class="table table-striped table-hover table-border justify-content-center">

     <TR>
     <th>ID</th>
     <th><button class="btn-primary btn"><a href="cus_sort_name.php"class="text-white text-center">SORT NAME</a></button>
</th>
     <th>EMAIL</th>
     
     <th><button class="btn-primary btn"><a href="sort_ord.php"class="text-white text-center">Balance</a></button>
</th>
     <th>UPDATE</th>
    
      </tr>
      <?php


        $q= "SELECT * FROM customer";
        $result= mysqli_query($conn,$q);
        while($query = mysqli_fetch_array($result))
{   
?>
      <tr>
      <td><?php  echo $query['cid']; ?></td>
     <td><?php  echo $query['name']; ?></td>
     <td><?php  echo $query['email']; ?></td>
     <td><?php  echo $query['balance']; ?></td>
  

     <td><button class="btn-danger btn"><a href="cus_trans.php?cid=<?php  echo $query['cid']; ?> "class="text-white text-center">Transfer</a></button></td>
    
     
      
      </tr>



<?php
}
?>



</body>

</html>



<?php
    require_once('connect.php');    
session_start();

extract($_REQUEST);


if(isset($updstatus))
{
	if(empty($_SESSION['id']))
{
    
    $riderUsername = $_SESSION['riderUsername'];
	  if(mysqli_query($conn,"update orders set status='$status' , riderName = '$riderUsername', del_time = NOW() where id='$order_id'"))
	  {
          
		  header("location:orders.php");
	  }
}
else
{
	header("location:category.php?msg=You Must Login First");
}
}


?>
<html>
<head>
<title>change order Status</title>
     
<link rel="stylesheet" href="../admin/all.css">
	 <style>
	  
		
	  body{
			  margin-top: 0%;
			  background-color:#99ffe6;
		  }
		  .btn{
			background-color: #66ffb3;
			border-color: gray;
			padding: 1%;
		  }

		  
		ul li a {color:black;}
		ul li a:hover {color:black; font-weight:bold;}
		ul li {list-style:none;}
		.text1{ 
            text-align: center;
            font-family: Arial Black;
            font-size: 50px;
            padding-top: 0%;
            color: Gray;
            margin-top: 0%;
        }
		
		</style>
</head>
<body>


<nav class="navbar">

<div id="trapezoid" style = "padding-left: 22%;">

<a href="home.php" class = "">Home</a>
    <a href="orders.php" class="active">Orders</a>
  <a href="account.php" class = "">My Account</a>
  <a href="logout.php" class = "">Logout</a>
</div>
</nav>
<br>	  
		<div class="text1">
                    
                    <?php
                        echo "Update Order Status";
                    ?><br><br>
                </div>


<div class="container" style="text-align: center;">
    <form method="post">
      <div class="row">
	 

	 


	  <div class="col-sm-4">
		  
	  Out for Delivery
   		<input type="radio" name="status" value="Out for Delivery">
   	 
	  Delivered<input type="radio"  name="status" value="Delivered">&nbsp;&nbsp;&nbsp;
     
      Failed to Deliver<input type="radio" name="status" value="Failed to Deliver"><br>
	  <br>
	  
	  <button type="submit" class="btn btn-outline-success" name="updstatus">Update Status</button>
	  </div>

	  </div>
	  </form>
   </div>

  
</body>
</html>
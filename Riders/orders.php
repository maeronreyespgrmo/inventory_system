<?php 

include 'connect.php';

error_reporting(0);

session_start();

?>

<link rel="stylesheet" href="../admin/all.css">
<style>
body {
  font-size: 100%;
  background: #99ffe6;
  margin-left: 2%;
margin-right: 2%;
margin-top: 0%;
font-family: Verdana, sans-serif;
    
}

.table{
    box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
    position: center;
    font-size: 15px;
    margin-top: 2%;
    width: 95%;
    border-radius: 10px;
    border: 1px solid rgba( 255, 255, 255, 0.18 );
    color:black;
    position: absolute;
    text-align: center;
    background-color: whitesmoke;
    
}
table td,th {
        border: 1px solid #000;
      }
      
#details{
            font-family: Verdana, sans-serif;
            border-collapse: collapse;
            margin-left: 10px; 
            margin-top: 50px; 
            margin-bottom: 20px; 
            position: absolute; 
        }
        #details td, #details th{
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center; 
        }
        #details tr:hover{
            background-color:#ddd; 
        }
        #details th{
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color: #04AA6D;
            color: white;
        }

h2{
        margin-top: 0%;
        margin-bottom: -2%;
            font-size: 50px;
        }
        #wrapper {
  width: 100px;
  height:100px;
  margin: 0 auto;
  padding: 0 5%;
}

#pop_up{
perspective: 250px;
}

#pop_up img {
  transition: 100ms;
  box-shadow: 0px 0px 0px rgba(0,0,0,0);
}

#pop_up img:hover {
  transform: translate3d(0px,0px,210px);  
  box-shadow: 0px 0px 10px rgba(0,0,0,0.8);
  
  }
        


.btn-secondary {
  background-color: #7bed9f;
  padding: 3%;
  color: black;
  text-decoration: none;
  font-weight: bold;
  border-radius: 12px;
}
.btn-secondary:hover {
  background-color: #2ed573;
}


</style>

<nav class="navbar" >

<div id="trapezoid" style="padding-left: 22%;">

<a href="home.php">Home</a>
    <a href="orders.php" class="active">Orders</a>
  <a href="account.php" class = "">My Account</a>
  <a href="logout.php" class = "">Logout</a>

</div>
</nav>

<center> <h2>Manage Orders</h2> </center>

<table class="table" id="details">
				<tbody>
				<th>Time of Order</th>
				<th>Customer Username</th>
                <th>Customer Name</th>
				<th>Customer Email</th>
                <th>Customer Address</th>
                <th>Order</th>
                <th>Total Price</th>
                <th>Rider</th>
                <th>Order Status</th>
				<th>Update Status</th>
				<?php
				$orderquery=mysqli_query($conn,"select * from orders WHERE status = 'Ready for Delivery' OR status = 'Out for Delivery' OR status = 'Delivered' OR status = 'Failed to Deliver' ORDER BY order_time DESC;");
                
				if(mysqli_num_rows($orderquery))
				{
					while($orderrow=mysqli_fetch_array($orderquery))
					{
						$status=$orderrow['status'];
                        $riderName = $orderrow['riderName'];
                        $payment = $orderrow['payment'];
                        $paymentMethod = $orderrow['paymentMethod'];
						?>
						<tr>
                        <?php $id = $orderrow['id'];?>
                        <td><?php echo $orderrow['order_time']; ?></td>
						<td><?php echo $orderrow['customer_username']; ?></td>
						<td><?php echo $orderrow['firstname']." ".$orderrow['lastname']; ?></td>
						
                        <td><?php echo $orderrow['email']; ?></td>
                        <td><?php
                        echo $orderrow['hnum']." "; 
                        echo $orderrow['st']." "; 
                        echo $orderrow['brgy']." "; 
                        echo $orderrow['town']; 
                        ?></td>
                        <td>
                            
                            <?php  $sql1 = "SELECT food_title, qty FROM order_details WHERE order_id=$id";
                                
                                $res1 = mysqli_query($conn, $sql1);

                                $count1 = mysqli_num_rows($res1);

                                if($count1>0)
                                {
                                    while($row1=mysqli_fetch_assoc($res1))
                                    {
                                      
                                        $title = $row1['food_title'];
                                        $qty =  $row1['qty']   
                                        ?>

                                        <?php echo $title."     ";?> 
                                        <?php echo $qty;?> <br>
                                        <?php
                                    }
                                }
                                else
                                {
                                    ?>
                                    <option value="0">No Item Found</option>
                                    <?php
                                }
                            

                            ?>
 </td>

                        <td><?php echo $orderrow['total_price']; ?><br>
                        <?php
                           echo "Thru: ".$paymentMethod; 
                                
                           if($paymentMethod == 'GCash' && $payment == ''){
                                  echo '<span style="color:red;text-align:center;"><br>No Receipt!</span>';
                                }
                            if($paymentMethod == 'GCash' && $payment !==''){
                             

                          ?> 
                          
                          <div id="wrapper">
                        <div id="pop_up">
                        <img style="width:65px;height:100px;" src="../customer/payment/<?php echo $payment?>">
                        </img>
                        </div>
                        </div>

                           <?php
                            }
                          
                          ?>
                    
                    
                    </td>

                        
 <td><?php echo $orderrow['riderName']; ?></td>
						<?php
			   if($status=="Failed to Deliver" || $status=="Cancelled")
			   {
			   ?>
			   <td>&nbsp;<span style="color:red;"><?php echo $orderrow['status']; ?><br><br></span><?php echo $orderrow['del_time'];?></td>
			   <?php
			   }
			   else if($status=="Preparing")
				   {
?>
 <td><span style="color:orange;"><?php echo $orderrow['status']; ?><br><br></span><?php echo $orderrow['del_time'];?></td>
<?php
                   } else if($status=="Ready for Delivery")
                   {
        ?>
         <td><span style="color:violet;"><?php echo $orderrow['status']; ?><br><br></span><?php echo $orderrow['del_time'];?></td>
        <?php
                           }
                   else if($status=="Out for Delivery")
				   {
?>
 <td><span style="color:blue;"><?php echo $orderrow['status']; ?><br><br></span><?php echo $orderrow['del_time'];?></td>
<?php
                   }
			   else if ($status == "Delivered"){
			   ?>
			   <td><br><span style="color:green;"><?php echo $orderrow['status'];?><br><br></span><?php echo $orderrow['del_time'];?></td>
			   <?php
			   }
               else
			   {
			   ?>
			   <td>&nbsp;<span style="color:black;"><?php echo $orderrow['status']; ?><br><br></span><?php echo $orderrow['del_time'];?></td>
               <?php
                   }
				?>	
                <?php

                
                if ($status == 'Delivered') {
               
                ?>
                <td>&nbsp;<span style="color:Green;"><?php echo "Order Complete"; ?></span></td>
             <?php
                }else if($status == "Failed to Deliver"){
                    
                
             ?>
                <td>&nbsp;<span style="color:Red;"><?php echo "Delivery Failed"; ?></span></td>
                <?php
                }else
                {
                ?>
						<td><a href="changestatus.php?order_id=<?php echo $orderrow['id']; ?>"><button type="button" class = "btn-secondary" name="changestatus">Update Status</button></a></td>
					<?php
                }
                    ?>
            
						<tr>
						<?php
					}
				}
				?>
				</tbody>
				</table>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script>
      function order_status(){
        let order_status = document.getElementById("order_status")
        $.post('process.php', {name: userName}, function(response){
        // Handle response from PHP script
        console.log(response);
        });
      }
      </script>
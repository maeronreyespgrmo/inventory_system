<?php 

include 'db_connect.php';

error_reporting(0);

session_start();
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<link rel="stylesheet">
<style>
body {
    font-size: 100%;
    margin: 2%;
    font-family: Verdana, sans-serif;
    position: relative;
}

body::before {
    content: "";
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(3deg, #2c3e50, white,#2c3e50); /* Dark gradient background */
    opacity: 0.8; /* Adjust the opacity as needed */
    z-index: -1; /* Place the pseudo-element behind the content */
}
    .table {
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.8); /* Darker box shadow */
    background-color: #2c3e50; /* Dark background color */
    margin-top: -30px;
    width: 100%;
    border-radius: 8px;
    border: 1px solid #34495e; /* Slightly lighter border color */
    color: #ecf0f1; /* Light text color for good contrast */
    position: relative;
    text-align: center;
    overflow-x: auto;
    margin-left: 1px;
    transition: box-shadow 0.3s, background-color 0.3s;
}

#details table {
    width: 100%;
    margin: 0 auto;
    border-collapse: collapse;
}

#details th,
#details td {
    padding: 15px;
    border: 1px solid #34495e; /* Slightly lighter border color */
    border-radius: 5px;
}

#details th {
    background-color: #3498db; /* Vibrant green header color */
    color: white;
    
}

#details tr:nth-child(even) {
    background-color: #34495e; /* Darker background for even rows */
}

#details tr:hover {
    background-color: #2c3e50; /* Slightly darker background on hover */
}

/* Add these styles for responsiveness */
@media only screen and (max-width: 768px) {
    .table {
        width: 100%;
        margin-left: 0;
    }

    #details th,
    #details td {
        padding: 12px;
    }
}


h2 {
    margin-top: 20px; /* Increased margin-top for better spacing */
    margin-bottom: 10px; /* Adjusted margin-bottom for better spacing */
    font-size: 36px; /* Slightly reduced font size for a cleaner look */
    text-align: left; /* Align the title to the left */
}
    .btn-primary {
        display: inline-block;
        padding: 10px 20px;
        text-align: center;
        background-color: #3498db;
        color: #ffffff;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s, box-shadow 0.3s;
        margin-left: 80%;
    }

    .btn-primary:hover {
        background-color: #2980b9;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        transform: scale(1.02);
        transition: transform 0.3s ease-in-out;
    }


    .btn-secondary {
        background-color: #218838;
        color: #ffffff;
        padding: 8px 16px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
    }

    .btn-secondary:hover {
        background-color: #495057;
    }
.btn-danger {
    padding: 1%;
    font-weight: bold;
    display: inline-block; /* Prevents button stacking on small screens */
    margin: 5px;
    border-radius: 5px;
    color: #dc143c;
}
.sidenav {
        height: 100%;
        width: 250px;
        position: fixed;
        z-index: 1;
        top: 0;
        left: -250px;
        background: linear-gradient(to right, #2c3e50, #1a252f);
        overflow-x: hidden;
        padding-top: 20px;
        transition: 0.5s;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }

    .sidenav:hover {
        left: 0;
    }

    .sidenav a {
        padding: 15px 20px;
        text-decoration: none;
        font-size: 16px;
        color: #ecf0f1;
        display: block;
        transition: background-color 0.3s, box-shadow 0.3s;
        border-radius: 5px;
        margin-bottom: 5px;
    }

    .sidenav a:hover {
        background-color: #34495e;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
        transform: scale(1.02);
        transition: transform 0.3s ease-in-out;
    }

    .sidenav a.active {
        background-color: #2980b9;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
    }

    .main-content {
        margin-left: 0;
        padding: 20px;
        transition: margin-left 0.5s ease;
    }

 
.search-bar {
        margin-top: 20px; /* Adjust the margin-top to align with the category */
        margin-bottom: 1px;
        text-align: right; /* Align the search bar to the right */
    }

    .search-bar form {
        display: inline-block; /* Display the form inline to keep it on the same line as other elements */
    }

    .search-bar input[type="text"] {
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    .search-bar button {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        background-color: #3498db;
        color: white;
        cursor: pointer;
    }

    .search-bar button:hover {
        background-color: #2980b9;
    }
   
    .menu-toggle {
        cursor: pointer;
        display: none;
        padding: 10px;
        border-radius: 5px;
        
    }

    .menu-toggle .line {
        width: 25px;
        height: 3px;
        background-color: #ecf0f1;
        margin: 6px 0;
        transition: 0.4s;
        
    }

    @media screen and (max-width: 768px) {
        .menu-toggle {
            display: block;
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 2;
        }

        .sidenav {
            left: -250px;
        }

        .sidenav.active {
            left: 0;
        }
    }

    @media screen and (min-width: 769px) {
        .sidenav {
            left: 0;
        }

    .main-content {
        margin-left: 250px;
    }
    .btn-primary {
      width: 15%;
      max-width: none;
      padding: 10px 20px;
    }
    .menu-toggle {
            display: none;
        }       

}

</style>
<div class="sidenav">
    <div class="text">
    
    <i class="fa fa-user-circle-o" style="font-size:40px; color:white;  margin-left:110px; margin-top: 20px"> 
    </i><br><div style="font-size:20px; color:white; text-align: center"> <?php echo " " . $_SESSION['adminUsername'] . ""; ?></div> <br><br><br><br><br>
    </div>
    <a href="home.php"><i class="fa fa-home" aria-hidden="true"></i> Dashboard</a>
<a href="category.php"><i class="fa fa-list-alt" aria-hidden="true"></i> Category</a>
<a href="item.php"><i class="fa fa-list"></i> Items</a>
<a href="manage_orders.php"   class="active" class="expandHome"><i class="fa fa-shopping-cart"></i> Manage Orders</a>
<a href="all_users.php"><i class="fa fa-users"></i> User Management</a>
<a href="logout.php"><i style="font-size:24px" class="fa">&#xf08b;</i></i> Logout</a>
</div>

<script>
    function toggleNav() {
        var sidenav = document.querySelector('.sidenav');
        var mainContent = document.querySelector('.main-content');

        if (sidenav.style.left === "0px") {
            sidenav.style.left = "-250px";
            mainContent.style.marginLeft = "0";
        } else {
            sidenav.style.left = "0";
            mainContent.style.marginLeft = "250px";
        }
    }
    function toggleNav() {
        var sidenav = document.querySelector('.sidenav');
        var mainContent = document.querySelector('.main-content');
        var menuToggle = document.querySelector('.menu-toggle');

        if (sidenav.classList.contains('active')) {
            sidenav.classList.remove('active');
            mainContent.style.marginLeft = "0";
        } else {
            sidenav.classList.add('active');
            mainContent.style.marginLeft = "250px";
        }
    }

    // Automatically show sidebar on larger screens
    window.addEventListener('load', function () {
        var screenWidth = window.innerWidth;
        var sidenav = document.querySelector('.sidenav');
        var mainContent = document.querySelector('.main-content');

        if (screenWidth >= 769) {
            sidenav.classList.add('active');
            mainContent.style.marginLeft = "250px";
        }
    });

    // Update sidebar on window resize
    window.addEventListener('resize', function () {
        var screenWidth = window.innerWidth;
        var sidenav = document.querySelector('.sidenav');
        var mainContent = document.querySelector('.main-content');
        var menuToggle = document.querySelector('.menu-toggle');

        if (screenWidth >= 769) {
            sidenav.classList.add('active');
            mainContent.style.marginLeft = "250px";
            menuToggle.style.display = "none"; // Hide the menu toggle button on larger screens
        } else {
            sidenav.classList.remove('active');
            mainContent.style.marginLeft = "0";
            menuToggle.style.display = "block"; // Show the menu toggle button on smaller screens
        }
    });
</script>


<div class="main-content">
    <div class="wrapper">
                    <!-- Add three-line button for small screens -->
        <div class="menu-toggle" onclick="toggleNav()">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>


        <table class="table" id = "details">
                <tr>
                <!-- Additional row for "Manage Tools Category" -->
                <td colspan="15">
                <h2>Manage Orders</h2>
        
        </td>
                </tr>
				<tr>
				<th>Time of Order</th>
				<th>Customer Username</th>
                <th>Customer Name</th>
				<th>Customer Email</th>
                <th>Customer Address</th>
                <th>Order</th>
                <th>Total Price</th>
                <th>Order Status</th>
				<th>Update Status</th>
</tr>			
<?php
				$orderquery=mysqli_query($conn,"select * from orders ORDER by order_time DESC");
                
				if(mysqli_num_rows($orderquery))
				{
					while($orderrow=mysqli_fetch_array($orderquery))
					{
						$status=$orderrow['status'];
            $riderName = $orderrow['riderName'];
            $confirmation = $orderrow['confirmation'];
            $payment = $orderrow['payment'];
            $paymentMethod = $orderrow['paymentMethod'];
						?>
						<tr>
                        <?php $id = $orderrow['id'];?>
                        <td style="width: 10%;"><?php echo $orderrow['order_time']; ?></td>
						<td style="width: 7%;"><?php echo $orderrow['customer_username']; ?></td>
						<td style="width: 7%;"><?php echo $orderrow['firstname']." ".$orderrow['lastname']; ?></td>
						
                        <td><?php echo $orderrow['email']; ?></td>
                        <td style="width: 13%;"><?php
                        echo $orderrow['hnum']." "; 
                        echo $orderrow['st']." "; 
                        echo $orderrow['brgy']." "; 
                        echo $orderrow['town']." "; 
                        ?></td>
                        <td style="width: 12%;">
                            
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
                                    <option value="0">No Food Found</option>
                                    <?php
                                }
                            
                            ?>
 </td>

                        <td style="width:11%;"><?php 
                            echo $orderrow['total_price']; ?><br>
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
						<?php
			   if($status=="Failed to Deliver" || $status=="Cancelled")
			   {
			   ?>
			   <td style="width: 10%;">&nbsp;<span style="color:red;"><?php echo $orderrow['status']; ?></span><br><br><?php echo $orderrow['del_time']; ?></td>
			   <?php
			   }
			   else if($status=="Preparing")
				   {
?>
 <td style="width: 10%;"><span style="color:blue;"><?php echo $orderrow['status']; ?></span><br><br><?php echo $orderrow['del_time']; ?></td>
<?php
                   }
			   else if ($status == "Delivered"){
			   ?>
			   <td style="width: 10%;"><span style="color:green;"><?php echo $orderrow['status']; ?></span><br><br><?php echo $orderrow['del_time']; ?></td>
			   <?php
			   }
               else
			   {
			   ?>
			   <td style="width: 10%;">&nbsp;<span style="color:black;"><?php echo $orderrow['status']; ?></span></td>
               <?php
                   }
				?>	

          


      
<td><a href="changestatus.php?order_id=<?php echo $orderrow['id']; ?>"><button type="button" name="changestatus" class="btn-secondary">Update Status</button></a></td>
     
<?php
        }
    ?>
            <?php
					}
				
				?>
				</tbody>
				</table>
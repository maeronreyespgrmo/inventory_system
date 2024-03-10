<?php
include 'config_info.php';
if (isset($_SESSION['username'])) {
    header("Location: ../index.php");
}

error_reporting(0);

session_start();
?>
<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../admin/all.css">
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
.container {
            text-align: center;
            font-family: Arial Black;
            font-size: 20px;
            padding-top: 0%;
            color: #eb3b5a;
            margin-top: auto;
}
h2{
    margin-top: 20px; /* Increased margin-top for better spacing */
    margin-bottom: 10px; /* Adjusted margin-bottom for better spacing */
    font-size: 36px; /* Slightly reduced font size for a cleaner look */
    text-align: left; /* Align the title to the left */
}

.table {
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.8); /* Darker box shadow */
    background-color: #2c3e50; /* Dark background color */
    margin-top: 20px;
    width: 80%;
    border-radius: 8px;
    border: 1px solid #34495e; /* Slightly lighter border color */
    color: #ecf0f1; /* Light text color for good contrast */
    position: relative;
    text-align: center;
    overflow-x: auto;
    margin-left: 275px;
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
        width: auto;
        margin-left: 0;
    }

    #details th,
    #details td {
        padding: 12px;
    }
}
        .col-md-2 {
            width: 100%;
            margin-bottom: 20px;
        }

        .mypanel {
            padding: 10px;
        }

        @media screen and (max-width: 768px) {
            body {
                font-size: 14px;
            }

            .container {
                padding-left: 5%;
                padding-right: 5%;
            }

            .col-md-2 {
                width: 100%;
                margin-bottom: 20px;
            }

            .mypanel {
                padding: 10px;
            }
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

/* Styles for Empty Cart button */
.btn-empty-cart {
    background-color: #dc3545; /* Bootstrap's danger color */
    color: #fff; /* Text color */
    margin-left: 270px; /* Adjust margin as needed (top, right, bottom, left) */
    
}

/* Styles for Continue Adding Tools button */
.btn-continue-adding {
    background-color: #ffc107; /* Bootstrap's warning color */
    color: #000; /* Text color */
    margin-left: 10px; /* Adjust margin as needed (top, right, bottom, left) */
}

/* Styles for Check Out button */
.btn-check-out {
    background-color: #28a745; /* Bootstrap's success color */
    color: #fff; /* Text color */
    float: right; /* Align to the right */
    margin-left: 250px; /* Adjust margin as needed (top, right, bottom, left) */
}

/* Make buttons responsive and move to the right with left and right margins */
@media (max-width: 768px) {
    .btn-empty-cart,
    .btn-continue-adding,
    .btn-check-out {
        float: none; /* Remove float */
        margin: 0 0 5px 0; /* Adjust margin as needed (top, right, bottom, left) */
    }
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
    </i><br><div style="font-size:20px; color:white; text-align: center"> <?php echo " " . $_SESSION['username'] . ""; ?></div> <br><br><br><br><br>
    </div>
<a href="itemlist.php" ><i class="fa fa-home" aria-hidden="true"></i> Products</a>
<a href="cart.php"><i class="fa fa-shopping-cart"></i> Your Cart    (<?php
                    if (isset($_SESSION["cart"])) {
                        $count = count($_SESSION["cart"]);
                        echo "$count";
                    } else
                        echo "0";
                    ?>)</a>
<a href="orders.php"  class="active" class="expandHome"><i class="fa fa-list-alt" aria-hidden="true"></i> My Orders</a>
<a href="account.php"><i class="fa fa-user" aria-hidden="true"></i> Account</a>
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
    function searchTable() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("details");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those that don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1]; // Adjust the index based on the column you want to search
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
    function changeRowLimit() {
        var selectedRowLimit = document.getElementById("rowLimit").value;
        window.location.href = 'category.php?row_limit=' + selectedRowLimit;
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

<div class="menu-toggle" onclick="toggleNav()">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    <table class="table table-bordered" id="details">
                <tr>
                <td colspan="15">
                <h2>My Orders</h2>
        </td></tr>
        <tr>
                <th style = "text-align: center;">Customer Name</th>
				<th style = "text-align: center;">Customer Email</th>
                <th style = "text-align: center;">Customer Address</th>
                <th style = "text-align: center;">Order</th>
                <th style = "text-align: center;">Total Price</th>
                <th style = "text-align: center;">Time of Order</th>
                <th style = "text-align: center;">Order Status</th>
                <th style = "text-align: center;">Confirmation</th>
</tr>
				<?php
                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }

                $username = $_SESSION['username'];
				$orderquery=mysqli_query($conn,"select * from orders where customer_username = '$username' order by order_time DESC");
                $confirmation=0;
				if(mysqli_num_rows($orderquery))
				{
					while($orderrow=mysqli_fetch_array($orderquery))
					{
						$stat=$orderrow['status'];
						?>
						<tr>
                        <?php $id = $orderrow['id'];
                        $confirmation = $orderrow['confirmation'];
                        $payment = $orderrow['payment'];
                        $paymentMethod = $orderrow['paymentMethod'];
                        ?>	
						<td><?php echo $orderrow['firstname']." ".$orderrow['lastname']; ?></td>
						
                        <td><?php echo $orderrow['email']; ?></td>
                        <td><?php
                        echo $orderrow['hnum']. " "; 
                        echo $orderrow['st']. " "; 
                        echo $orderrow['brgy']. " "; 
                        echo $orderrow['town']. " "; 
                        ?></td>
                        <td style="width: 10%;">
                            
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

                                        <?php echo $title;?> <br>
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
                        <td><?php echo $orderrow['order_time']; ?></td>
                        
						<?php
			   if($stat=="Cancelled" || $stat=="Out Of Stock" || $stat == "Failed to Deliver")
			   {
			   ?>
			   <td></i>&nbsp;<span style="color:red;"><?php echo $orderrow['status']; ?></span><br><br><?php echo $orderrow['del_time']; ?></td>
			   <?php
			   }
         else if($stat=="Ready for Delivery")
         {
?>
<td style="width: 10%;"><span style="color:violet;"><?php echo $orderrow['status']; ?></span><br><br><?php echo $orderrow['del_time']; ?></td>
<?php
                 }

              else if($stat=="Out for Delivery")
			   {
			   ?>
			   <td></i>&nbsp;<span style="color:blue;"><?php echo $orderrow['status']; ?></span><br><br><?php echo $orderrow['del_time']; ?></td>
			   <?php
			   }
               else if($stat=="Preparing")
			   {
			   ?>
			   <td></i>&nbsp;<span style="color:orange;"><?php echo $orderrow['status']; ?></span><br><br><?php echo $orderrow['del_time']; ?></td>
			   <?php
			   }
               else if($stat=="Delivered")
			   {
			   ?>
			   <td><span style="color:green;"><?php echo $orderrow['status']; ?></span><br><br><?php echo $orderrow['del_time']; ?></td>
			   <?php
			   }
			   else 
			   {
			   ?>
			   <td><span style="color:black;"><?php echo $orderrow['status']; ?></span></td>
			   <?php
			   }
			   ?>
               <?php
               if($confirmation == "Order Received"){
                           
               ?>
                <td  style="width: 12%;"><span style="color:green;"><?php echo $orderrow['confirmation']; ?></span></td>
			  <?php
               }
               else if($confirmation !== "Order Received" & $stat == "Delivered" )
               {
                ?>

                <td  style="width: 12%;"> <a href="confirmation.php?id=<?php echo $id; ?>" class="btn-secondary" style= "padding : 2%;">Order Received</a> </td>
					
<?php
               }
               else if($stat == "Failed to Deliver" || $stat == "Cancelled"){
                              
                ?>
                <td></i>&nbsp;<span style="color:red;"><?php echo "Delivery Failed"; ?></span></td>
			<?php
               }
                else{
            ?>


                <td><span style="color:green;"><?php echo $orderrow['confirmation']; ?></span></td>
<?php
               }

?>
						<?php
					}
				}
				?>
                 
				</tbody>
				</table>
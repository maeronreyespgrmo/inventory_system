<?php
session_start();
require 'config_info.php';

if (!isset($_SESSION['username'])) {
    header("location: customerlogin.php");
}
?>

<html>

<head>
    <title> Explore | W.A.L Merchant</title>
    
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    font-size: 50px;
    padding-top: 0%;
    color: #eb3b5a;
    margin-top: 0%;
    margin-left: 270px;
    width: 80%;
}
h1{
    margin-top: 20px; /* Increased margin-top for better spacing */
    margin-bottom: 10px; /* Adjusted margin-bottom for better spacing */
    font-size: 36px; /* Slightly reduced font size for a cleaner look */
    text-align: center; /* Align the title to the left */
}

/* Media query for screens smaller than 768px (adjust the value as needed) */
@media (max-width: 768px) {
    .container {
        margin-left: 60px; /* Adjust as needed for smaller screens */
    }
}

/* Media query for screens smaller than 576px (adjust the value as needed) */
@media (max-width: 576px) {
    .container {
        font-size: 30px; /* Adjust as needed for smaller screens */
    }
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
    .btn-danger {
    color: #fff;
    background-color: #dc3545;
    border-color: #dc3545;
    padding: 6px 12px;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease-in-out;
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
.btn-danger:hover {
    background-color: #bd2130;
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
    margin-left: 200px; /* Adjust margin as needed (top, right, bottom, left) */
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

    </style>
    <script type="text/javascript">
        window.onscroll = function () {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.getElementById("myBtn").style.display = "block";
            } else {
                document.getElementById("myBtn").style.display = "none";
            }
        }

        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>

    <?php

    if (isset($_SESSION['username'])) {
        ?>
<div class="sidenav">
    <div class="text">
    
    <i class="fa fa-user-circle-o" style="font-size:40px; color:white;  margin-left:110px; margin-top: 20px"> 
    </i><br><div style="font-size:20px; color:white; text-align: center"> <?php echo " " . $_SESSION['username'] . ""; ?></div> <br><br><br><br><br>
    </div>
<a href="itemlist.php" ><i class="fa fa-home" aria-hidden="true"></i> Products</a>
<a href="cart.php" class="active"><i class="fa fa-shopping-cart"></i> Your Cart
                    (<?php
                    if (isset($_SESSION["cart"])) {
                        $count = count($_SESSION["cart"]);
                        echo "$count";
                    } else
                        echo "0";
                    ?>)
                </a>
                <a href="orders.php"  class="expandHome"><i class="fa fa-list-alt" aria-hidden="true"></i> My Orders</a>
                <a href="account.php"><i class="fa fa-user" aria-hidden="true"></i> Account</a>
<a href="logout.php"><i style="font-size:24px" class="fa">&#xf08b;</i></i> Logout</a>
                </div>

            <div class="menu-toggle" onclick="toggleNav()">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
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
    <?php
}
else {

  ?>

<ul class="nav navbar-nav navbar-right">
            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Sign Up <span class="caret"></span> </a>
                <ul class="dropdown-menu">
              <li> <a href="customersignup.php"> User Sign-up</a></li>
              <li> <a href="managersignup.php"> Manager Sign-up</a></li>
              <li> <a href="#"> Admin Sign-up</a></li>
            </ul>
            </li>

            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-log-in"></span> Login <span class="caret"></span></a>
              <ul class="dropdown-menu">
              <li> <a href="customerlogin.php"> User Login</a></li>
              <li> <a href="managerlogin.php"> Manager Login</a></li>
              <li> <a href="#"> Admin Login</a></li>
            </ul>
            </li>
          </ul>

<?php
}
?>


        </div>

      </div>
    </nav>

    
<?php
if(!empty($_SESSION["cart"]))
{
  ?>
  <div class="container">
        <h1>My Shopping Cart</h1>
        
      </div>
      
    </div>

<table class="table table-bordered" id="details">
<tr>
<th>Item Name</th>
<th>Quantity</th>
<th>Price Details</th>
<th>Order Total</th>
<th>Action</th>
</tr>



<?php  

$total = 0;

foreach($_SESSION["cart"] as $keys => $values)
{
?>
<tr>
<td><?php echo $values["food_name"]; ?></td>
<td><?php echo $values["food_quantity"] ?></td>
<td>PHP <?php echo $values["food_price"]; ?></td>
<td>PHP <?php echo number_format($values["food_quantity"] * $values["food_price"], 2); ?></td>
<td><a href="cart.php?action=delete&id=<?php echo $values["food_id"]; ?>"><span><button class="btn btn-danger">Remove</button></span></a></td>
</tr>
<?php 
 $productQty = $values["food_quantity"];
 $fetchProduct =  $values["food_price"];
$calculateTotalPrice = number_format($productQty * $fetchProduct,2);
$total = $total + ($values["food_quantity"] * $values["food_price"]);

}

?>
<tr>
<td colspan="3" align="right"><b>TOTAL = </b></td>
<td text-align="right">PHP <?php echo number_format($total, 2); ?></td>
<td></td>
</tr>
</table>
<?php
  echo '<a href="cart.php?action=empty"><button class="btn btn-empty-cart">Empty Cart</button></a>
  <a href="itemlist.php"><button class="btn btn-continue-adding">Continue Adding Tools</button></a>
  <a href="checkout.php"><button class="btn btn-check-out">Check Out</button></a>';
?>
</div>
<br><br><br><br><br><br><br>
<?php
}
if(empty($_SESSION["cart"]))
{
  ?>
  <div class="container">
      <div class="jumbotron">
        <h1 >Your Shopping Cart</h1>
        <p  style="font-size: 21px; text-align:center">Shopping cart is Empty! Go back and <a href="itemlist.php">order now.</a></p>
        
      </div>
      
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <?php
}
?>


<?php


if(isset($_POST["add"]))
{
if(isset($_SESSION["cart"]))
{
$item_array_id = array_column($_SESSION["cart"], "food_id");
if(!in_array($_GET["id"], $item_array_id))
{
$count = count($_SESSION["cart"]);

$item_array = array(
 
'food_id' => $_GET["id"],
'food_name' => $_POST["hidden_name"],
'food_price' => $_POST["hidden_price"],
'food_quantity' => $_POST["quantity"],
'total_price' => $_POST["hidden_price"] * $_POST["quantity"]

);
$food = $_POST["hidden_name"];
$_SESSION["cart"][$count] = $item_array;
echo '<script>window.location="cart.php"</script>';
}
else
{
echo '<script>alert("Already added to cart!")</script>';
echo '<script>window.location="cart.php"</script>';
}
}
else
{
$item_array = array(
'food_id' => $_GET["id"],
'food_name' => $_POST["hidden_name"],
'food_price' => $_POST["hidden_price"],
'food_quantity' => $_POST["quantity"],
'total_price' => $_POST["hidden_price"] * $_POST["quantity"]

);
$_SESSION["cart"][0] = $item_array;
}
}
if(isset($_GET["action"]))
{
if($_GET["action"] == "delete")
{
foreach($_SESSION["cart"] as $keys => $values)
{
if($values["food_id"] == $_GET["id"])
{
unset($_SESSION["cart"][$keys]);
echo '<script>alert("Item has been removed")</script>';
echo '<script>window.location="cart.php"</script>';
}
}
}
}

if(isset($_GET["action"]))
{
if($_GET["action"] == "empty")
{
foreach($_SESSION["cart"] as $keys => $values)
{

unset($_SESSION["cart"]);
echo '<script>alert("Cart is made empty!")</script>';
echo '<script>window.location="cart.php"</script>';

}
}
}


?>

<script type="text/javascript">
   if(window.location.href.substr(-2) !== "?r") {
      window.location = window.location.href + "?r";
    }
</script>
    </body>
</html>
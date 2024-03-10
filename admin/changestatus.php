<?php
include("db_connect.php");
session_start();
extract($_REQUEST);
if(isset($updstatus))
{
	if(empty($_SESSION['id']))
{
	  if(mysqli_query($conn,"update orders set status='$status', del_time = NOW() where id='$order_id'"))
	  {
		  header("location:manage_orders.php");
	  }
}
else
{
	header("location:category.php?msg=You Must Login First");
}
}

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Change Order Status</title>
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
  width: 80%;
  max-width: 600px;
  height: auto;
  margin: 5% auto;
  padding: 20px;
  background: rgba(255, 255, 255, 0.9);
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  border-radius: 10px;
  border: 1px solid rgba(0, 0, 0, 0.1);
  color: #333;
  text-align: center;
  transition: transform 0.3s ease-in-out;
}

.container:hover {
  transform: scale(1.02);
  transition: transform 0.3s ease-in-out;
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
  margin-top: 20px;
  width: auto;
}

.btn-primary:hover {
  background-color: #2980b9;
  box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
  transform: scale(1.02);
  transition: transform 0.3s ease-in-out;
}

.text1 {
  margin-top: 20px;
  margin-bottom: 10px;
  font-size: 30px; /* Adjusted font size for a more balanced look */
  font-weight: bold;
  text-align: center;
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
      width: auto;
      max-width: none;
      padding: 10px 20px;
	  transition: transform 0.3s ease-in-out;
    }
    .menu-toggle {
            display: none;
        }       

}
.custom-form {
      margin-top: 20px;
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
    function showSuccessMessage() {
    alert("Status successfully updated!");
}
	</script>

    <div class="text1">
        <?php echo "Update Order Status"; ?><br><br>
    </div>

    <div class="container">
        <form method="post">
            <div class="row">
                <div class="col-sm-4">
                    Preparing
                    <input type="radio" name="status" value="Preparing">
                    &nbsp;&nbsp;&nbsp;

                    Ready for Delivery
                    <input type="radio" name="status" value="Ready for Delivery">
                    &nbsp;&nbsp;&nbsp;
                    
                    Delivered<input type="radio"  name="status" value="Delivered">
                    &nbsp;&nbsp;&nbsp;

                    Cancel Order
                    <input type="radio" name="status" value="Cancelled">
                    <br><br>

                    <button type="submit" class="btn-primary" name="updstatus" onclick="showSuccessMessage()">Update Status</button>
                </div>
                <div class="col-sm-4"></div>
            </div>
        </form>
    </div>
   

</body>

</html>

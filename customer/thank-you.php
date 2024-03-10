<?php 
    session_start();
/*
     if(!isset($_SESSION['confirm_order']) || empty($_SESSION['confirm_order']))
     {
         header('location:home.php');
         exit();
     }

    require_once('config_info.php');    

    
	$pageTitle = 'Demo Thank You';
	$metaDesc = 'Demo PHP shopping cart thank you page';
*/	
?>
<html>
<head>
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
.btn-secondary {
    background-color: #7bed9f;
    color: black;
    padding: 15px 25px; /* Increased padding for a larger button */
    text-decoration: none;
    font-weight: bold;
    border: 2px solid #7bed9f; /* Increased border width */
    border-radius: 8px; /* Increased border-radius for more rounded corners */
    font-size: 18px; /* Increased font size */
    transition: background-color 0.3s ease;
}

.btn-secondary:hover {
    background-color: #2ed573;
    border-color: #2ed573;
    color: white;
}


h1{
    margin-top: 15%; /* Increased margin-top for better spacing */
    margin-bottom: 10px; /* Adjusted margin-bottom for better spacing */
    font-size: 90px; /* Slightly reduced font size for a cleaner look */
    text-align: center; /* Align the title to the left */
}
p{
   
    font-size: 30px; /* Slightly reduced font size for a cleaner look */
    text-align: center; /* Align the title to the left */
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
<div class="row">
    <div class="col-md-12">
        <h1>Thank you!</h1>
      <center>  <p>
            Your order has been placed.</center>
            <?php unset($_SESSION['confirm_order']);?>
        </p>
    </div>
</div><center>
<form action="orders.php">
<button class="btn-secondary">Proceed to My Orders</button></center></form>
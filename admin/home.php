
<?php include('db_connect.php');


session_start();

if (!isset($_SESSION['adminUsername'])) {
    header("Location: ../index.php");
}
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
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
    background: linear-gradient(3deg, #2c3e50, white,  #2c3e50); /* Dark gradient background */
    opacity: 0.8; /* Adjust the opacity as needed */
    z-index: -1; /* Place the pseudo-element behind the content */
}

.wrapper {
            padding: 0%;
            width: 80%;
            margin: 0 auto;
            text-align: center;
            margin-left: 20%;
        }
        @media screen and (max-width: 480px) {
            /* Adjust styles for screens up to 480px width */
            .wrapper {
                width: 95%;
                margin-left: 15%;
            }
            .stext{
                font-size: 3vw;
            }
        }

        p {
            font-size: 2rem;
            margin-bottom: 10px;
        }

        text {
            color: #5d9e5f;
            font-size: 18px;
            margin-bottom: 20%;
            margin-right: 10px;
        }

        .col-4 {
            width: 100%;
            margin: 1%;
            padding: 2%;
            float: none;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
            border-radius: 10px;
        }

        .col-4 h1 {
            font-size: 3rem;
            color: #333;
        }

        .col-4 a {
            text-decoration: none;
            color: black;
            font-weight: bold;
        }

        .col-4 a:hover {
            color: #5d9e5f;
        }

        .clearfix {
            clear: both;
        }

.text-center {
  text-align: center;
}

.clearfix {
  float: none;
  clear: both;
}

.tbl-full {
  width: 100%;
}

.tbl-30 {
  width: 30%;
}

table {
  border-collapse: collapse;
  width: 100%;
  margin-top: 30px;
}

th,
td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

tr:hover {
  background-color: #f5f5f5;
}

table tr th {
  border-bottom: 1px solid black;
  padding: 1%;
  text-align: left;
}

table tr td {
  padding: 1%;
}

.btn-primary,
.btn-secondary,
.btn-danger {
  width: 100%; /* Make buttons full width on smaller screens */
  max-width: none;
  margin: 10px 0; /* Add margin for better spacing */
}

.success {
  color: #2ed573;
}

.error {
  color: #5d9e5f;
}

.menu {
  border-bottom: 1px solid grey;
}

.menu ul {
  list-style-type: none;
}

.menu ul li {
  display: inline;
  padding: 1%;
}

.menu ul li a {
  text-decoration: none;
  font-weight: bold;
  color: #5d9e5f;
}

.menu ul li a:hover {
  color: #5d9e5f;
}

.main-content {
  background-color: black;
  padding: 3% 0;
}

        .main-content {
            padding: 3% 0;
            background-color: #ffda79;
        }

        p {
            text-align: center;
            font-size: 50px;
            font-family: sans-serif;
            letter-spacing: 5px;
            font-weight: bold;
            word-spacing: 5px;
        }

        .active {
            border-color: white;
            border-left-color: black;
            border-top-color: black;
            color: white;
            background-color: #001a33;
        }

        .col-4 {
            width: 18%;
            background-color: white;
            margin: 1%;
            padding: 2%;
            float: left;
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
        margin-bottom: 20px;
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
.stext {

    font-size: 1vw; /* Adjust the font size using viewport units */
}

@media screen and (max-width: 600px) {
    .stext {
        font-size: 4vw; /* Adjust the font size for screens with a width of 600 pixels or less */
    }
    .col-4 {
        width: 100%; /* Make the column take up the full width on smaller screens */
    }
}

</style>
<div class="sidenav">
    <div class="text">
    
    <i class="fa fa-user-circle-o" style="font-size:40px; color:white;  margin-left:110px; margin-top: 20px"> 
    </i><br><div style="font-size:20px; color:white; text-align: center"> <?php echo " " . $_SESSION['adminUsername'] . ""; ?></div> <br><br><br><br><br>
    </div>
    <a href="home.php" class="active"><i class="fa fa-home" aria-hidden="true"></i> Dashboard</a>
<a href="category.php"><i class="fa fa-list-alt" aria-hidden="true"></i> Category</a>
<a href="item.php"><i class="fa fa-list"></i> Items</a>
<a href="manage_orders.php" class="expandHome"><i class="fa fa-shopping-cart"></i> Manage Orders</a>
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

    <div class="wrapper">
<p>Administrator Dashboard</p>
                <!-- Add three-line button for small screens -->
                <div class="menu-toggle" onclick="toggleNav()">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
  
     <br><br>
        <br><br>

        <div class="col-4 text-center"style="background:url(Images/g1.jpg);">

            <?php 
      
                $sql = "SELECT * FROM category";
            
                $res = mysqli_query($conn, $sql);
      
                $count = mysqli_num_rows($res);
            ?>

            <h1><?php echo $count; ?></h1>
            <br />
            <a href = "category.php" class="stext"> Tool Categories</a>

        </div>

        <div class="col-4 text-center"style="background:url(Images/g1.jpg);">

            <?php 
              
                $sql2 = "SELECT * FROM food";
                
                $res2 = mysqli_query($conn, $sql2);
           
                $count2 = mysqli_num_rows($res2);
            ?>

            <h1><?php echo $count2; ?></h1>
            <br />
            <a href = "item.php"class="stext"> Tools</a>
        </div>

        <div class="col-4 text-center"style="background:url(Images/g1.jpg);" >
            
            <?php 
              
                $sql3 = "SELECT * FROM orders";
            
                $res3 = mysqli_query($conn, $sql3);
     
                $count3 = mysqli_num_rows($res3);
            ?>

            <h1><?php echo $count3; ?></h1>
            <br />
            <a href = "manage_orders.php"class="stext">Total Orders</a>
        </div>

        <div class="col-4 text-center"style="background:url(Images/g1.jpg);">
            
            <?php 
                $sql4 = "SELECT SUM(total_price) AS Total FROM orders WHERE status='Delivered'";

                $res4 = mysqli_query($conn, $sql4);

                $row4 = mysqli_fetch_assoc($res4);
                
                $total_revenue = $row4['Total'];

            ?>

            <h1>PHP <?php echo $total_revenue; ?></h1>
            <br />
            <a href = "manage_orders.php"class="stext">Revenue Generated</a>
        </div>

        <div class="col-4 text-center"style="background:url(Images/g1.jpg);">
            
            <?php 
                $sql6 = "SELECT * FROM orders WHERE status = 'To Process' or status = 'Preparing' or status = 'Ready for Delivery'";
          
                $res6 = mysqli_query($conn, $sql6);
          
                $count6 = mysqli_num_rows($res6);
            ?>

            <h1><?php echo $count6; ?></h1>
            <br />
            <a href = "manage_orders.php"class="stext"> Pending Orders</a>
        </div>

        <div class="col-4 text-center"style="background:url(Images/g1.jpg);">
            
            <?php 
             
                $sql7 = "SELECT * FROM orders WHERE status = 'Out for Delivery'";
      
                $res7 = mysqli_query($conn, $sql7);
       
                $count7 = mysqli_num_rows($res7);
            ?>

            <h1><?php echo $count7; ?></h1>
            <br />
            <a href = "manage_orders.php"class="stext"> On Delivery Orders </a>
        </div>


        <div class="col-4 text-center"style="background:url(Images/g1.jpg);">
            
            <?php 
            
                $sql7 = "SELECT * FROM orders WHERE status = 'Cancelled' OR status= 'Delivery Failed'";
             
                $res7 = mysqli_query($conn, $sql7);
             
                $count7 = mysqli_num_rows($res7);
            ?>

            <h1><?php echo $count7; ?></h1>
            <br />
            <a href = "manage_orders.php"class="stext">Cancelled Orders</a>
        </div>


        <div class="col-4 text-center"style="background:url(Images/g1.jpg);">
            
            <?php 
      
                $sql8 = "SELECT * FROM users";
           
                $res8 = mysqli_query($conn, $sql8);
     
                $count8 = mysqli_num_rows($res8);
            ?>

            <h1><?php echo $count8; ?></h1>
            <br />
            <a href = "admin_management.php"class="stext">System Administrator</a> 
        </div>

        <div class="clearfix"></div>
        <br><br> <br><br><br>
    </div>
</div>
</body>
</html> 
<?php 
include 'db_connect.php'; 
session_start();

error_reporting(0);

?>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Contractor Management</title>
        
        <style type="text/css">
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
        margin-top: auto;
    }

    .container:hover {
        transform: scale(1.02);
        transition: transform 0.3s ease-in-out;
    }

        .img{
            position: absolute;
            margin-top: 5%;
            margin-left: 25%;
            margin-right: 30%;
        }
        .userlist{
            font-family: Verdana, sans-serif; 
            font-size: 30px; 
            color: #000;
            padding-top: 20px; 
            text-align: center;
        }
        .des{
            font-family: Arial, sans-serif; 
            font-size: 14px; 
            color: #000;
            margin-left: 50px;
            padding-top: 20px; 
            text-align: left;
        }
        .table {
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.8); /* Darker box shadow */
    background-color: #2c3e50; /* Dark background color */
    margin-top: auto;
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

        #delete{
            padding: 5px;
            border-radius: 3px;
            background-color:#800000;
            color:#ffffff;
        }
        .acceptbutton {
            background-color:#2ed573;
             -webkit-border-radius: 10px;
            border-radius: 3px;
            border: none;
            color: #FFFFFF;
            cursor: pointer;
            display: inline-block;
            font-family: Arial;
            font-size: 20px;
            padding: 3px 7px;
            text-align: center;
            text-decoration: none;
        }

        .delbutton {
            background-color: #ff4757;
            -webkit-border-radius: 10px;
            border-radius: 3px;
            border: none;
            color: #FFFFFF;
            cursor: pointer;
            display: inline-block;
            font-family: Arial;
            font-size: 20px;
            padding: 3px 7px;
            text-align: center;
            text-decoration: none;
        }
        .updatebutton {
            background-color: #0046FF;
            -webkit-border-radius: 10px;
            border-radius: 3px;
            border: none;
            color: #FFFFFF;
            cursor: pointer;
            display: inline-block;
            font-family: Arial;
            font-size: 20px;
            padding: 3px 7px;
            text-align: center;
            text-decoration: none;
        }
        .btn{
                padding: 5px 10px;
                background-color: #3498db;
                color: #fff;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                transition: background-color 0.3s;
                margin-left: 15%;
                }
                @media screen and (max-width: 768px) {
                .file-label {
                    padding: 5px;
                }

                .file-input-container {
                    width: 100%;
                    margin-bottom: 10px;
                } .form-label {
                        padding: 10px;
                        font-weight: bold;
                    }
            }
    .btn1:hover{
            background-color:#ddd; 
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
    margin-left: 15%;
    margin-top: 40px; /* Adjusted margin-top for space on top */
}
.btn-primary1 {
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
    margin-left: 15%;
   
}

.btn-primary:hover {
    background-color: #2980b9;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    transform: scale(1.02);
    transition: transform 0.3s ease-in-out;
}
.btn-primary1:hover {
    background-color: #2980b9;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    transform: scale(1.02);
    transition: transform 0.3s ease-in-out;
    
}

h2 {
    margin-top: 20px; /* Increased margin-top for better spacing */
    margin-bottom: -50px; /* Adjusted margin-bottom for better spacing */
    font-size: 40px; /* Slightly reduced font size for a cleaner look */
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
        margin-left: 30px;
    }

    .btn-primary:hover {
        background-color: #2980b9;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        transform: scale(1.02);
        transition: transform 0.3s ease-in-out;
    }
    .btn-primary1 {
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
        margin-left: 30px;
    }

    .btn-primary1:hover {
        background-color: #2980b9;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        transform: scale(1.02);
        transition: transform 0.3s ease-in-out;
    }
    .delbutton {
    background-color: #ff6666; /* Red background color */
    color: #ffffff; /* White text color */
    padding: 10px 20px; /* Adjust padding as needed */
    text-decoration: none; /* Remove underline */
    border-radius: 5px; /* Add rounded corners */
    display: inline-block; /* Make it a block-level element */
    transition: background-color 0.3s ease; /* Smooth transition on hover */
}

.delbutton:hover {
    background-color: #cc0000; /* Darker red on hover */
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
      width: 20%;
      max-width: none;
      padding: 10px 20px;
    }
    .btn-primary1 {
      width: 25%;
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
<a href="manage_orders.php" class="expandHome"><i class="fa fa-shopping-cart"></i> Manage Orders</a>
<a href="all_users.php"  class="active"><i class="fa fa-users"></i> User Management</a>
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
        window.location.href = 'item.php?row_limit=' + selectedRowLimit;
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
    function deleteCustomer(customerId) {
        // Display a confirmation dialog
        var confirmation = confirm('Are you sure you want to delete this customer?');

        // Check if the user clicked "OK" in the confirmation dialog
        if (confirmation) {
            // Redirect to the delete_admin.php script with the adminId
            window.location.href = 'delete_admin.php?id=' + customerId;
        } else {
            // Do nothing if the user clicked "Cancel"
            alert('Deletion canceled.');
        }
    }
</script>

<div class="main-content">
    <div class="wrapper">
              <!-- Add three-line button for small screens -->
              <div class="menu-toggle" onclick="toggleNav()">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>

        <div class = "container">
            <header>
                <?php
                    echo "CUSTOMER MANAGEMENT";
                ?>
            </header>
        </div>
       
        </div>
        <form action="all_users.php">
				<button name="submit" class="btn-primary">Go Back</button>
                </form>
       
               
                <table class="table table-bordered" id = "details">
                <tr>
                    <th>CUSTOMER NO.</th>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>CONTACT NO.</th>
                    <th>ACTION</th>
                </tr>

                <?php 

if(isset($_SESSION['delete']))
{
    echo $_SESSION['delete'];
    unset($_SESSION['delete']);
}

$sql = "SELECT * FROM customer";

$res = mysqli_query($conn, $sql);

$count = mysqli_num_rows($res);


$sn=1;


if($count>0)
{
  
    while($row=mysqli_fetch_assoc($res))
    {
        $id = $row['id'];
        $name = $row['name'];
        $username = $row['username'];
        $email = $row['email'];
        $contact = $row['contact'];
       

        ?>

            <tr>
                <td><?php echo $sn++; ?> </td>
                <td><?php echo $name; ?></td>
                <td><?php echo $email; ?></td>
                <td><?php echo $contact; ?></td>
                <td>
                    <a href="delete_customer.php" onclick="deleteAdmin(<?php echo $id; ?>)" class="delbutton">Delete</a>
                </td>
            </tr>

        <?php

    }
}
else
{
    ?>

    <tr>
        <td colspan="6"><div class="error">No Category Added.</div></td>
    </tr>

    <?php
}

?>




</table>

    
</body>
<?php
session_start();
require 'config_info.php';

if (!isset($_SESSION['username'])) {
    header("location: ../customer_login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>User Profile</title>
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

        .container {
            height: 100vh;
        }

        .card {
    box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
    width: 80%;
    max-width: 380px;
    border: none;
    border-radius: 15px;
    padding: 20px; /* Increased padding for better spacing */
    background-color: #fff;
    position: relative;
    height: auto;
    margin-top: 5%;
    margin-left: auto;
    margin-right: auto;
    transition: transform 0.3s ease-in-out; /* Adding a smooth transition effect */
}

.card:hover {
    transform: scale(1.05); /* Scaling up the card on hover */
}

.card::before {
    content: ""; /* Adding a pseudo-element for decorative purposes */
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    border-radius: 15px;
   
    opacity: 0.8;
}

.card h2 {
    font-size: 24px;
    color: #2d3436; /* Changing text color */
    margin-bottom: 10px;
}

.card p {
    font-size: 16px;
    color: #636e72; /* Changing text color */
    line-height: 1.6; /* Improving line spacing */
}


        .upper img {
            width: 100%;
            border-radius: 10px;
            border-top-right-radius: 10px;
            height: 260px;
        }

        .user {
            position: relative;
        }

        .profile img {
            height: 90px;
            width: 90px;
            text-align: center;
            
        }

        .profile {
            position: absolute;
            top: -50px;
            left: 50%;
            transform: translateX(-50%);
            height: 90px;
            width: 90px;
            border: 3px solid #fff;
            border-radius: 50%;
        }

        .follow {
            border-radius: 15px;
            padding-left: 20px;
            padding-right: 20px;
            height: 35px;
        }

        .stats span {
            font-size: 29px;
        }
        h2{
    margin-top: 20px; /* Increased margin-top for better spacing */
    margin-bottom: 10px; /* Adjusted margin-bottom for better spacing */
    font-size: 36px; /* Slightly reduced font size for a cleaner look */
    text-align: left; /* Align the title to the left */
}
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
<a href="orders.php"  class="expandHome"><i class="fa fa-list-alt" aria-hidden="true"></i> My Orders</a>
<a href="account.php"class="active" ><i class="fa fa-user" aria-hidden="true"></i> Account</a>
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
    <div class="container d-flex justify-content-center align-items-center">
        <div class="card">
            <div class="upper">
                <img src="new.png" class="img-fluid" alt="User Image">
            </div>

            <div class="user text-center">
                <div class="profile">
                    <img src="image/user.png" alt="Profile Image">
                </div>
            </div>

            <center>
                <div class="mt-5 text-center">
                    <br><br><br>
                    <h3 class="mb-0"><?php echo $_SESSION['username']; ?></h3>
                    <span class="text-muted d-block mb-2"> <?php
                                                            $name = $_SESSION['username'];
                                                            $sql3 = "SELECT email FROM customer where username = '$name'";
                                                            $res3 = mysqli_query($conn, $sql3);
                                                            while ($row = mysqli_fetch_assoc($res3)) {
                                                                $email = $row['email'];
                                                                echo $email;
                                                            }
                                                            ?></span>
                    <br>

                    <div class="d-flex justify-content-between align-items-center mt-4 px-4">
                        <br><br>
                        <div class="stats">
                            <h3 class="mb-0"><i class="fa fa-shopping-cart" style="font-size:38px;color:red"></i><br>Completed Orders</h3>
                            <?php
                            $name = $_SESSION['username'];
                            $sql3 = "SELECT * FROM orders where customer_username = '$name' and status = 'Delivered'";
                            $res3 = mysqli_query($conn, $sql3);
                            $count3 = mysqli_num_rows($res3);
                            ?>
                            <h4><?php echo $count3; ?></h4>
                            <br />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

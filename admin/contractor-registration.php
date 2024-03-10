<?php

include '../admin/db_connect.php';

error_reporting(0);

session_start();

if (isset($_POST['submit'])) {
    $riderUsername = $_POST['riderUsername'];
    $riderName = $_POST['riderName'];
    $riderEmail = $_POST['riderEmail'];
    $contact = $_POST['contact'];
    $riderPassword = md5($_POST['riderPassword']);
    $cpassword = md5($_POST['cpassword']);

    // Check if password length is less than 8 characters
    if (strlen($_POST['riderPassword']) < 8) {
        echo '<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <script type="text/javascript">
            $(document).ready(function() {
                swal({
                    title: "Password should be at least 8 characters long!",
                    icon: "error",
                    button: "Ok",
                    timer: 2000
                });

                setTimeout(function(){
                    // Add any additional actions here if needed
                }, 2000); // Wait for 2 seconds before executing additional actions
            });
            </script>';
    } else {
        if ($riderPassword == $cpassword) {
            $sql = "SELECT * FROM riders WHERE riderEmail='$riderEmail'";
            $result = mysqli_query($conn, $sql);
            if (!$result->num_rows > 0) {
                $sql = "INSERT INTO riders (riderName, riderUsername, riderEmail, contact, riderPassword)
                        VALUES ('$riderName','$riderUsername', '$riderEmail', '$contact', '$riderPassword')";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo '<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
                    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                    <script type="text/javascript">
                    $(document).ready(function() {
                        swal({
                            title: "Registration Complete!",
                            icon: "success",
                            button: "Ok",
                            timer: 2000
                        });
                    });
                    </script>';
                    $riderName = "";
                    $riderUsername = "";
                    $riderEmail = "";
                    $contact = "";
                    $_POST['riderPassword'] = "";
                    $_POST['cpassword'] = "";
                } else {
                    echo '<script src="../assets/js/sweetalert.js"></script>
                    <script src="../assets/js/sweetalert2.js"></script>
                    <script type="text/javascript">
                    $(document).ready(function() {
                        swal({
                            title: "Something Went Wrong!",
                            icon: "error",
                            button: "Ok",
                            timer: 2000
                        });
                    });
                    </script>';
                }
            } else {
                echo '<script src="../assets/js/sweetalert.js"></script>
                <script src="../assets/js/sweetalert2.js"></script>
                <script type="text/javascript">
                $(document).ready(function() {
                    swal({
                        title: "Email Already Exists!",
                        icon: "error",
                        button: "Ok",
                        timer: 2000
                    });
                });
                </script>';
            }
        } else {
            echo   '<script src="../assets/js/sweetalert.js"></script>
                <script src="../assets/js/sweetalert2.js"></script>
                <script type="text/javascript">
                $(document).ready(function() {
                    swal({
                        title: "Password Not Matched!",
                        icon: "error",
                        button: "Ok",
                        timer: 2000
                    });
                });
                </script>';
        }
    }
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<style>
	*{
        box-sizing: border-box;
        padding: 0;
        margin: 0; 
    }
    body {
        background: #4a69bd;
    font-family: Arial, sans-serif;
    min-height: 100vh; /* Set a minimum height for the body to ensure background visibility */
    position: relative;
    }
    body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
           /* background: url('../img/new.png') center/cover no-repeat;*/
           background-color: #ffffff;
            opacity: 0.4; /* Adjust the opacity as needed */
            z-index: -1; /* Place the pseudo-element behind the content */
        }
	.register {
        margin-top: 5%; 
        margin-left: 3%;
		position: absolute;
	}
	.text1{
        text-align: center;
        font-family: Arial Black;
        font-weight: bold;
        font-size: 40px;
        padding-top: 0%;
        color: black;
	
     
        }
        .container {
            width: 70%;
            max-width: 400px;
            margin: 5% auto;
            background: rgba(255, 255, 255, 0.25);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.18);
            color: #ffffff;
            position: relative;
            padding: 20px; /* Added padding for better spacing */
        }
	.register-text {
            padding: 20px; /* Adjusted padding for responsiveness */
            text-align: center;
            font-family: Arial, sans-serif;
            font-size: 2em; /* Adjusted font size for responsiveness */
            color: #ffffff;
}

    input[type=text],
    input[type=email],
    input[type=password] {
            margin-left: 10%; /* Adjusted margin for responsiveness */
            margin-bottom: 5%; /* Adjusted margin for responsiveness */
            border: none;
            text-align: center;
            -webkit-appearance: none;
            -ms-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background: #f2f2f2;
            padding: 12px;
            border-radius: 3px;
            width: 80%; /* Adjusted width for responsiveness */
            outline: none;
    }

.btn {
    text-align: center;
    width: 50%;
    max-width: 200px; /* Added max-width for responsiveness */
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin-top: 5%; /* Adjusted margin for responsiveness */
    margin-left: 25%; /* Adjusted margin for responsiveness */
    border: none;
    border-radius: 4px;
    cursor: pointer;
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
    }


	.login-register-text{
		margin-top: 20px; 
		text-align: center; 
	}
    .sidenav {
    height: 100%;
    width: 250px;
    position: fixed;
    z-index: 1;
    top: 0;
    left: -250px;
    background: linear-gradient(to right, #2c3e50, #1a252f); /* Updated gradient background */
    overflow-x: hidden;
    padding-top: 20px;
    transition: 0.5s;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
}

.sidenav:hover {
    left: 0;
}

.sidenav a {
    padding: 15px 20px; /* Increased padding for better spacing */
    text-decoration: none;
    font-size: 16px; /* Adjusted font size for better readability */
    color: #ecf0f1; /* Light text color for contrast */
    display: block;
    transition: background-color 0.3s, box-shadow 0.3s;
    border-radius: 5px;
    margin-bottom: 5px;
}

.sidenav a:hover {
    background-color: #34495e; /* Darker background color on hover */
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
}

.sidenav a.active {
    background-color: #2980b9; /* Active link color */
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
}

/* Add a transition for smoother content movement */
.main-content {
    margin-left: 0;
    padding: 20px;
    transition: margin-left 0.5s ease;
}

/* Adjustments for smaller screens */
@media screen and (min-width: 769px) {
    .sidenav {
        left: 0;
    }

    .main-content {
        margin-left: 250px;

    }
    .btn-primary {
      width: 12%;
      max-width: none;
      padding: 10px 20px; 
    }       
    .container{
        width: 90%; /* Adjusted width for smaller screens */
        
    }   

}
	</style>

	<title>Register Form</title>
</head>
<body>

<div class="sidenav">
    <div class="text">
    
    <i class="fa fa-user-circle-o" style="font-size:40px; color:white;  margin-left:110px; margin-top: 20px"> 
    </i><br><div style="font-size:20px; color:white; text-align: center"> <?php echo " " . $_SESSION['adminUsername'] . ""; ?></div> <br><br><br><br><br>
    </div>
<a href="home.php"><i class="fa fa-home"  style="font-size:24px"aria-hidden="true"></i> Dashboard</a>
<a href="category.php"><i class="fa fa-list-alt" aria-hidden="true"></i> Category</a>
<a href="item.php"><i class="fa fa-list"></i> Items</a>
<a href="manage_orders.php"   class="expandHome"><i class="fa fa-shopping-cart"></i> Manage Orders</a>
<a href="all_users.php" class="active"><i class="fa fa-users"></i> User Management</a>
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
</script>
<div class="header" >
    
	<div class="text1" >
		
		<?php
			echo "Contractor Registration";
		?>
	</div>
</div>

<button onclick="window.location.href='../admin/rider_management.php';"class="btn-primary">
     Contractor Management
    </button>

	<div class="container">
    <form action="" method="POST" class="login-email">
            <center><p class="login-text" style="font-size: 1.5rem; font-weight: 800; color: gray;">Registration Form</p></center>
			<br><div class="input-group">
				<input type="text" placeholder="Name" name="riderName" value="<?php echo $riderName; ?>" required>
			</div>
            <div class="input-group">
				<input type="text" placeholder="Username" name="riderUsername" value="<?php echo $riderUsername; ?>" required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="riderEmail" value="<?php echo $riderEmail; ?>" required>
			</div>
            <div class="input-group">
				<input type="text" placeholder="Contact Number" name="contact" value="<?php echo $contact; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="riderPassword" value="<?php echo $_POST['riderPasswords']; ?>" required>
            </div>
            <div class="input-group">
				<input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn"> Register</button>
			</div>
				</form>
	</div>
   
	
</body>
</html>
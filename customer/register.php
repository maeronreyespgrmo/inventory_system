<?php

include 'config_info.php';

error_reporting(0);

session_start();

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);

    // Check if password length is less than 8 characters
    if (strlen($_POST['password']) < 8) {
        echo '<script src="../assets/js/sweetalert.js"></script>
            <script src="../assets/js/sweetalert2.js"></script>
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
                }, 1000); // Wait for 2 seconds before executing additional actions
            });
            </script>';
    } else {
        if ($password == $cpassword) {
            $sql = "SELECT * FROM customer WHERE email='$email'";
            $result = mysqli_query($conn, $sql);
            if (!$result->num_rows > 0) {
                $sql = "INSERT INTO customer (name, username, email, contact, password)
                        VALUES ('$name','$username', '$email', '$contact', '$password')";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo '<script src="../assets/js/sweetalert.js"></script>
                    <script src="../assets/js/sweetalert2.js"></script>
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
                    $name = "";
                    $username = "";
                    $email = "";
                    $contact = "";
                    $_POST['password'] = "";
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
	<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
	<style>
* {
    box-sizing: border-box;
    padding: 0;
    margin: 0;
    }
    body {
            background: #22a6b3;
            font-family: Arial, sans-serif;
            background-image: url('../img/new.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
        .topnav {
        overflow: hidden;
        background-color: #333;
        
        }

        .topnav a {
        float: left;
        display: block;
        color: #f2f2f2;
        text-align: center;
        padding: 14px 5%;
        text-decoration: none;
        font-size: 17px;
        margin-left: 15%;
        
        }

        .topnav a:hover {
        background-color: #ddd;
        color: black;
        }

        .topnav a.active {
        background-color: #00B6CB;
        color: white;
        }

        .topnav .icon {
        display: none;
        }
        .register {
        margin-top: 5%; 
        margin-left: 3%;
		position: absolute;
	}
	.logo {
        margin-top: 2%; 
        margin-left: 62%;
		position: fixed; 
		z-index: -2;
	}
	.text1{
        text-align: center;
        font-family: Arial Black;
        font-weight: bold;
        font-size: 40px;
        padding-top: 0%;
        color: black;
        margin-top: 40px;
        color: white;
	
     
        }
        .container {
            width: 70%;
            max-width: 400px;
            margin: 5% auto;
            background: rgba(223, 223, 223, 0.8);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            backdrop-filter: blur(40px);
            -webkit-backdrop-filter: blur(14px);
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.18);
            color: #ffffff;
            position: relative;
            padding: 20px; /* Added padding for better spacing */
            margin-top: 10px;
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
.login-register-text{
		margin-top: 20px; 
		text-align: center; 
	}
/* Media Query for smaller screens */
@media screen and (max-width: 768px) {
    .register,
    .logo {
        display: none; /* Hide the background images on smaller screens */
    }

    .container {
        width: 90%; /* Adjusted width for smaller screens */
    }
    .container {
                width: 80%;
            }

            input[type=email],
            input[type=password] {
                width: 80%;
            }
            .login {
                margin-left: 0;
                text-align: center;
            }
            .topnav a:not(:first-child) {
                display: none;
            }

            .topnav a.icon {
                display: block;
            }

            .topnav.responsive a {
                display: block;
                width: 100%;
                text-align: center;
                margin: 0;
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
	
<div class="topnav" id="myTopnav">
        <a href="../home.php"><i class="fa fa-fw fa-home"></i>Home</a>
        <a href="../customer_login.php" class="active"><i class="fa fa-fw fa-user"></i>Login</a>
        <a href="../about.php"><i class="fa fa-fw fa-envelope"></i>About</a>
        <a class="icon" onclick="myFunction()">&#9776;</a>
    </div>

    <script>
        function myFunction() {
            var x = document.getElementById("myTopnav");
            if (x.className === "topnav") {
                x.className += " responsive";
            } else {
                x.className = "topnav";
            }
        }
    </script>

<div class="header" >
	<div class="text1" >
		<?php
			echo "Registration";
		?>
	</div>
</div>
	<div class="container">
    <form action="" method="POST" class="login-email">
            <center><p class="login-text" style="font-size: 1.5rem; font-weight: 800; color: black;">Registration Form</p></center>
			<br><div class="input-group">
				<input type="text" placeholder="Name" name="Name" value="<?php echo $name; ?>" required>
			</div>
            <div class="input-group">
				<input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
            <div class="input-group">
				<input type="text" placeholder="Contact Number" name="contact" value="<?php echo $contact; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['passwords']; ?>" required>
            </div>
            <div class="input-group">
				<input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn"> Register</button>
			</div>
            <p class="login-register-text" style="font-size : 1.1rem;">Have an account? <a href="../customer_login.php">Login Here</a>.</p>
				</form>
	</div>

	
</body>
</html>
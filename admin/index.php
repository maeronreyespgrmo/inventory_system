<?php 
include 'db_connect.php';

session_start();

error_reporting(0);

if (isset($_SESSION['adminUsername'])) {
    header("Location: home.php");
}

if (isset($_POST['submit'])) {
	$adminEmail = $_POST['adminEmail'];
	$adminPassword = md5($_POST['adminPassword']);

	$sql = "SELECT * FROM users WHERE adminEmail='$adminEmail' AND adminPassword='$adminPassword'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['adminUsername'] = $row['adminUsername'];
		header("Location: home.php");
	} else {
		echo'<script src="../assets/js/sweetalert.js"></script>
        <script src="../assets/js/sweetalert2.js"></script>
        <script type="text/javascript">
        $(document).ready(function() {
            swal({
                title: "Failed to Login!",
                icon: "error",
                button: "Ok",
                timer: 2000
            });
        });
    </script>';
	}
}

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administrator Login Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="all.css">
    <style type="text/css">
       * {
    box-sizing: border-box;
    padding: 0;
    margin: 0;
}

body {
    background: #22a6b3; /* Fallback color if the image is not available */
    font-family: Arial, sans-serif;
    background-image: url('images/new.png'); /* Replace 'your-image-url.jpg' with the actual path to your image */
    background-size: cover; /* This property ensures that the background image covers the entire body */
    background-repeat: no-repeat; /* This property prevents the background image from repeating */
    background-position: center; /* This property centers the background image */
}


.container {
    width: 70%;
    max-width: 400px;
    height: 500px;
    margin: 5% auto;
    background: rgba(255,255,255, .9); /* Blue background with 40% opacity */
    box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
    backdrop-filter: blur(14px);
    -webkit-backdrop-filter: blur(14px);
    border-radius: 10px;
    border: 1px solid rgba(255, 255, 255, 0.18);
    color: #ffffff;
    position: relative;
    margin-top: 1%;
}



        .text1{ 
            text-align: center;
            font-family: Arial Black;
            font-size: 50px;
            padding-top: 0%;
            color: #eb3b5a;
            margin-top: 0%;
        }
        .password{
            font-family: Helvetica, sans-serif; 
            font-size: 14px; 
            color: Black; 
            padding: 10px; 
            margin-left: 64px; 
        }
        .sub{
            padding: 5px; 
            margin-left: 60px;
        }
        .header2{
            padding:  2vw; /* Adjusted padding */
            text-align: center; 
            font-family: Arial, sans-serif; 
            font-size: 2vw; /* Adjusted font size */
            color: #ffffff;
        }
        .user{
            margin-top: 150px; 
            font-family: Verdana, sans-serif; 
            font-size: 14px; 
            color: Black; 
            padding: 4px; 
            margin-left: 70px;
        }
        button{
            width: 50%;
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            margin-top: 20px;
            margin-left: 50px; 
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        input[type=email],
        input[type=password] {
        width: 90%;
        margin-bottom: 3%;
        border: 2px solid black; /* Set a border color, adjust as needed */
        text-align: center;
        -webkit-appearance: none;
        -ms-appearance: none;
        -moz-appearance: none;
        appearance: none;
        background: #f2f2f2;
        padding: 12px;
        border-radius: 3px;
        outline: none;
        color: #333; /* Adjust text color for better visibility */
        border-radius: 10px;

}

        
        footer {  
        right: 20px;  
        bottom: 5px;  
        width: 100%;  
        color: white;  
        text-align: right;  
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
        footer {
        
            left: 0;
            bottom: 0;
            width: 100%;
            color: white;
            text-align: center;
            padding: 5px;
            margin-left: 40%;
            margin-top: -10%;
        }

        @media screen and (max-width: 768px) {
            /* Adjust styles for screens up to 768px width */
            .container {
                width: 80%;
            }

            input[type=email],
            input[type=password] {
                width: 100%;
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
        

        @media screen and (max-width: 480px) {
            /* Adjust styles for screens up to 480px width */
            .container {
                width: 95%;
            }

            .text1 {
                font-size: 3vw; /* Adjusted font size */
            }

            .login-text {
                padding: 1.5vw; /* Adjusted padding */
                font-size: 3vw; /* Adjusted font size */
                color: #333;
            }

            .login-register-text {
                margin-top: 3vw; /* Adjusted margin */
            }
        }
    
        </style>
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

<div class="header">
    
                <div class="text1">
                    
                    <?php
                        echo "WELCOME ADMINISTRATOR";
                    ?>
                </div>
            </div>

<div class="container">
		<form action="" method="POST" class="login-email">
        <div class="header2" style="font-size: 2rem; font-weight: 800; color:#333; margin-bottom: -100">
                <?php
                    echo"Administrator Login";
                ?>
            </div>
           
			<div class="user">
				<input type="email" placeholder="Email" name="adminEmail" value="<?php echo $adminEmail; ?>" required style= "width:250px;">
			</div>
			<div class="password">
				<input type="password" placeholder="Password" name="adminPassword" value="<?php echo $_POST['adminPassword']; ?>" required style= "width:250px;">
			</div>
			<div class="sub">
				<button name="submit" class="btn">Login</button>
			</div>
		
		</form>
	</div>
     

    <footer style="margin-bottom: 7%;margin-right: -0.5%;">
   <a href="../customer_login.php">
         <img alt="Qries" src="../admin/basket.png"
         width="75" height="60">
         </footer>


</body>

</html>


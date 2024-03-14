<?php 

include 'customer/config_info.php';

session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
header("Location: customer/home.php");
}

if (isset($_POST['submit'])) {
$email = $_POST['email'];
$password = md5($_POST['password']);

$sql = "SELECT * FROM customer WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
$row = mysqli_fetch_assoc($result);
$_SESSION['username'] = $row['username'];
header("Location: customer/itemlist.php");
} else {
echo'<script src="assets/js/sweetalert.js"></script>
<script src="assets/js/sweetalert2.js"></script>
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

<!DOCTYPE html>
<html>
<head>
<title>Login Page</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<style>

* {
box-sizing: border-box;
padding: 0;
margin: 0;
}
body {
font-family: Arial, sans-serif;
background-image: url('img/new.png');
background-size: cover;
background-repeat: no-repeat;
background-position: center;
}
.header2 {
text-align: center; 
color: black; 
margin-top: 15px;
font-family: Helvetica, sans-serif; 
font-size: 15px; 
}

.login {
margin-top: -4%;
margin-left: 3%;
position: absolute;
}

.text1 {
text-align: center;
font-family: Arial Black;
font-size: 4vw; /* Adjusted font size */
padding-top: 0%;
color: #b22426;
margin-top: 0%;
}

.container {
width: 70%; /* Adjusted width for better responsiveness */
max-width: 400px; /* Added max-width */
height: 400px;
margin: 5% auto; /* Centered the container */
background: rgba(223, 223, 223, 0.8);
box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
backdrop-filter: blur(14px);
-webkit-backdrop-filter: blur(14px);
border-radius: 10px;
border: 1px solid rgba(255, 255, 255, 0.18);
color: #ffffff;
position: relative;
margin-top: 1%;


}

input[type=email],
input[type=password] {
width: 90%; /* Adjusted width for better responsiveness */
margin-bottom: 3%;
border: none;
text-align: center;
-webkit-appearance: none;
-ms-appearance: none;
-moz-appearance: none;
appearance: none;
background: #f2f2f2;
padding: 12px;
border-radius: 3px;
outline: none;
margin-left: 15%;
}

.btn {
width: 50%;
background-color: #4CAF50;
color: white;
padding: 12px 20px;
margin-top: 20px;
margin-left: 85px; 
border: none;
border-radius: 4px;
cursor: pointer;
}

.login-text {
padding:  2vw; /* Adjusted padding */
text-align: center; 
font-family: Arial, sans-serif; 
font-size: 4vw; /* Adjusted font size */
color: #ffffff;
}

.login-register-text {
font-family: Arial, sans-serif; 
margin-top: 5%; /* Adjusted margin */
text-align: center; 
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
margin-left: 25%;
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
width: 100%;
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
<title>Login Form</title>
</head>
<body>
<div class="topnav" id="myTopnav">
<a href="home.php"><i class="fa fa-fw fa-home"></i>Home</a>
<a href="customer_login.php" class="active"><i class="fa fa-fw fa-user"></i>Login</a>
<a href="about.php"><i class="fa fa-fw fa-envelope"></i>About</a>
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
    echo "WELCOME CUSTOMER";
?>
</div>
</div>

<div class="container">
<form action="" method="POST" class="login-email">
<p class="login-text" style="font-size: 2rem; font-weight: 800; color:#333 ">Login</p>

<div class="user">
<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required style= "width:280px;">
</div>
<div class="password">
<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required style= "width:280px;">
</div>
<div class="sub">
<button name="submit" class="btn" style= "width:220px;">Login</button>
</div> 
<div class="header2">
Don't have an account? <a href="customer/register.php">Register Here</a>.</p>
</div> 
</form>
</div>

<footer>
<a href="admin/index.php">
<img alt="Qries" src="img/admin.png"
width="50" height="50">
</a><br>
</footer>
</body>
</html>



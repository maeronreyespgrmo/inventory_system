<?php 
include 'connect.php';

session_start();

error_reporting(0);

if (isset($_SESSION['riderUsername'])) {
header("Location: home.php");
}

if (isset($_POST['submit'])) {
$riderEmail = $_POST['riderEmail'];
$riderPassword = md5($_POST['riderPassword']);

$sql = "SELECT * FROM riders WHERE riderEmail='$riderEmail' AND riderPassword='$riderPassword'";
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
$row = mysqli_fetch_assoc($result);
$_SESSION['riderUsername'] = $row['riderUsername'];
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
<title>Contractor Login Page</title>
<link rel="stylesheet" href="../admin/all.css">
<style type="text/css">
*{
box-sizing: border-box;
padding: 0;
margin: 0; 
}
body {
background:#99ffe6;
}
.text1{ 
text-align: center;
font-family: Arial Black;
font-size: 50px;
padding-top: 0%;
color: #eb3b5a;
margin-top: 0%;
}
.container{
width: 400px;
height: 450px;
margin-top: 1%;
margin-left: 35%;
margin-right: 10%;
border-radius: 16px; 
border: 3px solid grey;
background-color:white; 
display: inline-grid; 
position: absolute;
}
.image{
margin-top:30px;
margin-left: 10px; 
position:absolute;

}
.deliverimg{
margin-top:-8%;
margin-left: -10%;
position:absolute;
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
text-align: center; 
color: Black; 
margin-top: 15px;
font-family: Helvetica, sans-serif; 
font-size: 22px; 
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
margin-left: 60px; 
border: none;
border-radius: 4px;
cursor: pointer;
}
button:hover {
background-color: #45a049;
}
input[type=email]{
margin-left: 0px; 
margin-bottom: 0px; 
border: none; 
text-align: left; 
-webkit-appearance: none; 
-ms-appearance: none; 
-moz-appearance: none; 
appearance: none; 
background: #f2f2f2; 
padding: 10px; 
border-radius: 3px; 
border: 1px solid gray;
width:100px; 
outline: none; 
}
input[type=password]{
margin-left: 0px; 
margin-bottom: 0px; 
border: none; 
text-align: left; 
-webkit-appearance: none; 
-ms-appearance: none; 
-moz-appearance: none; 
appearance: none; 
background: #f2f2f2; 
padding: 10px; 
border-radius: 3px;
border: 1px solid gray; 
width:100px; 
outline: none; 
}
footer {position: fixed;  
right: 20px;  
bottom: 5px;  
width: 100%;  
color: white;  
text-align: right;  
}
.active{
border-color: white;
border-left-color: black; 
border-top-color: black;
color: white; 
background-color: #663d00;
}
.header2{
text-align: center; 
color: Black; 
margin-top: 15px;
font-family: Helvetica, sans-serif; 
font-size: 15px; 
}

@media (max-width: 768px) {
.container {
width: 90%;
}
}
</style>
</head>
<body>

<nav class="navbar">

<div id="trapezoid" style = "padding-left: 30%;">


<a href="../home.php">Home</a>
<a href="../customer_login.php" class="active">Login</a>
<a href="../about.php" class="expandHome">About</a>

</div>
</nav>
<div class="header">

<div class="text1">
    
    <?php
        echo "WELCOME CONTRACTOR";
    ?>
</div>
</div>

<!-- <div class="deliverimg">
<img src="img/cons.png" style="width:90%; margin-left: 50%; margin-top: 20%">
</div> -->


<div class="container centerdiv">
<form action="" method="POST" class="login-email">
<div class="header2">
Contractor Login
</div>
<div class="image">
<img src="img/Construction-Icon.png"  width="115" height="90" style="margin-left: 115%;"> 
</div>
<div class="user">
<input type="email" placeholder="Email" name="riderEmail" value="<?php echo $riderEmail; ?>" required style= "width:250px;">
</div>
<div class="password">
<input type="password" placeholder="Password" name="riderPassword" value="<?php echo $_POST['riderPassword']; ?>" required style= "width:250px;">
</div>
<div class="sub">
<button name="submit" class="btn">Login</button>
</div>

</form>
</div>


<footer style="margin-bottom: 7%;margin-right: -0.5%;">
<a href="../customer_login.php">
<img alt="Qries" src="../admin/customer.png"
width="75" height="60">
</footer>


<footer style="margin-bottom: 1%; margin-right: -1%; margin-top:3%">
<a href="../admin/index.php">
<img alt="Qries" src="../riders/img/admin.png"
width="90" height="80">
</a><br>


</footer>



</body>

</html>


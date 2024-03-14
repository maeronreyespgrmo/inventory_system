<?php 
include 'customer/config_info.php';
session_start();
error_reporting(0);

if (isset($_SESSION['username'])) {
header("Location: home.php");
}
?>

<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Add Bootstrap CSS link -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<style type="text/css">
* {
box-sizing: border-box;
padding: 0;
margin: 0; 
}

body {
font-size: 100%;
background: #cedce3;
background-color: whitesmoke;
font-family: Arial, Helvetica, sans-serif;
position: relative;
}

.bg-image {
background-image: url("img/new.png");
height: 100vh;
padding: 0;
margin: 0;
background-position: center;
background-repeat: no-repeat;
background-size: cover;
opacity: 1;
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

@media screen and (max-width: 600px) {
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

/* Bootstrap Carousel */
#imageCarousel {
position: absolute;
top: 50%;
left: 50%;
transform: translate(-50%, -50%);
z-index: 1;
}
.custom-carousel-image {
width: 400px; /* Set your desired width */
height: auto; /* Maintain aspect ratio */
margin: auto; /* Center the image horizontally */
}
</style>
</head>

<body>

<div class="topnav" id="myTopnav">
<a href="home.php" class="active"><i class="fa fa-fw fa-home"></i>Home</a>
<a href="customer_login.php"><i class="fa fa-fw fa-user"></i>Login</a>
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

<div id="imageCarousel" class="carousel slide" data-ride="carousel" data-interval="3000"> <!-- Set the interval in milliseconds (e.g., 3000 for 3 seconds) -->
<div class="carousel-inner">
<div class="carousel-item active">
<img src="admin/Images/drill.jpg" class="d-block custom-carousel-image" alt="Image 1">
</div>
<div class="carousel-item">
<img src="admin/Images/gloves.png" class="d-block custom-carousel-image" alt="Image 2">
</div>
<div class="carousel-item">
<img src="admin/Images/glue.jpg" class="d-block custom-carousel-image" alt="Image 3">
</div>
<div class="carousel-item">
<img src="admin/Images/lumber.png" class="d-block custom-carousel-image" alt="Image 4">
</div>
<div class="carousel-item">
<img src="admin/Images/doorknob.png" class="d-block custom-carousel-image" alt="Image 5">
</div>
<div class="carousel-item">
<img src="admin/Images/bulb.png" class="d-block custom-carousel-image" alt="Image 6">
</div>
<div class="carousel-item">
<img src="admin/Images/grout.jpg" class="d-block custom-carousel-image" alt="Image 7">
</div>
<div class="carousel-item">
<img src="admin/Images/hammer.png" class="d-block custom-carousel-image" alt="Image 8">
</div>
<div class="carousel-item">
<img src="admin/Images/hardhat.png" class="d-block custom-carousel-image" alt="Image 9">
</div>
<div class="carousel-item">
<img src="admin/Images/padlock.jpg" class="d-block custom-carousel-image" alt="Image 10">
</div>
<div class="carousel-item">
<img src="admin/Images/paint.png" class="d-block custom-carousel-image" alt="Image 11">
</div>
<div class="carousel-item">
<img src="admin/Images/rake.jpg" class="d-block custom-carousel-image" alt="Image 12">
</div>
<div class="carousel-item">
<img src="admin/Images/rope.jpg" class="d-block custom-carousel-image" alt="Image 13">
</div>
<div class="carousel-item">
<img src="admin/Images/saw.jpg" class="d-block custom-carousel-image" alt="Image 14">
</div>
<div class="carousel-item">
<img src="admin/Images/screw.jpg" class="d-block custom-carousel-image" alt="Image 15">
</div>
<div class="carousel-item">
<img src="admin/Images/sealant.jpg" class="d-block custom-carousel-image" alt="Image 16">
</div>
<div class="carousel-item">
<img src="admin/Images/sealer.jpg" class="d-block custom-carousel-image" alt="Image 17">
</div>
<div class="carousel-item">
<img src="admin/Images/shovel.png" class="d-block custom-carousel-image" alt="Image 18">
</div>
<div class="carousel-item">
<img src="admin/Images/tape.png" class="d-block custom-carousel-image" alt="Image 19">
</div>
<div class="carousel-item">
<img src="admin/Images/wheeler.jpg" class="d-block custom-carousel-image" alt="Image 20">
</div>
<div class="carousel-item">
<img src="admin/Images/wrench.png" class="d-block custom-carousel-image" alt="Image 21">
</div>
<!-- Add more carousel items as needed -->

</div>
</div>

<a class="carousel-control-prev" href="#imageCarousel" role="button" data-slide="prev">
<span class="carousel-control-prev-icon" aria-hidden="true"></span>
<span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next" href="#imageCarousel" role="button" data-slide="next">
<span class="carousel-control-next-icon" aria-hidden="true"></span>
<span class="sr-only">Next</span>
</a>
</div>

<div class="bg-image"></div>

<!-- Add Bootstrap JS and Popper.js scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

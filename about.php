<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="css.css">
<link rel="stylesheet" href="admin/all.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">


<style type="text/css">

* {
box-sizing: border-box;
padding: 0;
margin: 0;
}
body {
background: #22a6b3;
font-family: Arial, sans-serif;
background-image: url('img/new.png');
background-size: cover;
background-repeat: no-repeat;
background-position: center;
}        
html {
box-sizing: border-box;
}

*, *:before, *:after {
box-sizing: inherit;
}

/* Add the following CSS to your existing styles */
.row {
display: flex;
justify-content: center;
align-items: center;
flex-wrap: wrap;
}

.column {
flex: 1;
margin: 8px;
padding: 0 8px;
padding-bottom: 10px;
}

.card {
box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
background-color: white;
padding-bottom: 10px;
text-align: center; /* Center text in the card */
border-radius: 10px;
}

.container {
padding: 0 10px;
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

.about-section {
background-color: #ffffff;
padding: 30px;
border-radius: 15px;
margin: 20px 0;
text-align: justify;
box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Add styles for the Developer section */
.developer-section {
text-align: center;
font-size: 2em;
border-bottom: 5px solid #00B6CB;
border-top: 5px solid #00B6CB;
color: #ffffff;
margin: 30px 0;
padding: 15px 0;
}

/* Additional adjustments for a cleaner look */
.developer-section {
letter-spacing: 1px;
font-weight: bold;
}

/* Add a subtle shadow to the sections for depth */
.about-section, .developer-section {
transition: box-shadow 0.3s;
}

.about-section:hover, .developer-section:hover {
box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

/* Add styles for the Developer card */
.developer-card {
box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
background-color: white;
padding-bottom: 10px;
text-align: center;
border-radius: 10px;
margin: 10px;
}

.developer-card img {
width: 100%;
border-top-left-radius: 10px;
border-top-right-radius: 10px;
}

.developer-container {
padding: 20px;
}

.developer-container h2 {
font-size: 130%;
margin-top: 10px;
}

.developer-container p.title {
font-size: 110%;
}

.developer-container p {
font-size: 130%;
}

.developer-container button {
background-color: #1D8894;
color: white;
padding: 10px 20px;
border: none;
border-radius: 5px;
font-size: 16px;
cursor: pointer;
transition: background-color 0.3s;
}

.developer-container button a {
color: white;
text-decoration: none;
}

.developer-container button:hover {
background-color: #155D6A;
}
</style>

</head>
<body>



<div class="topnav" id="myTopnav">
<a href="home.php"><i class="fa fa-fw fa-home"></i>Home</a>
<a href="customer_login.php"><i class="fa fa-fw fa-user"></i>Login</a>
<a href="about.php" class="active"><i class="fa fa-fw fa-envelope"></i>About</a>
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


<div class="about-section">
<h1 style="font-size: 30px;">About Us</h1>
<p style=" text-align: justify;">Welcome to W.A.L. General Merchant
W.A.L. General Merchant, located in Brgy. Calios, Sta. Cruz, Laguna, is a renowned hardware store in the area. Established in 1980, it has become one of the largest hardware stores in the region. The store specializes in offering a wide range of lumber services and construction materials, making it a go-to destination for those looking to undertake construction, renovation, or other related projects.

In addition to its main location in Brgy. Calios, W.A.L. General Merchant has extended its services by opening another branch in the Sta. Cruz Public Market. This branch also provides a comprehensive selection of products suitable for constructing and renovating houses, buildings, roads, and various other infrastructure projects.

With its long-standing presence and commitment to providing quality construction materials and lumber services, W.A.L. General Merchant has likely played a significant role in supporting the local community's building and renovation needs over the years.</p>
</div>
<br>

<?php
include('footer.php');
?>
</body>
</html>
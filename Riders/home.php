<?php 

session_start();

if (!isset($_SESSION['riderUsername'])) {
    
    header("Location: rider_login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="css/home.css">
    
    <link rel="stylesheet" href="../admin/all.css">
    <style type="text/css">

      	*{
        box-sizing: border-box;
        padding: 0;
        margin: 0; 
    }
body {
            font-size: 100%;
            background: #99ffe6;
            background-color:#99ffe6;
            font-family: Arial, Helvetica, sans-serif;
}

h1{
            background: linear-gradient(90deg, #ff0000, #ffff00, #ff00f3, #0033ff, #ff00c4, #ff0000);
            background-size:400%;
            font-size: 70px;
            font-family: sans-serif;
            letter-spacing: 5px;
            font-weight: 600;
            word-spacing: 5px;
            -webkit-text-fill-color: transparent;
            -webkit-background-clip: text;
            animation: animate 10s linear infinite;
}
@keyframes animate{
  0%{
    background-position: 0%;
  }
  100%{
    background-position: 400%;
  }
}
* {
            box-sizing: border-box;
}
p {
            background-image: url(img/demo.jpg);
            background-repeat: repeat;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-size: 130px;
            text-align: center;
            font-weight: bold;
            text-transform: uppercase;
            font-family: 'Steelfish Rg', 'helvetica neue',
                     helvetica, arial, sans-serif;
            font-weight: 800;
            -webkit-font-smoothing: antialiased;

        }
.bg-image {
            background-image: url("../image/3.jpg");
            filter: blur(6px);
            -webkit-filter: blur(6px);
            height: 100%;
            padding-top: 0%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            margin-top: 2.5%;
}
.bg-text {
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0, 0.6);
            color:white;
            font-weight: bold;
            border: 3px solid #f1f1f1;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 2;
            width: 80%;
            padding: 20px;
            text-align: center;
            font-size: 90px;
}

    </style>
</head>
<body>

<nav class="navbar">

<div id="trapezoid" style = "padding-left: 22%;">

<a href="home.php" class = "active">Home</a>
    <a href="orders.php" class="expandHome">Orders</a>
  <a href="account.php" class = "">My Account</a>
  <a href="logout.php" class = "">Logout</a>
</div>
</nav>

<div class="bg-image">
<img src="img/3.jpg" width="100%">
</div>
<div class="bg-text">
  <p>WELCOME Contractor</p>

  <h1><a href = "account.php"><?php echo "" . $_SESSION['riderUsername'] . ""; ?></a></h1>

</div>
</body>
</html>
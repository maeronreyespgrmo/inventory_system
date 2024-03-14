<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
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

    <style>
        body {
            font-size: 16px;
            background: #cedce3;
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
        }

        h1 {
            
            nt-size: 4.5vw;
        }

        @media screen and (max-width: 600px) {
            h1 {
                font-size: 6vw;
            }
        }

        .navbar {
            overflow: hidden;
            background-color: #333;
        }

        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        .bg-image {
            background-image: url("../image/3.jpg");
            filter: blur(6px);
            -webkit-filter: blur(2px);
            height: 50vh;
            margin-bottom: -20%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .bg-text {
            background-color: rgba(0, 0, 0, 0.6);
            color: white;
            border: 3px solid #f1f1f1;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 2;
            width: 80%;
            padding: 20px;
            max-height: 400px;
            text-align: center;
            font-size: 4vw;
            border-radius: 60px;
            margin-top: -50px;
        }

        .bg-text p {
            font-size: 6vw;
            margin-top: 0;
            color: #cedce3;
            font-weight: bold;
            margin-bottom: 10px;
            margin-top: 3vw;
        }
    </style>
</head>

<body>

    <nav class="navbar">
        <a href="home.php" class="active">Home</a>
        <a href="itemlist.php" class="expandHome">Menu</a>
        <a href="cart.php">Cart (<?php echo isset($_SESSION["cart"]) ? count($_SESSION["cart"]) : "0"; ?>)</a>
        <a href="orders.php" class="expandHome">My Orders</a>
        <a href="account.php" class="expandHome">My Account</a>
        <a href="logout.php" class="expandHome">Log out</a>
    </nav>

    <div class="bg-image">
        <img src="image/2.jpg" width="100%">
    </div>

    <div class="bg-text">
        <p>WELCOME </p>
        <h1><a href="account.php"><?php echo $_SESSION['username']; ?></a></h1>
    </div>

</body>

</html>

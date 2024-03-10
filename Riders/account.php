<?php
session_start();
require 'connect.php';

if(!isset($_SESSION['riderUsername'])){
header("location: rider_login.php"); 
}

?>
<style>
body{
 background-color:#99ffe6;
 font-family: "Poppins", sans-serif;
 font-weight: 300;
 margin-top: 0%;
}

.container{
 height: 100vh;
}

.card{

 width: 380px;
 border: none;
 border-radius: 15px;
 padding: 8px;
 background-color: #fff;
 position: relative;
 height: 370px;
 margin-top: 5%;
 margin-left: 35%;
}

.upper{

 height: 100px;

}

.upper img{

 width: 100%;
 border-top-left-radius: 10px;
 border-top-right-radius: 10px;

}

.user{
 position: relative;
}

.profile img{

 
 height: 80px;
 width: 80px;
 margin-top:2px;


}

.profile{

 position: absolute;
 top:-50px;
 left: 38%;
 height: 90px;
 width: 90px;
 border:3px solid #fff;

 border-radius: 50%;

}

.follow{

 border-radius: 15px;
 padding-left: 20px;
 padding-right: 20px;
 height: 35px;
}

.stats span{

 font-size: 29px;
}

</style>

<link rel="stylesheet" href="../admin/all.css">


<nav class="navbar">

<div id="trapezoid" style = "padding-left: 22%;">

<a href="home.php" class = "">Home</a>
    <a href="orders.php" class="expandHome">Orders</a>
  <a href="account.php" class = "active">My Account</a>
  <a href="logout.php" class = "">Logout</a>
</div>
</nav>

<div class="container d-flex justify-content-center align-items-center">
             
             <div class="card">

              <div class="upper">

                <img src="../customer/efood.png" class="img-fluid" height="150%">
                
              </div>

              <div class="user text-center">

               

              </div>


              <center>
              <div class="mt-5 text-center">
                <br><br><br>
                <h3 class="mb-0"><?php echo $_SESSION['riderUsername'];?></h3>
                
                <span class="text-muted d-block mb-2"> <?php
                $name = $_SESSION['riderUsername'];
                $sql3 = "SELECT riderEmail FROM riders where riderUsername = '$name'";
                //Execute Query
                $res3 = mysqli_query($conn, $sql3);
                 //get the data and display
                 while($row=mysqli_fetch_assoc($res3))
                 {
                     $email = $row['riderEmail'];
                    echo $email;
                 }

            ?></span>
                <br>


                <div class="d-flex justify-content-between align-items-center mt-4 px-4">
<br><br>
                  <div class="stats">
                    <h3 class="mb-0">Completed Orders</h3>
                   <?php
                $name = $_SESSION['riderUsername'];
                $sql3 = "SELECT * FROM orders where riderName = '$name' and status = 'Delivered'";
                //Execute Query
                $res3 = mysqli_query($conn, $sql3);
                //Count Rows
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
<?php
session_start();

if(!isset($_SESSION['username'])){
    header("location: customer_login.php"); 
}
?>

<html>

<head>
    <title> Explore | W.A.L Merchant</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
	body {
    font-size: 100%;
    margin: 2%;
    font-family: Verdana, sans-serif;
    position: relative;
}

body::before {
    content: "";
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(3deg, #2c3e50, white,#2c3e50); /* Dark gradient background */
    opacity: 0.8; /* Adjust the opacity as needed */
    z-index: -1; /* Place the pseudo-element behind the content */
}
h2 {
  margin-top: 20px; /* Increased margin-top for better spacing */
  margin-bottom: 10px; /* Adjusted margin-bottom for better spacing */
  font-size: 32px; /* Slightly reduced font size for a cleaner look */
  text-align: center; /* Align the title to the center */
  font-weight: bold;
  padding: 15px; /* Adjusted padding for resizing the background color */
  background-color: white;
  display: inline-block; /* Display as an inline-block element */
  margin-left: auto; /* Center the element horizontally */
  margin-right: auto; /* Center the element horizontally */
  max-width: 80%; /* Set the maximum width of the background color */
}


#myBtn{
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  border: none;
  outline: none;
  background-color: green;
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 10px;
}
.container {
    text-align: center;
    font-family: Arial Black;
    font-size: 50px;
    padding-top: 0%;
    color: #eb3b5a;
    margin-top: 0%;
    margin-left: 250px;
    width: 100px;
}
/* Media query for screens smaller than 768px (adjust the value as needed) */
@media (max-width: 768px) {
    .container {
        margin-left: 10px; /* Adjust as needed for smaller screens */
    }
}

/* Media query for screens smaller than 576px (adjust the value as needed) */
@media (max-width: 576px) {
    .container {
        font-size: 30px; /* Adjust as needed for smaller screens */
    }
}

#myBtn:hover {
  background-color: darkgreen;
  color: white;
}

.bg-4{
  background-color: #2f2f2f;
  color: #ffffff;

}

footer{
  display: block;
}

.mypanel {
  border: 1px solid #eaeaec; 
  margin: -1px 19px 3px -1px; 
  box-shadow: 0 1px 2px rgba(0,0,0,0.05); 
  background-color: #FAFAFA;  
  padding: 20px; /* Increased padding for more spacing */
  border-radius: 5px;
  width: 95%;
  margin-left: 80px;
}


input{
  border: 5px solid white;
}
.sidenav {
        height: 100%;
        width: 250px;
        position: fixed;
        z-index: 1;
        top: 0;
        left: -250px;
        background: linear-gradient(to right, #2c3e50, #1a252f);
        overflow-x: hidden;
        padding-top: 20px;
        transition: 0.5s;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }

    .sidenav:hover {
        left: 0;
    }

    .sidenav a {
        padding: 15px 20px;
        text-decoration: none;
        font-size: 16px;
        color: #ecf0f1;
        display: block;
        transition: background-color 0.3s, box-shadow 0.3s;
        border-radius: 5px;
        margin-bottom: 5px;
    }

    .sidenav a:hover {
        background-color: #34495e;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
        transform: scale(1.02);
        transition: transform 0.3s ease-in-out;
    }

    .sidenav a.active {
        background-color: #2980b9;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
    }

    .main-content {
        margin-left: 0;
        padding: 20px;
        transition: margin-left 0.5s ease;
    }


    .search-bar {
        margin-top: 20px; /* Adjust the margin-top to align with the category */
        margin-bottom: 1px;
        text-align: right; /* Align the search bar to the right */
    }

    .search-bar form {
        display: inline-block; /* Display the form inline to keep it on the same line as other elements */
    }

    .search-bar input[type="text"] {
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    .search-bar button {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        background-color: #3498db;
        color: white;
        cursor: pointer;
    }

    .search-bar button:hover {
        background-color: #2980b9;
    }
   
    .menu-toggle {
        cursor: pointer;
        display: none;
        padding: 10px;
        border-radius: 5px;
        
    }

    .menu-toggle .line {
        width: 25px;
        height: 3px;
        background-color: #ecf0f1;
        margin: 6px 0;
        transition: 0.4s;
        
    }

    @media screen and (max-width: 768px) {
        .menu-toggle {
            display: block;
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 2;
        }

        .sidenav {
            left: -250px;
        }

        .sidenav.active {
            left: 0;
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
      width: 15%;
      max-width: none;
      padding: 10px 20px;
    }
    .menu-toggle {
            display: none;
        }       

}

</style>

<div class="sidenav">
    <div class="text">
    
    <i class="fa fa-user-circle-o" style="font-size:40px; color:white;  margin-left:110px; margin-top: 20px"> 
    </i><br><div style="font-size:20px; color:white; text-align: center"> <?php echo " " . $_SESSION['username'] . ""; ?></div> <br><br><br><br><br>
    </div>
<a href="itemlist.php"  class="active"><i class="fa fa-home" aria-hidden="true"></i> Products</a>
<a href="cart.php"><i class="fa fa-shopping-cart"></i> Your Cart    (<?php
                    if (isset($_SESSION["cart"])) {
                        $count = count($_SESSION["cart"]);
                        echo "$count";
                    } else
                        echo "0";
                    ?>)</a>
<a href="orders.php"  class="expandHome"><i class="fa fa-list-alt" aria-hidden="true"></i> My Orders</a>
<a href="account.php"><i class="fa fa-user" aria-hidden="true"></i> Account</a>
<a href="logout.php"><i style="font-size:24px" class="fa">&#xf08b;</i></i> Logout</a>

</div>

<div class="menu-toggle" onclick="toggleNav()">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
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
    function searchTable() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("details");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those that don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1]; // Adjust the index based on the column you want to search
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
    function changeRowLimit() {
        var selectedRowLimit = document.getElementById("rowLimit").value;
        window.location.href = 'category.php?row_limit=' + selectedRowLimit;
    }
    function toggleNav() {
        var sidenav = document.querySelector('.sidenav');
        var mainContent = document.querySelector('.main-content');
        var menuToggle = document.querySelector('.menu-toggle');

        if (sidenav.classList.contains('active')) {
            sidenav.classList.remove('active');
            mainContent.style.marginLeft = "0";
        } else {
            sidenav.classList.add('active');
            mainContent.style.marginLeft = "250px";
        }
    }

    // Automatically show sidebar on larger screens
    window.addEventListener('load', function () {
        var screenWidth = window.innerWidth;
        var sidenav = document.querySelector('.sidenav');
        var mainContent = document.querySelector('.main-content');

        if (screenWidth >= 769) {
            sidenav.classList.add('active');
            mainContent.style.marginLeft = "250px";
        }
    });

    // Update sidebar on window resize
    window.addEventListener('resize', function () {
        var screenWidth = window.innerWidth;
        var sidenav = document.querySelector('.sidenav');
        var mainContent = document.querySelector('.main-content');
        var menuToggle = document.querySelector('.menu-toggle');

        if (screenWidth >= 769) {
            sidenav.classList.add('active');
            mainContent.style.marginLeft = "250px";
            menuToggle.style.display = "none"; // Hide the menu toggle button on larger screens
        } else {
            sidenav.classList.remove('active');
            mainContent.style.marginLeft = "0";
            menuToggle.style.display = "block"; // Show the menu toggle button on smaller screens
        }
    });
</script>

    <button onclick="topFunction()" id="myBtn" class="fa fa-angle-double-up"  style="font-size:24px"title="Go to top">
    </button>
  
    <script type="text/javascript">
      window.onscroll = function()
      {
        scrollFunction()
      };

      function scrollFunction(){
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
          document.getElementById("myBtn").style.display = "block";
        } else {
          document.getElementById("myBtn").style.display = "none";
        }
      }

      function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
      }
    </script>   
<div class="container" style="width:110%;margin-left:13%">

<?php

require 'config_info.php';





$sql = "SELECT * FROM FOOD LIMIT 1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0)
{
  $count=0;

  while($row = mysqli_fetch_assoc($result)){
    if ($count == 0)
      echo "<div class='row'>";

?>




<div class="col-lg-2 col-md-3 col-sm-5 col-xs-6">
    <form method="post" action="cart.php?action=add&id=<?php echo $row["id"]; ?>">
        <div class="mypanel">
            <center>
                <img src="../admin/menu/<?php echo $row["image_name"]; ?>" class="img-responsive">
                <h4 class="text-dark"><?php echo $row["title"]; ?></h4>
                <h5 class="text-info"><?php echo $row["description"]; ?></h5>
                <h5 class="text-danger">PHP <?php echo $row["price"]; ?></h5>
                <h5 class="text-info">Quantity: <input type="number" min="1" max="25" name="quantity" class="form-control" value="1" style="width: 60px;"> </h5>
                <input type="hidden" name="hidden_name" value="<?php echo $row["title"]; ?>">
                <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                <input type="submit" name="add" style="margin-top:5px;" class="btn btn-success" value="Add to Cart">
            </center>
        </div>
    </form>
</div>


<?php
$count++;
if($count==4)
{
  echo "</div>";
  $count=0;
}
}
?>

</div>
</div>
<?php
}
else
{
  ?>

  <div class="container">
    <div class="jumbotron">
      <center>
         <label style="color: red;"> <h1>Oops! No item is available.</h1> </label>
      </center>
       
    </div>
  </div>

  <?php

}

?>

   
</body>
</html>
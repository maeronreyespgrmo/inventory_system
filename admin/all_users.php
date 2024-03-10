
<?php include('db_connect.php');


session_start();

if (!isset($_SESSION['adminUsername'])) {
    header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="../admin/all.css">
  <style type="text/css">
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

.register {
    margin-top: 5%;
    margin-left: 3%;
    position: absolute;
}

.text1 {
    text-align: center;
    font-family: 'Arial Black', sans-serif;
    font-size: 2em;
    color: black;
    margin-top: -1.5%;
}

.btn-container {
    text-align: center;
    margin-top: 15%;
    color: white;
}
.btn,
.btn1,
.btn2 {
    display: inline-block;
    width: 40%;
    background-color: #4c4c4c; /* Set a darker background color */
    color: white; /* Set text color to white */
    padding: 20px;
    margin: 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 20px;
    transition: background-color 0.3s, transform 0.3s ease-in-out, box-shadow 0.3s;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.8);
}

/* Optional: Hover effect to make the button slightly lighter on hover */
.btn:hover,
.btn1:hover,
.btn2:hover {
    background-color: #555555; /* Adjust the hover background color as needed */
}


    


.btn {

    background-color: #3498db;
    color: gray;
}

.btn1 {
    background-color: #3498db;
    color: gray;
}

.btn2 {
    background-color: #3498db;
    color: gray;
}

.btn:hover,
.btn1:hover,
.btn2:hover {
  background-color: #ddd;
    transform: scale(1.02);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.8); /* Added box-shadow on hover */
}

h2 {
    margin-top: 20px;
    margin-bottom: 10px;
    font-size: 1.8em;
}

.btn-primary {
    display: inline-block;
    padding: 10px 20px;
    text-align: center;
    background-color: #3498db;
    color: #ffffff;
    border: none;
    border-radius: 5px;
    font-size: 1em;
    cursor: pointer;
    transition: background-color 0.3s, box-shadow 0.3s;
}

.btn-primary:hover {
    background-color: #2980b9;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
}

.btn-secondary,
.btn-danger {
    padding: 1%;
    font-weight: bold;
    display: inline-block;
    margin: 5px;
    border-radius: 5px;
}

.btn-secondary {
    color: #04AA6D;
}

.btn-danger {
    color: #dc143c;
}

.main-content {
    margin-left: 0;
    padding: 20px;
    transition: margin-left 0.5s ease;
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

@media screen and (min-width: 769px) {
    .sidenav {
        left: 0;
    }

    .main-content {
        margin-left: 250px;
    }

    .btn-primary {
        width: 10%;
        max-width: none;
        margin-left: 270px;
        padding: 10px 20px;
    }
}


    .btn {
      background-color: #007bff;
      color: #ffffff;
    }

    .btn1 {
      background-color: #28a745;
      color: #ffffff;
    }

    .btn2 {
      background-color: #dc3545;
      color: #ffffff;
    }
</style>

<div class="sidenav">
    <div class="text">
    
    <i class="fa fa-user-circle-o" style="font-size:40px; color:white;  margin-left:110px; margin-top: 20px"> 
    </i><br><div style="font-size:20px; color:white; text-align: center"> <?php echo " " . $_SESSION['adminUsername'] . ""; ?></div> <br><br><br><br><br>
    </div>
    <a href="home.php"><i class="fa fa-home" aria-hidden="true"></i> Dashboard</a>
<a href="category.php"><i class="fa fa-list-alt" aria-hidden="true"></i> Category</a>
<a href="item.php"><i class="fa fa-list"></i> Items</a>
<a href="manage_orders.php"   class="expandHome"><i class="fa fa-shopping-cart"></i> Manage Orders</a>
<a href="all_users.php" class="active"><i class="fa fa-users"></i> User Management</a>
<a href="logout.php"><i style="font-size:24px" class="fa">&#xf08b;</i></i> Logout</a>
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
</script>
 
<div class="btn-container">
  <form action="admin_management.php">
    <button name="submit" class="btn btn-lg btn-block">Manage Admins</button>
  </form>

  <form action="rider_management.php">
    <button name="submit" class="btn1 btn btn-lg btn-block">Manage Contractors</button>
  </form>

  <form action="customer_management.php">
    <button name="submit" class="btn2 btn btn-lg btn-block">Manage Customers</button>
  </form>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>

<?php 
include 'db_connect.php';

session_start();

error_reporting(0);


?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<link rel="stylesheet" href="all.css">
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
    .table {
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.8); /* Darker box shadow */
    background-color: #2c3e50; /* Dark background color */
    margin-top: -30px;
    width: 100%;
    border-radius: 8px;
    border: 1px solid #34495e; /* Slightly lighter border color */
    color: #ecf0f1; /* Light text color for good contrast */
    position: relative;
    text-align: center;
    overflow-x: auto;
    margin-left: 1px;
    transition: box-shadow 0.3s, background-color 0.3s;
}

#details table {
    width: 100%;
    margin: 0 auto;
    border-collapse: collapse;
}

#details th,
#details td {
    padding: 15px;
    border: 1px solid #34495e; /* Slightly lighter border color */
    border-radius: 5px;
}

#details th {
    background-color: #3498db; /* Vibrant green header color */
    color: white;
    
}

#details tr:nth-child(even) {
    background-color: #34495e; /* Darker background for even rows */
}

#details tr:hover {
    background-color: #2c3e50; /* Slightly darker background on hover */
}

/* Add these styles for responsiveness */
@media only screen and (max-width: 768px) {
    .table {
        width: 100%;
        margin-left: 0;
    }

    #details th,
    #details td {
        padding: 12px;
    }
}


h2 {
    margin-top: 20px; /* Increased margin-top for better spacing */
    margin-bottom: 10px; /* Adjusted margin-bottom for better spacing */
    font-size: 36px; /* Slightly reduced font size for a cleaner look */
    text-align: left; /* Align the title to the left */
}
    .btn-primary {
        display: inline-block;
        padding: 10px 20px;
        text-align: center;
        background-color: #3498db;
        color: #ffffff;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s, box-shadow 0.3s;
        margin-left: 80%;
    }

    .btn-primary:hover {
        background-color: #2980b9;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        transform: scale(1.02);
        transition: transform 0.3s ease-in-out;
    }

    .btn-secondary,
    .btn-danger {
        display: inline-block;
        padding: 10px 20px;
        margin: 5px;
        text-align: center;
        text-decoration: none;
        font-size: 16px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s, color 0.3s;
    }

    .btn-secondary {
        background-color: #218838; /* Gray color */
        color: #ffffff;
        border: 1px solid #218838;
    }

    .btn-danger {
        background-color: #dc3545; /* Red color */
        color: #ffffff;
        border: 1px solid #dc3545;
    }

    .btn-secondary:hover,
    .btn-danger:hover {
        background-color: #495057; /* Darker color on hover */
        color: #ffffff;
    
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
    </i><br><div style="font-size:20px; color:white; text-align: center"> <?php echo " " . $_SESSION['adminUsername'] . ""; ?></div> <br><br><br><br><br>
    </div>
    <a href="home.php"><i class="fa fa-home" aria-hidden="true"></i> Dashboard</a>
<a href="category.php"  class="active"><i class="fa fa-list-alt" aria-hidden="true"></i> Category</a>
<a href="item.php"><i class="fa fa-list"></i> Items</a>
<a href="manage_orders.php" class="expandHome"><i class="fa fa-shopping-cart"></i> Manage Orders</a>
<a href="all_users.php"><i class="fa fa-users"></i> User Management</a>
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
    function confirmDelete(categoryId, categoryName) {
        var confirmation = confirm("Are you sure you want to delete the category '" + categoryName + "'?");
        
        if (confirmation) {
            window.location.href = 'delete-category.php?id=' + categoryId + '&image_name=<?php echo $image_name; ?>';
        } else {
            // Do nothing if the user cancels the deletion
        }
    }
</script>

<div class="main-content">
    <div class="wrapper">
                    <!-- Add three-line button for small screens -->
        <div class="menu-toggle" onclick="toggleNav()">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
       
        <?php 
        
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            if(isset($_SESSION['remove']))
            {
                echo $_SESSION['remove'];
                unset($_SESSION['remove']);
            }

            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }

            if(isset($_SESSION['no-category-found']))
            {
                echo $_SESSION['no-category-found'];
                unset($_SESSION['no-category-found']);
            }

            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }

            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }

            if(isset($_SESSION['failed-remove']))
            {
                echo $_SESSION['failed-remove'];
                unset($_SESSION['failed-remove']);
            }
            $id = '';
        ?>

             
           

                <table class="table table-bordered" id = "details">
                <tr>
                <!-- Additional row for "Manage Tools Category" -->
                <td colspan="6">
                <h2>Manage Tools Category</h2>
                 <div class="search-bar">
                <form onsubmit="return false;">
                <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Search by category title">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
        
        <button onclick="window.location.href='add-category.php';" class="btn-primary">
                        Add Category
                    </button>
        </td>
                </tr>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Tools</th>
                        <th>Availability</th>
                        <th>Actions</th>
                    </tr>

                    <?php 

                        $sql = "SELECT * FROM category ";

                        $res = mysqli_query($conn, $sql);

                        $count = mysqli_num_rows($res);

                   
                        $sn=1;

                
                        if($count>0)
                        {
                          
                            while($row=mysqli_fetch_assoc($res))
                            {
                                $id = $row['id'];
                                $title = $row['title'];
                                $image_name = $row['image_name'];
                                $availability = $row['Availability'];
                               

                                ?>

                                    <tr>
                                        <td><?php echo $sn++; ?> </td>
                                        <td><?php echo $title; ?></td>

                                        <td>

                                            <?php  
                                                
                                                if($image_name!="")
                                                {
                                                    
                                                    ?>
                                                    
                                                    <img src="MENU/<?php echo $image_name; ?>" width="100px" >
                                                    
                                                    <?php
                                                }
                                                else
                                                {
                                                    
                                                    echo "<div class='error'>Image not Added.</div>";
                                                }
                                            ?>

                                        </td>
                                        <td>
                                        <?php 
                                
                                $sql1 = "SELECT * FROM food WHERE category_id = $id";
                                
                                
                                $res1 = mysqli_query($conn, $sql1);

                                  $count1 = mysqli_num_rows($res1);

                                 if($count1>0)
                                {
                                   
                                    while($row1=mysqli_fetch_assoc($res1))
                                    {
                                        
                                        $id1 = $row1['id'];
                                        $title = $row1['title'];

                                        ?>

                                        <?php echo $title;?> <br>

                                        <?php
                                    }
                                }
                                else
                                {
                                   
                                    ?>
                                    <option value="0">No item Found</option>
                                    <?php
                                }
                            

                            ?>

                                        </td>

                                        <td><?php echo $availability; ?></td>
                                       
                                        <td>
    <a href="update-category.php?id=<?php echo $id; ?>" class="btn-secondary">Update</a>
    <a href="javascript:void(0);" onclick="confirmDelete(<?php echo $id; ?>, '<?php echo $title; ?>');" class="btn-danger">Delete</a>
</td>
                                    </tr>

                                <?php

                            }
                        }
                        else
                        {
                            ?>

                            <tr>
                                <td colspan="6"><div class="error">No Category Added.</div></td>
                            </tr>

                            <?php
                        }
                    
                    ?>

                    

                    
                </table>
    </div>
    
</div>

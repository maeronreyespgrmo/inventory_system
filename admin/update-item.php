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
        .container {
  width: 70%;
  max-width: 600px;
  height: auto;
  margin: 5% auto;
  padding: 20px;
  background: #2c3e50; /* Light gray background color */
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  border-radius: 10px;
  border: 1px solid rgba(0, 0, 0, 0.1);
  color: #fff; /* Text color set to white */
  text-align: center;
    
  /* Center content vertically and horizontally */
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: left;

  transition: transform 0.3s ease-in-out;
}

.container:hover {
  transform: scale(1.02);
}


.text1 {
  text-align: center;
  font-family: Arial Black;
  font-size: 3.5vw; /* Using vw (viewport width) for responsive font size */
  padding-top: 0;
  color: #b22426;
  margin-top: 5%;
  margin-left: 25%; /* Adjusted margin for better responsiveness */
  
  @media screen and (max-width: 768px) {
    font-size: 4vw; /* Adjusted font size for smaller screens */
    margin-left: 7%; /* Remove left margin on smaller screens */
  }
}
h2 {
    margin-top: 0;
    margin-bottom: -2%;
    font-size: 50px;
}

/* Responsive styles */
@media only screen and (max-width: 600px) {
    h2 {
        font-size: 30px; /* Set a smaller font size for smaller screens */
    }
}
.btn-primary {
    display: inline-block;
    padding: 10px 20px; /* Adjusted padding for better spacing */
    text-align: center;
    background-color: #3498db; /* Professional blue background color */
    color: #ffffff; /* White text color for contrast */
    border: none; /* Remove border for a cleaner look */
    border-radius: 5px; /* Slightly reduced border-radius */
    font-size: 16px; /* Adjusted font size for better readability */
    cursor: pointer;
    transition: background-color 0.3s, box-shadow 0.3s;
}

.btn-primary:hover {
    background-color: #2980b9; /* Darker blue on hover */
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2); /* Adjusted box shadow on hover */
}
/* Styles for the button */
.btn-secondary {
    padding: 10px 20px;
    background-color: #3498db;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

/* Hover styles */
.btn-secondary:hover {
    background-color: #2980b9;
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


/* Adjustments for smaller screens */
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

}
.form-label {
            padding: 10px;
            font-weight: bold;
            color: white;
        }
        .form-label1 {
            padding: 10px;
            font-weight: bold;
            color: white;
        }
        .form-input {
            padding: 10px;
            color: white;
        }

        .input-field {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        .form-label {
            padding: 10px;
            font-weight: bold;
        }

        .form-input {
            padding: 10px;
        }
        @media screen and (max-width: 768px) {
    .file-label {
        padding: 5px;
    }

    .file-input-container {
        width: 100%;
        margin-bottom: 10px;
    } .form-label {
            padding: 10px;
            font-weight: bold;
        }
}

/* Styles for the input field */
input[type="text"] {
    width: 100%;
    max-width: 400px; /* Set your desired maximum width */
    padding: 10px;
    box-sizing: border-box;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #fff;
    color: #333;
}

/* Responsive adjustments for smaller screens */
@media screen and (max-width: 768px) {
    input[type="text"] {
        max-width: 60%; /* Adjusted maximum width for smaller screens */
        padding: 8px; /* Adjusted padding for smaller screens */
        font-size: 14px; /* Adjusted font size for smaller screens */
    }
}
/* Styles for the number input field */
input[type="number"] {
    width: 100%;
    max-width: 200px; /* Set your desired maximum width */
    padding: 10px;
    box-sizing: border-box;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #fff;
    color: #333;
}

/* Responsive adjustments for smaller screens */
@media screen and (max-width: 768px) {
    input[type="number"] {
        max-width: 60%; /* Adjusted maximum width for smaller screens */
        padding: 8px; /* Adjusted padding for smaller screens */
        font-size: 14px; /* Adjusted font size for smaller screens */
    }
}
/* Styles for the image container */
.image-container {
    text-align: left; /* Center the image */
}

/* Styles for responsive image */
.responsive-image {
    max-width: 40%; /* Make the image responsive to its container */
    height: auto; /* Maintain the image aspect ratio */
    border-radius: 10px; /* Add border-radius for rounded corners */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Add box shadow for depth */
    margin-top: 10px; /* Add margin for spacing */
}
.styled-select {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ccc;
        max-width: 120px; /* Set a maximum width for larger screens */
        border-radius: 5px;
        background-color: #fff;
        color: #333;
        box-sizing: border-box;
        margin-bottom: 15px;
    }

    .styled-select:focus {
        outline: none;
        border: 2px solid #3498db;
    }.header-container {
    background-color: #2c3e50; /* Choose your desired background color */
    color: #fff; /* Text color */
    text-align: center;
    padding: 20px; /* Adjust padding for spacing */
    max-width: 50%; /* Adjust maximum width */
    margin: 0 auto; /* Center the container horizontally */
    border-radius: 20px;
}

/* Responsive styles */
@media only screen and (max-width: 600px) {
    .header-container {
        padding: 10px; /* Adjust padding for smaller screens */
        font-size: 18px; /* Set a smaller font size for smaller screens */

    }
}

.input-container {
    width: 100%;
    margin-bottom: 15px;
}

.styled-input {
    /* Add your existing styles for the input */
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #fff;
    color: #333;
    box-sizing: border-box;

}

.styled-input:focus {
    outline: none;
    border: 2px solid #3498db;
}

/* Responsive styles */
@media only screen and (max-width: 600px) {
    .styled-input {
        font-size: 14px; /* Adjust font size for smaller screens */
        max-width: 60%;
    }
}

</style>
<div class="sidenav">
    <div class="text">
    
    <i class="fa fa-user-circle-o" style="font-size:40px; color:white;  margin-left:110px; margin-top: 20px"> 
    </i><br><div style="font-size:20px; color:white; text-align: center"> <?php echo " " . $_SESSION['adminUsername'] . ""; ?></div> <br><br><br><br><br>
    </div>
    <a href="home.php"><i class="fa fa-home" aria-hidden="true"></i> Dashboard</a>
<a href="category.php"><i class="fa fa-list-alt" aria-hidden="true"></i> Category</a>
<a href="item.php"  class="active"><i class="fa fa-list"></i> Items</a>
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
    function showUpdateMessage() {
    alert("Item successfully updated!"); // You can replace this with a custom modal or other notification method
}
    
</script>


<?php 
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];

        $sql2 = "SELECT * FROM food WHERE id=$id";
  
        $res2 = mysqli_query($conn, $sql2);

        $row2 = mysqli_fetch_assoc($res2);

        $title = $row2['title'];
        $description = $row2['description'];
        $price = $row2['price'];
        $current_image = $row2['image_name'];
        $current_category = $row2['category_id'];
        $availability = $row2['availability'];


    }
    else
    {
        header('location:item.php');
    }
?>
<div class="main-content">
    <div class="wrapper">
    <div class="header-container">
    <h2>Update Items</h2>
</div>

    <button onclick="window.location.href='item.php';" class="btn-primary">Go Back
    </button>
    
        <div class="container">
        <div class="text1">
        <form action="" method="POST" enctype="multipart/form-data">
        
        <table class="tbl-30">

            <tr>
                <td class="form-label">Title: </td>
                <td>
                <input type="text" name="title" value="<?php echo $title; ?>" style="width: 65%;">

                </td>
            </tr>

            <tr>
                <td class="form-label">Quantity: </td>
                <td>
                    <input type="number" name="description" value = "<?php echo $description; ?>">
                </td>
            </tr>

            <tr>
                <td class="form-label">Price: </td>
                <td>
                <input type="number" name="price" value="<?php echo $price; ?>">

                </td>
            </tr>

            <tr>
                <td class="form-label">Current Image: </td>
                <td>
                <div class="image-container">
    <?php
   if ($current_image == "") {
    echo "<div class='error' style='color: white;'>Image not Available.</div>";
} else {
    ?>
        <img src="MENU/<?php echo $current_image; ?>" class="responsive-image" alt="Current Image">
    <?php
    }
    ?>
</div>
                </td>
            </tr>

            <tr>
                    <td class="form-label1">Select New Image: <br><br></td>
                    <td>
                    <div class="input-container">
                    <input type="file" name="image" class="styled-input" accept="image/jpeg, image/png, image/jpg">
</div>
                    </td>
                </tr>

            <tr>
                <td class="form-label">Category: </td>
                <td>
                <select name="category" class="styled-select">
    <?php 
        $sql = "SELECT * FROM category WHERE availability='Yes'";
        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);

        if ($count > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $category_id = $row['id'];
                $category_title = $row['title'];
                ?>
                <option <?php if ($current_category == $category_id) { echo "selected"; } ?> value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>
                <?php
            }
        } else {
            ?>
            <option value="0">No Category Found</option>
            <?php
        }
    ?>
</select>
                </td>
            </tr>

            <tr>
                <td class="form-label">Availability: </td>
                <td>
                <input <?php if($availability =="Yes") {echo "checked";} ?> type="radio" name="availability" value="Yes" style="color: white;"> Yes 
<input <?php if($availability =="No") {echo "checked";} ?> type="radio" name="availability" value="No" style="color: white;"> No

                </td>
            </tr>


            <tr>
                <td>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">

                    <input type="submit" name="submit" value="Update Item" class="btn-secondary" onclick="showUpdateMessage()">
                </td>
            </tr>
        
        </table>
        
        </form>

        <?php 
        
            if(isset($_POST['submit']))
            {
                
                $id = $_POST['id'];
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $current_image = $_POST['current_image'];
                $category = $_POST['category'];
                $availability = $_POST['availability'];
               

               
                if(isset($_FILES['image']['name']))
                {
                  
                    $image_name = $_FILES['image']['name']; 

                
                    if($image_name!="")
                    {
                      

                     
                        $ext = end(explode('.', $image_name)); 

                        $image_name = "Food-Name-".rand(0000, 9999).'.'.$ext; 
                     
                        $src_path = $_FILES['image']['tmp_name']; 
                        $dest_path = "MENU/".$image_name; 

                        
                        $upload = move_uploaded_file($src_path, $dest_path);

                       
                        if($upload==false)
                        {
                            
                            $_SESSION['upload'] = "<div class='error'>Failed to Upload new Image.</div>";
                            
                            header('location:item.php');
                            
                            die();
                        }
                        if($current_image!="")
                        {
                           
                            $remove_path = "MENU/".$current_image;

                            $remove = unlink($remove_path);

                               if($remove==false)
                            {
                                  $_SESSION['remove-failed'] = "<div class='error'>Faile to remove current image.</div>";
                                header('location:item.php');
                                die();
                            }
                        }
                    }
                    else
                    {
                        $image_name = $current_image; 
                    }
                }
                else
                {
                    $image_name = $current_image; 
                }

                
                $sql3 = "UPDATE food SET 
                    title = '$title',
                    description = '$description',
                    price = $price,
                    image_name = '$image_name',
                    category_id = '$category',
                    availability = '$availability'
                    WHERE id=$id
                ";
                 
               
                $res3 = mysqli_query($conn, $sql3);

            
                if($res3==true)
                {
                  
                    $_SESSION['update'] = "<br><div class='success'>Item Updated Successfully.</div>";
                    header('location:item.php');
                }
                else
                {
                    $_SESSION['update'] = "<div class='error'>Failed to Update Item.</div>";
                    header('location:admin/manage-item.php');
                }

                
            }
        
        ?>

    </div>
</div>




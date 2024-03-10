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
        .container {
  width: 80%;
  max-width: 600px;
  height: auto;
  margin: 5% auto;
  padding: 20px; /* Added padding for content spacing */
  background:  #2c3e50; /* Light gray background color */
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle box shadow for depth */
  border-radius: 10px;
  border: 1px solid rgba(0, 0, 0, 0.1); /* Softened border color */
  color: #fff; /* Set text color to white */
  text-align: center;
  
}

/* Optional: Add a hover effect for interactivity */
.container:hover {
  transform: scale(1.02); /* Slightly scale up on hover */
  transition: transform 0.3s ease-in-out;
}



.text-container {
    background:#2c3e50; /* Set the background color for the text container */
    padding: 20px;
    border-radius: 10px;
margin-top: -35px;
    margin-left: auto;
    margin-right: auto;
    width: 50%;
}

.text2 {
    text-align: center;
    font-family: 'Arial Black', sans-serif;
    font-size: 3.5vw;
    padding-top: 0;
    color: #fff; /* Set text color to white for better contrast */
    margin: 0; /* Remove default margin */
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
    h2{
        margin-top: 0%;
        margin-bottom: -2%;
        font-size: 50px;
        text-align: center;
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
.sidenav {
    height: 100%;
    width: 250px;
    position: fixed;
    z-index: 1;
    top: 0;
    left: -250px;
    background: linear-gradient(to right, #2c3e50, #1a252f); /* Updated gradient background */
    overflow-x: hidden;
    padding-top: 20px;
    transition: 0.5s;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
}

.sidenav:hover {
    left: 0;
   
}

.sidenav a {
    padding: 15px 20px; /* Increased padding for better spacing */
    text-decoration: none;
    font-size: 16px; /* Adjusted font size for better readability */
    color: #ecf0f1; /* Light text color for contrast */
    display: block;
    transition: background-color 0.3s, box-shadow 0.3s;
    border-radius: 5px;
    margin-bottom: 5px;
}

.sidenav a:hover {
    background-color: #34495e; /* Darker background color on hover */
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
    transform: scale(1.02); /* Slightly scale up on hover */
  transition: transform 0.3s ease-in-out;
}

.sidenav a.active {
    background-color: #2980b9; /* Active link color */
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
}

/* Add a transition for smoother content movement */
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
/* Additional styles for the "New Image" section */
.file-input-container {
  position: relative;
  display: inline-block;
}

.file-label {
  padding: 10px 15px;
  background-color: #3498db;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s;
}
.file-label1 {
  padding: 10px 15px;
  background-color: #3498db;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s;
}

.file-input {
  position: absolute;
  top: 0;
  left: 0;
  opacity: 0;
  cursor: pointer;
}

.file-label:hover {
  background-color: #2980b9;
}

/* General form styles (you can customize further) */
.form-label {
  padding: 10px;
  font-weight: bold;
  color: white;
}

.form-input {
  padding: 10px;
}

/* Optional: Add a subtle box shadow to the file input container */
.file-input-container {
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}
/* Additional styles for the radio button section */
.radio-group {
  display: flex;
  align-items: center;
}

.radio-label {
  display: flex;
  align-items: center;
  margin-right: 20px;
  cursor: pointer;
  color: #fff;
}

.radio-custom {
  width: 20px;
  height: 20px;
  border: 2px solid #3498db; /* Border color for unchecked state */
  border-radius: 50%;
  margin-right: 8px;
  display: inline-block;
  position: relative;
}

input[type="radio"] {
  opacity: 0;
  position: absolute;
  cursor: pointer;
}

input[type="radio"]:checked + .radio-custom::before {
  content: '\2022'; /* Unicode character for a bullet point */
  font-size: 20px;
  color: #3498db; /* Color for the bullet point when checked */
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

/* General form styles (you can customize further) */
.form-label {
  padding: 10px;
  font-weight: bold;
}

.form-input {
  padding: 10px;
}
input[type="text"] {
  width: 100%; /* Take up 100% of the container width */
  padding: 10px; /* Adjust padding for better spacing */
  box-sizing: border-box; /* Include padding and border in the element's total width and height */
  border-radius: 15px;
}
@media screen and (max-width: 768px) {
  input[type="text"] {
    width: 90%; /* Adjust width for smaller screens */
  }
}

</style>
<div class="sidenav">
    <div class="text">
    
    <i class="fa fa-user-circle-o" style="font-size:40px; color:white;  margin-left:110px; margin-top: 20px"> 
    </i><br><div style="font-size:20px; color:white; text-align: center"> <?php echo " " . $_SESSION['adminUsername'] . ""; ?></div> <br><br><br><br><br>
    </div>
    <a href="home.php" ><i class="fa fa-home" aria-hidden="true"></i> Dashboard</a>
<a href="category.php"class="active"><i class="fa fa-list-alt" aria-hidden="true"></i> Category</a>
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
    function displaySelectedImage() {
                var input = document.getElementById('image');
                var img = document.getElementById('selectedImage');

                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        img.src = e.target.result;
                        img.style.display = 'block';
                    };

                    reader.readAsDataURL(input.files[0]);
                } else {
                    img.src = '#';
                    img.style.display = 'none';
                }
            }

     
function showUpdateMessage() {
    alert('Category Updated Successfully!');
}

</script>

<div class="main-content">
    <div class="wrapper">
    <div class="text-container">
        <div class="text2">
        <center>Update Category</center>
        </div>
    </div>

        <br><br>
    </div>
    <button onclick="window.location.href='category.php';" class="btn-primary">
      Go Back
    </button>
        <?php 
        
      
            if(isset($_GET['id']))
            {
               
                $id = $_GET['id'];
               
                $sql = "SELECT * FROM category WHERE id=$id";

              
                $res = mysqli_query($conn, $sql);

              
                $count = mysqli_num_rows($res);

                if($count==1)
                {
                   
                    $row = mysqli_fetch_assoc($res);
                    $title = $row['title'];
                    $current_image = $row['image_name'];
                    $availability = $row['availability'];
                
                }
                else
                {
                    $_SESSION['no-category-found'] = "<div class='error'>Category not Found.</div>";
                    header('location:category.php');
                }

            }
            else
            {
                
                header('location:category.php');
            }
        
        ?>
        
<div class = "container">
    <div class = "text1">
        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td class="form-label">Title: <br><br></td>
                    <td>
                    <input type="text" name="title" value="<?php echo $title; ?>" class="responsive-input">
                        
                    </td>
                    
                </tr>

                <tr>
                    <td class="form-label">Current Image: <br><br></td>
                    <td>
                        <?php 
                            if($current_image != "")
                            {
                               
                                ?>
                                <img src="MENU/<?php echo $current_image; ?>" width="150px">
                                <?php
                            }
                            else
                            {
                               
                                echo "<div class='error'>Image Not Added.</div>";
                            }
                        ?><br><br>
                    </td>
                </tr>

                    <tr>
                            <td class="form-label">New Image:</td>
                            <td class="form-input">

                                    <label for="image" class="file-label">Choose a file</label>
                                    <input type="file" name="image" id="image" class="file-input" onchange="displaySelectedImage()">

                                <br>
                                <img id="selectedImage" src="#" alt="Selected Image" style="max-width: 200px; max-height: 200px; display: none;">
                            </td>
                        </tr>


                    <!-- Add a line break -->
                    <tr>
                    <td colspan="2"><br></td>
                    </tr>

                    <tr>
                    <td class="form-label">Availability:</td>
                    <td class="radio-group">
                        <label class="radio-label">
                        <input <?php if($availavility=="Yes"){echo "checked";} ?> type="radio" name="availability" value="Yes">
                        <span class="radio-custom"></span> Yes
                        </label>

                        <label class="radio-label">
                        <input <?php if($availability=="No"){echo "checked";} ?> type="radio" name="availability" value="No">
                        <span class="radio-custom"></span> No
                        </label>
                    </td>
                    </tr>
                <tr>
                    <td>
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Category" class="file-label1" onclick="showUpdateMessage()">
                    </td>
                </tr>

            </table>

        </form>
        </div>
        </div>
        <?php 
        
            if(isset($_POST['submit']))
            {
                $id = $_POST['id'];
                $title = $_POST['title'];
                $current_image = $_POST['current_image'];
                $availability = $_POST['availability'];
               

             
                if(isset($_FILES['image']['name']))
                {
                    
                    $image_name = $_FILES['image']['name'];

                  
                    if($image_name != "")
                    {
                        

                          $ext = end(explode('.', $image_name));

                        
                        $image_name = "Food_Category_".rand(000, 999).'.'.$ext; // e.g. Food_Category_834.jpg
                        

                        $source_path = $_FILES['image']['tmp_name'];

                        $destination_path = "MENU/".$image_name;

                        $upload = move_uploaded_file($source_path, $destination_path);

                          if($upload==false)
                        {
                        
                            $_SESSION['upload'] = "<div class='error'>Failed to Upload Image. </div>";
                         
                            header('location:category.php');
                   
                            die();
                        }

           
                        if($current_image!="")
                        {
                            $remove_path = "MENU/".$current_image;

                            $remove = unlink($remove_path);

                           
                            if($remove==false)
                            {
                                
                                $_SESSION['failed-remove'] = "<div class='error'>Failed to remove current Image.</div>";
                                header('location:category.php');
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

           
                $sql2 = "UPDATE category SET 
                    title = '$title',
                    image_name = '$image_name',
                    availability = '$availability'                  
                    WHERE id=$id
                ";


                $res2 = mysqli_query($conn, $sql2);

              
                if ($res2 == true) {
                    $_SESSION['update'] = "<div class='success'>Category Updated Successfully.</div>";
                    $categoryUpdated = true; // Set the variable to true
                    header('location:category.php');
                } else {
                    $_SESSION['update'] = "<div class='error'>Failed to Update Category.</div>";
                    header('location:category.php');
                }

            }
        
        ?>

    </div>
</div>
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
    padding: 20px;
    background: #2c3e50; /* Set background color to match the button color */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
    border-radius: 10px;
    color: #fff; /* Set text color to white or light color for better contrast */
    text-align: center;
    transition: margin-left 0.5s ease; /* Add a transition for smooth animation */
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.container:hover {
    transform: scale(1.02);
    transition: transform 0.3s ease-in-out;
}


.text-container {
    background:#2c3e50; /* Set the background color for the text container */
    padding: 20px;
    border-radius: 10px;

    margin-left: auto;
    margin-right: auto;
    width: 50%;
}

.text1 {
    text-align: center;
    font-family: 'Arial Black', sans-serif;
    font-size: 3.5vw;
    padding-top: 0;
    color: #fff; /* Set text color to white for better contrast */
    margin: 0; /* Remove default margin */
}

    h2 {
        margin-top: -40px;
        margin-bottom: -2%;
        font-size: 50px;
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
        margin-left: 10px;
        margin-top: 20px;
        margin-bottom: -15px;
    }

    .btn-primary:hover {
        background-color: #2980b9;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        transform: scale(1.02);
        transition: transform 0.3s ease-in-out;
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

    .file-input-container {
    position: relative;
    display: inline-block;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.file-label {
    padding: 10px 20px; /* Adjusted padding for better spacing */
    background-color: #007bff; /* Professional blue color */
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.file-label:hover {
    background-color: #0056b3; /* Darker blue on hover */
}


.file-input {
    position: absolute;
    top: 0;
    left: 0;
    opacity: 0;
    cursor: pointer;
}

        .file-input-container {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .radio-group {
            display: flex;
            align-items: center;
        }

        .radio-label {
    display: flex;
    align-items: center;
    margin-right: 20px;
    cursor: pointer;
    color: #fff; /* Set text color to white */
}

.radio-custom {
    width: 20px;
    height: 20px;
    border: 2px solid #3498db;
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
    content: '\2022';
    font-size: 20px;
    color: #3498db;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}


        .form-label {
            padding: 10px;
            font-weight: bold;
            color: white;
        }

        .form-input {
            padding: 10px;
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
        .sidenav.active + .main-content .container {
        margin-left: 250px;
    }

    .sidenav.active + .main-content .container.active {
        margin-left: 0;
    }
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
        margin-left: 200px;
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
        
    function showSuccessMessage() {
    alert('Category added successfully!');
}
</script>


<br>

<div class="main-content">
    <div class="wrapper">
    <div class="text-container">
        <div class="text1">
        <center>Add Category</center>
        </div>
    </div>

        <?php
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }

        if (isset($_SESSION['upload'])) {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }
        ?>

        <button onclick="window.location.href='category.php';" class="btn-primary">
            Go Back
        </button>


        <div class="container">
            <br>
            <div class="text1">
                <form action="" method="POST" enctype="multipart/form-data">
                    <table class="tbl-30">
                        <tr>
                            <td class="form-label">Category Name:</td>
                            <td class="form-input">
                                <input type="text" name="title" placeholder="Category Name" class="input-field">
                            </td>
                        </tr>

                        <tr>
                            <td class="form-label">Select Image:</td>
                            <td class="form-input">

                                    <label for="image" class="file-label">Choose a file</label>
                                    <input type="file" name="image" id="image" class="file-input" onchange="displaySelectedImage()">
                                <br>
                                <img id="selectedImage" src="#" alt="Selected Image" style="max-width: 200px; max-height: 200px; display: none;">
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2"><br></td>
                        </tr>

                        <tr>
                            <td class="form-label">Availability:</td>
                            <td class="radio-group">
                                <label class="radio-label">
                                    <input <?php if ($availavility == "Yes") {
                                        echo "checked";
                                    } ?> type="radio" name="availability" value="Yes">
                                    <span class="radio-custom"></span> Yes
                                </label>

                                <label class="radio-label">
                                    <input <?php if ($availability == "No") {
                                        echo "checked";
                                    } ?> type="radio" name="availability" value="No">
                                    <span class="radio-custom"></span> No
                                </label>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2">
                            <input type="submit" name="submit" value="Add Category" class="file-label" onclick="showSuccessMessage()">

                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>

        <?php
        if (isset($_POST['submit'])) {
            $title = $_POST['title'];

            if (isset($_POST['availability'])) {
                $availability = $_POST['availability'];
            } else {
                $availability = "No";
            }

            if (isset($_FILES['image']['name'])) {
                $image_name = $_FILES['image']['name'];

                if ($image_name != "") {
                    $ext = end(explode('.', $image_name));
                    $image_name = "Food_Category_" . rand(000, 999) . '.' . $ext;

                    $source_path = $_FILES['image']['tmp_name'];
                    $destination_path = "MENU/" . $image_name;

                    $upload = move_uploaded_file($source_path, $destination_path);

                    if ($upload == false) {
                        $_SESSION['upload'] = "<div class='error'>Failed to Upload Image. </div>";
                        header('location:add-category.php');
                        die();
                    }
                }
            } else {
                $image_name = "";
            }

            $sql = "INSERT INTO category SET 
                        title='$title',
                        image_name='$image_name',
                        availability='$availability'
                    ";

            $res = mysqli_query($conn, $sql);

            if ($res == true) {
                $_SESSION['add'] = "<div class='success'>Category Added Successfully.</div>";
                header('location:category.php');
            } else {
                $_SESSION['add'] = "<div class='error'>Failed to Add Category.</div>";
                header('location:add-category.php');
            }
        }
        ?>
    </div>
</div>

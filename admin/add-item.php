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
        margin-bottom: auto;
    }

    .btn-primary:hover {
        background-color: #2980b9;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        transform: scale(1.02);
        transition: transform 0.3s ease-in-out;
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

    .main-content {
        margin-left: 0;
        padding: 20px;
        transition: margin-left 0.5s ease;
    }

    @media screen and (min-width: 769px) {
        .sidenav {
            left: 0;
        }

    .main-content {
        margin-left: 250px;
    }
    .btn-primary {
      width: auto;
      max-width: none;
      padding: 10px 20px; 
      margin-bottom:auto;
    }       

}
.file-input-container {
    position: relative;
    display: inline-block;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.file-label {
    padding: 5px 10px;
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
              color: #fff;
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
}
/* Updated styles for text input */
input[type="text"] {
  width: 100%;
  padding: 10px;
  box-sizing: border-box;
  margin-bottom: 15px; /* Added margin for better spacing */
  border: 1px solid #ccc; /* Border color */
  border-radius: 5px; /* Border radius for rounded corners */
}

/* Focus styles */
input[type="text"]:focus {
  outline: none; /* Remove default focus outline */
  border: 2px solid #3498db; /* Border color on focus */
}

/* Placeholder styles */
input[type="text"]::placeholder {
  color: #777; /* Placeholder text color */
}

/* Responsive adjustments for smaller screens */
@media screen and (max-width: 768px) {
  input[type="text"] {
    width: 80%; /* Adjusted width for smaller screens */
  }
}
/* Styles for number input */
input[type="number"] {
  width: 100%;
  padding: 10px;
  box-sizing: border-box;
  margin-bottom: 15px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

/* Focus styles */
input[type="number"]:focus {
  outline: none;
  border: 2px solid #3498db;
}

/* Placeholder styles */
input[type="number"]::placeholder {
  color: #777;
}

/* Label styles (optional) */
.label {
  text-align: left;
  font-weight: bold;
  margin-bottom: 5px;
  display: block;
  color: #fff;
}

/* Responsive adjustments for smaller screens */
@media screen and (max-width: 768px) {
  input[type="number"] {
    width: 80%;
  }
}
/* Styles for file input */
input[type="file"] {
  width: 100%;
  padding: 10px;
  box-sizing: border-box;
  margin-bottom: 15px;
  border: 1px solid #ccc;
  border-radius: 5px;
  background-color: #fff; /* Background color for better visibility */
}

/* Focus styles */
input[type="file"]:focus {
  outline: none;
  border: 2px solid #3498db;
}

/* Label styles (optional) */
.label {
  text-align: left;
  font-weight: bold;
  margin-bottom: 5px;
  display: block;
  color: #fff;
}

/* Responsive adjustments for smaller screens */
@media screen and (max-width: 768px) {
  input[type="file"] {
    width: 80%;
  }
}
/* Styles for select dropdown */
select {
  width: 100%;
  padding: 10px;
  box-sizing: border-box;
  margin-bottom: 15px;
  border: 1px solid #ccc;
  border-radius: 5px;
  background-color: #fff; /* Background color for better visibility */
  color: #333; /* Text color */
}

/* Focus styles */
select:focus {
  outline: none;
  border: 2px solid #3498db;
}

/* Placeholder styles */
select option[disabled] {
  color: #777;
}

/* Label styles (optional) */
.label {
  text-align: left;
  font-weight: bold;
  margin-bottom: 5px;
  display: block;
  color: #fff;
}

/* Responsive adjustments for smaller screens */
@media screen and (max-width: 768px) {
  select {
    width: 90%;
  }
}
.header-container {
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
            function showSuccessMessage() {
    alert("Item successfully saved!");
}
</script>



<br>
<div class="main-content">
    <div class="wrapper">
     
    <div class="header-container">
    <h2>Add Items</h2>
</div>


      <button onclick="window.location.href='item.php';" class="btn-primary">Go Back </button>

      <?php 
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>
<div class = "container">
<br>
<div class = "text1">
        <form action="" method="POST" enctype="multipart/form-data">
        
            <table class="tbl-30">

                <tr>
                    <td class="form-label">Item Name: <br><br></td>
                    <td>
                    <input type="text" name="title" placeholder="Name of the Item" class="styled-input">
                    </td>
                </tr>

                <tr>
                    <td class="form-label">Quantity: <br><br></td>
                    <td>
                        <input type="number" name="description"  placeholder="Quantity"><br><br>
                    </td>
                </tr>

                <tr>
                    <td class="form-label">Price: <br><br></td>
                    <td>
                    <input type="number" name="price" placeholder="Enter the price" class="styled-input">
                    </td>
                </tr>

                <tr>
                    <td class="form-label">Select Image: <br><br></td>
                    <td>
                    <input type="file" name="image" class="styled-input" accept="image/jpeg, image/png, image/jpg">
                    </td>
                </tr>

                <tr>
                    <td class="form-label">Category: <br><br></td>
                    <td>
<select name="category" class="styled-select">

  <?php 
  $sql = "SELECT * FROM category WHERE availability='Yes'";
  
  $res = mysqli_query($conn, $sql);

  $count = mysqli_num_rows($res);

  if($count > 0) {
    while($row = mysqli_fetch_assoc($res)) {
      $id = $row['id'];
      $title = $row['title'];
  ?>
  
  <option value="<?php echo $id; ?>"><?php echo $title; ?></option>

  <?php
    }
  } else {
  ?>
  
  <option value="0" disabled>No Category Found</option>

  <?php
  }
  ?>

</select><br><br>

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
                    <td colspan="2">
                    <input type="submit" name="submit" value="Add Item" class="btn-primary" onclick="showSuccessMessage()">

                    </td>
                </tr>

            </table>

        </form>
        </div>
                            </div>
        <?php 

            if(isset($_POST['submit']))
            {
                
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $category = $_POST['category'];

                if(isset($_POST['availability']))
                {
                    $availability = $_POST['availability'];
                }
                else
                {
                    $availability = "No"; 
                }

               

                 if(isset($_FILES['image']['name']))
                {
                    $image_name = $_FILES['image']['name'];

                    if($image_name!="")
                    {
                        $ext = end(explode('.', $image_name));

                        $image_name = "Food-Name-".rand(0000,9999).".".$ext; 
                        $src = $_FILES['image']['tmp_name'];

                        $dst = "MENU/".$image_name;

                        $upload = move_uploaded_file($src, $dst);

                        if($upload==false)
                        {
                            $_SESSION['upload'] = "<div class='error'>Failed to Upload Image.</div>";
                            header('location:add-item.php');
                       
                            die();
                        }

                    }

                }
                else
                {
                    $image_name = ""; 
                }

                $sql2 = "INSERT INTO food SET 
                    title = '$title',
                    description = '$description',
                    price = $price,
                    image_name = '$image_name',
                    category_id = $category,
                    availability = '$availability'
                ";

                $res2 = mysqli_query($conn, $sql2);

                if($res2 == true)
                {
                    $_SESSION['add'] = "<br><div class='success'>Item Added Successfully.</div>";
                    header('location:item.php');
                }
                else
                {
                    $_SESSION['add'] = "<div class='error'>Failed to Add Item.</div>";
                    header('location:item.php');
                }

                
            }

        ?>


    </div>
</div>

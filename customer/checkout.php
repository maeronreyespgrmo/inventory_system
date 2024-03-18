<?php 
    session_start();

    if(!isset($_SESSION['cart']) || empty($_SESSION['cart']))
    {
        header('location:home.php');
        exit();
    }

    require_once('config_info.php');    
    require_once('helpers.php');  
    $cartItemCount = count($_SESSION['cart']);
    $customer_username = $_SESSION['username'];


    if(isset($_SESSION['add']))
    {
        echo $_SESSION['add'];
        unset($_SESSION['add']);
    }

    if(isset($_SESSION['upload']))
    {
        echo $_SESSION['upload'];
        unset($_SESSION['upload']);
    }
    $paymentMethod;

    if(isset($_POST['submit']))
    {

      if(isset($_POST['paymentMethod']))
      {
        
          $paymentMethod = $_POST['paymentMethod'];
      }
      else
      {
          
          $paymentMethod = "COD";
      }

        if(isset($_POST['firstname'],$_POST['lastname'],$_POST['email'],$_POST['town'],$_POST['brgy'],$_POST['st'],$_POST['hnum']) && !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['town']) && !empty($_POST['brgy']) && !empty($_POST['st']) && !empty($_POST['hnum']))
        {
           $firstName = $_POST['firstname'];

           if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL) == false)
           {
                 $errorMsg[] = 'Please enter valid email address';
           }
           else
           {
             
                $firstName  = validate_input($_POST['firstname']);
                $lastName   = validate_input($_POST['lastname']);
                $email      = validate_input($_POST['email']);
                $town    = validate_input($_POST['town']);
                $brgy    = validate_input($_POST['brgy']);
                $st      = validate_input($_POST['st']); 
                $hnum   = validate_input($_POST['hnum']);
       

                if(isset($_FILES['image']['name']))
                {
                    $image_name = $_FILES['image']['name'];

                    if($image_name!="")
                    {
                        $ext = end(explode('.', $image_name));

                        $image_name = "payment-".rand(0000,9999).".".$ext; 
                        $src = $_FILES['image']['tmp_name'];

                        $dst = "payment/".$image_name;

                        $upload = move_uploaded_file($src, $dst);

                        if($upload==false)
                        {
                            $_SESSION['upload'] = "<div class='error'>Failed to Upload Image.</div>";
                            header('location:checkout.php');
                       
                            die();
                        }

                    }

                }
                else
                {
                    $image_name = ""; 
                }


                $sql = "INSERT INTO orders SET 
                    firstname='$firstName',
                    lastname='$lastName',
                    customer_username = '$customer_username',
                    email='$email',
                    town='$town',
                    brgy='$brgy',
                    st='$st',
                    hnum='$hnum',
                    status='To Process',
                    payment = '$image_name',
                    paymentMethod = '$paymentMethod',
                    order_time= now()
                ";
                $res = mysqli_query($conn, $sql);


                if($res == true)
                {
                    
                    $getOrderID = mysqli_insert_id($conn);

                    if(isset($_SESSION['cart']) || !empty($_SESSION['cart']))
                    {
                                      
                        $totalPrice = 0;
                        foreach($_SESSION['cart'] as $values)
                        {
                            $totalPrice+=$values['total_price'];

                            $order_id  = $getOrderID;
                            $food_id  = $values['food_id'];
                            $food_title  = $values['food_name'];
                            $food_price = $values['food_price'];
                            $qty = $values['food_quantity'];
                            $total_price = $values['total_price'];

                            $sqlDetails = "INSERT INTO order_details SET 
                            order_id='$order_id',
                            food_id='$food_id',
                            food_title='$food_title',
                            food_price='$food_price',
                            qty='$qty',
                            total_price='$total_price'
                        ";
                            $res1 = mysqli_query($conn, $sqlDetails);
                          
                        }
                        
                            $total = $totalPrice;
                            $id = $getOrderID;
                            $updateSql = "update orders set total_price = '$total' where id = '$getOrderID'";
                        
                            $res2 = mysqli_query($conn, $updateSql);
                        
                        unset($_SESSION['cart']);
                        $_SESSION['confirm_order'] = true;
                        header('location:thank-you.php');
                        exit();
                    }
                }
                else
                {
                    $errorMsg[] = 'Unable to save your order. Please try again';
                }
           }
        }
        else
        {
            $errorMsg = [];

            if(!isset($_POST['firstname']) || empty($_POST['firstname']))
            {
                $errorMsg[] = 'First name is required';
            }
            else
            {
                $fnameValue = $_POST['firstname'];
            }

            if(!isset($_POST['lastname']) || empty($_POST['lastname']))
            {
                $errorMsg[] = 'Last name is required';
            }
            else
            {
                $lnameValue = $_POST['lastname'];
            }

            if(!isset($_POST['email']) || empty($_POST['email']))
            {
                $errorMsg[] = 'Email is required';
            }
            else
            {
                $emailValue = $_POST['email'];
            }

            if(!isset($_POST['town']) || empty($_POST['town']))
            {
                $errorMsg[] = 'Address is required';
            }
            else
            {
                $addressValue = $_POST['town'];
            }

            if(!isset($_POST['brgy']) || empty($_POST['brgy']))
            {
                $errorMsg[] = 'Country is required';
            }
            else
            {
                $countryValue = $_POST['brgy'];
            }

            if(!isset($_POST['st']) || empty($_POST['st']))
            {
                $errorMsg[] = 'Street is required';
            }
            else
            {
                $stateValue = $_POST['st'];
            }

            if(!isset($_POST['hnum']) || empty($_POST['hnum']))
            {
                $errorMsg[] = 'House Number is required';
            }
            else
            {
                $zipCodeValue = $_POST['hnum'];
            }
            if (!empty($errorMsg)) {
                echo '<script>';
                echo 'alert("' . implode("\\n", $errorMsg) . '");';
                echo 'window.history.back();';  // Redirect back to the previous page
                echo '</script>';
                exit();
            }
           

        }
    }
	
	$pageTitle = 'Demo PHP Shopping cart checkout page with Validation';
	$metaDesc = 'Demo PHP Shopping cart checkout page with Validation';
	
?>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

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
    height: auto;
    margin-left: 270px;
    margin-right: auto;
    background: rgba(255, 255, 255, 0.9);
    box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.2);
    border-radius: 15px;
    border: 1px solid rgba(255, 255, 255, 0.3);
    color: black;
    position: relative;
    text-align: center;
    padding: 2%;
}

/* Media Query for screens smaller than 768px */
@media screen and (max-width: 768px) {
    .container {
        width: 90%; /* Adjust width for smaller screens */
        margin-left: auto; /* Center the container on smaller screens */
        margin-right: auto;
    }
}

/* Media Query for screens larger than 1200px */
@media screen and (min-width: 1200px) {
    .container {
        width: 70%; /* Adjust width for larger screens */
    }
}
h4{
  margin-top: 20px; /* Increased margin-top for better spacing */
    margin-bottom: 10px; /* Adjusted margin-bottom for better spacing */
    font-size: 36px; /* Slightly reduced font size for a cleaner look */
    text-align: center; /* Align the title to the left */
    margin-left: auto;
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
    margin-top: 20px;
    margin-bottom: 1px;
    text-align: right;
}

.search-bar form {
    display: inline-block;
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
/* Add your custom styles here */
.custom-control-label2 {
    font-weight: normal;
    margin-left: 10px;
    
}
.custom-control-label1 {
    font-weight: normal;
    margin-left: 10px;
}
.payment-details {
    margin-top: 3%;
}

.custom-file-input2 {
    padding: 0.375rem 0.75rem;
    height: auto;
    margin-left: 10px;
    
}
.custom-file-input1{
    padding: 0.375rem 0.75rem;
    height: auto;
    margin-left: 10px;
}

.custom-control-input2,
.custom-control-input1 {
    width: 1.3em; /* Set the width of the radio button */
    height: 1.3em; /* Set the height of the radio button */
    margin-right: 5px; /* Add some spacing between the radio button and text */
    align-items: center;
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

    .main-content {
        margin-left: 0; /* Adjust to 0 for full width on smaller screens */
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
        width: 40%;
        max-width: none;
        padding: 10px 20px;
    }

    .menu-toggle {
        display: none;
    }
    
}

/* Styling for Radio Buttons */
/* Common styles for custom controls */
.custom-control {
    display: flex;
    align-items: center;
    margin-bottom: 20px; /* Reduce margin for smaller screens */
    margin-left: 20px; /* Adjusted left margin for smaller screens */
}

/* Specific styles for custom-control1 */
.custom-control1 {
    margin-left: 10px; /* Adjusted left margin for smaller screens */
}

/* Media queries for responsiveness */
@media screen and (min-width: 768px) {
    .custom-control {
        justify-content:center; /* Add space between controls on larger screens */
    }

    .custom-control1 {
        margin-left: 30px; /* Adjusted left margin for larger screens */
    }
}

/* Add more media queries as needed for different screen sizes */

.custom-control-input {
    position: absolute;
    z-index: -1;
    opacity: 0;
    
}

.custom-control-label {
    position: relative;
    padding-left: 2em;
    cursor: pointer;
}

.custom-control-label::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 0;
    transform: translateY(-50%);
    width: 1.25em;
    height: 1.25em;
    background-color: #007bff;
    border-radius: 50%;
    transition: background 0.3s;
    margin-left: 10px;
}

.custom-control-input:checked ~ .custom-control-label::before {
    background-color: #0056b3;
}

/* Additional Styling for Payment Details */
.payment-details {
    display: flex;
    align-items: center;
}

.payment-details img {
    margin-left: 20px;
}

/* Additional Styling for File Input */
.input-group {
    margin-top: 10px;
}


/* Media query for responsiveness */
@media only screen and (max-width: 768px) {
    .custom-file-label {
        width: 80%; /* Adjust width for medium-sized screens */
        margin-left: 10%; /* Adjust margin for medium-sized screens */
    }

    /* Add more media queries as needed for smaller screens */
}

.custom-file-label::after {
    content: 'Browse';
}

.custom-file-input {
    cursor: pointer;
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
    }

    .btn-primary:hover {
        background-color: #2980b9;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        transform: scale(1.02);
        transition: transform 0.3s ease-in-out;
    }
    .input-group {
    margin-top: 20px;
    vertical-align: top;
}

.image-container {
    max-width: 100%;
    max-height: auto;
    margin-top: 10px;
    vertical-align: top;
}

.image-container img {
    width: 100%;
    height: auto;
    vertical-align: top;
}

.input-group {
    margin-top: 10px;
}

.custom-file {
    position: relative;
    display: block; /* Change to block for full width */
    width: 100%;
}

.custom-file-input {
    position: absolute;
    clip: rect(0, 0, 0, 0);
    pointer-events: none;
}

.custom-file-label {
    display: block;
    width: 70%; /* Full width */
    padding: 0.375rem 0.75rem;
    margin-bottom: 0;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

#selectedImage {
    max-width: 50%;
    max-height: 50%;
    margin: 10px auto; /* Center the image and add margin */
    display: none;
}


@media screen and (min-width: 768px) {
    .custom-file {
        display: inline-block; /* Adjust display property for larger screens */
        width: 60%;
    }

    .custom-file-label {
        width: auto; /* Adjust width for larger screens */
    }
}
h1{
    color:rgba(0, 0, 0, 0.5);
    font-weight: bolder;
    align-items: center;
}
h2 {
    color: rgba(0, 0, 0, 0.5);
    font-weight: bolder;
    margin-left: 275px;
}

/* Media queries for responsiveness */
@media screen and (max-width: 576px) {
    h2 {
        margin-left: 10px; /* Adjust the margin for smaller screens */
    }
}

/* Add more media queries as needed for different screen sizes */
#brgy {
    width: 300%; /* Adjusted width for responsiveness */
    max-width: 400px; /* Set a maximum width if needed */
    padding: 10px;
    margin-left: 7%;
    border: 1px solid #ced4da;
    border-radius: 5px;
    background-color: #f8f9fa;
    color: #495057;
    height: 40px; /* Adjusted height, you can change this value based on your design */
}

/* Add a media query for screens smaller than 600px */
@media screen and (max-width: 600px) {
    #brgy {
        width: 190%; /* Set width to 100% for smaller screens */
        max-width: none; /* Remove the max-width for smaller screens if needed */
    }
}

</style>

<div class="sidenav">
    <div class="text">
    
    <i class="fa fa-user-circle-o" style="font-size:40px; color:white;  margin-left:110px; margin-top: 20px"> 
    </i><br><div style="font-size:20px; color:white; text-align: center"> <?php echo " " . $_SESSION['username'] . ""; ?></div> <br><br><br><br><br>
    </div>
<a href="itemlist.php" ><i class="fa fa-home" aria-hidden="true"></i> Products</a>
<a href="cart.php" class="active"><i class="fa fa-shopping-cart"></i> Your Cart    (<?php
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
    function displayImage() {
        var input = document.getElementById('imageUpload');
        var label = document.querySelector('.custom-file-label');
        var image = document.getElementById('selectedImage');

        if (input.files.length > 0) {
            label.textContent = input.files[0].name;
            
            // Display the selected image
            var reader = new FileReader();
            reader.onload = function (e) {
                image.src = e.target.result;
                image.style.display = 'block';
            };
            reader.readAsDataURL(input.files[0]);
        } else {
            label.textContent = 'Choose an image';
            image.src = '';
            image.style.display = 'none';
        }
    }
</script>

    <div class="row mt-3">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted"><h1>Your cart</h1></span>
            <span class="badge badge-secondary badge-pill"><?php echo $cartItemCount;?></span>
          </h4>
          <ul class="list-group mb-3">
          <?php
                $total = 0;
                $fee = 0;
                foreach($_SESSION['cart'] as $values)
                {
                    $total+=$values['total_price'];
                ?>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0"><?php echo $values['food_name'] ?></h6>
                            <small class="text-muted">Quantity: <?php echo $values['food_quantity'] ?> X Price: <?php echo $values['food_price'] ?></small>
                        </div>
                        <span class="text-muted">PHP <?php echo $values['total_price'] ?></span>
                    </li>
            <?php
                }
            ?>


          
           <?php 
              if($total>=200)
              $fee = 0;
              else
              $fee=30;
              $total+=$fee;
            ?>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0"><?php echo 'Delivery Fee';?></h6>
                               </div>
                        <span class="text-muted">PHP <?php echo number_format($fee,2);?></span>
                    </li>



            <li class="list-group-item d-flex justify-content-between">
              <span>Total</span>


              <strong>PHP <?php echo number_format($total,2);?></strong>
            </li>
          </ul>
        </div>
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3"><h2>Delivery Address</h2></h4><br>
          <?php 
            if(isset($errorMsg) && count($errorMsg) > 0)
            {
                foreach($errorMsg as $error)
                {
                    echo '<div class="alert alert-danger">'.$error.'</div>';
                }
            }
          ?>
          <div class="container">
          <form class="needs-validation" method="POST" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">First name</label>
                <input type="text" class="form-control" id="firstName" name="firstname" placeholder="First Name" value="<?php echo (isset($fnameValue) && !empty($fnameValue)) ? $fnameValue:'' ?>" >
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Last name</label>
                <input type="text" class="form-control" id="lastName" name="lastname" placeholder="Last Name" value="<?php echo (isset($lnameValue) && !empty($lnameValue)) ? $lnameValue:'' ?>" >
              </div>
            </div>

            <div class="mb-3">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" value="<?php echo (isset($emailValue) && !empty($emailValue)) ? $emailValue:'' ?>">
            </div>

            <div class="row">
              <div class="col-md-5 mb-3">
              <label for="town">Town:</label>
                <input type="text" class="form-control" id="town" name="town" placeholder="Enter your town">

              </div>

            

              <div class="row">
    <div class="col-md-5 mb-3">
        <label for="town">Town:</label>
<input type="text" class="form-control" id="brgy" name="brgy" placeholder="Enter your Barangay">

    </div>
</div>



              <div class="col-md-4 mb-3">
              <label for="st">Street:</label>
            <input type="text" class="form-control" id="st" name="st" placeholder="Enter your Street">

              </div>
              <div class="col-md-3 mb-3">
                <label for="hnum">House No.</label>
                <input type="text" class="form-control" id="hnum" name="hnum" placeholder="" value="<?php echo (isset($zipCodeValue) && !empty($zipCodeValue)) ? $zipCodeValue:'' ?>" >
              </div>
            </div>
            

   

<div class="d-block my-1">
    <div class="custom-control custom-radio">
        <!-- <input id="online" name="paymentMethod" type="radio" value="GCash" class="custom-control-input2">
        <label class="custom-control-label2" for="online">Online Payment</label> -->
        <div class="custom-control1 custom-radio">
        <input id="cashOnDelivery" name="paymentMethod" value="COD" type="radio" class="custom-control-input1">
        <label class="custom-control-label1" for="cashOnDelivery">Cash on Delivery</label>
    </div>
    </div>
</div>

<div class="payment-details mt-3">
    <span class="d-block mb-2">Pay via GCash</span>
    <img src="image/qrcode.jpg" width="100" height="100" class="ml-3" alt="QR Code">
</div>
<div class="input-group mt-3">
    <div class="custom-file">
        <input type="file" name="image" class="custom-file-input" id="imageUpload" onchange="displayImage()">
        <label class="custom-file-label" for="imageUpload">Choose an image</label>
    </div>
</div>

<!-- Display the selected image -->
<img id="selectedImage" src="" alt="Selected Image">

<hr class="mb-4">

<button class="btn-primary" type="submit" name="submit" value="submit">Continue to checkout</button>
</form>
      
          </div>
        </div>
      </div>
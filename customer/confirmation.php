<?php 
  
    include('config_info.php');

    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
   

       
        $sql = "UPDATE orders set confirmation = 'Order Received' WHERE id=$id";

        $res = mysqli_query($conn, $sql);

        if($res==true)
        {
            $_SESSION['update'] = "<div class='success'>Updated Successfully.</div>";
        
            header('location:orders.php');
        }
        else
        {
        
            $_SESSION['update'] = "<div class='error'>Failed to Update.</div>";
       
            header('location:orders.php');
        }

 

    }
    else
    {
        header('location:orders.php');
    }
?>
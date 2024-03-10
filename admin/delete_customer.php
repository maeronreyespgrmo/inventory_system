<?php 
  
    include('db_connect.php');

    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
 

        $sql = "DELETE FROM customer WHERE id=$id";

        $res = mysqli_query($conn, $sql);

        if($res==true)
        {
    
            $_SESSION['delete'] = "<div class='success'>User Deleted Successfully.</div>";
        
            header('location:customer_management.php');
        }
        else
        {
        
            $_SESSION['delete'] = "<div class='error'>Failed to Delete User.</div>";
       
            header('location:customer_management.php');
        }

 

    }
    else
    {
        header('location:customer_management.php');
    }
?>
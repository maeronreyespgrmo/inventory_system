<?php 
  
    include('db_connect.php');

    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
 

        $sql = "DELETE FROM users WHERE id=$id";

        $res = mysqli_query($conn, $sql);

        if($res==true)
        {
    
            $_SESSION['delete'] = "<div class='success'>User Deleted Successfully.</div>";
        
            header('location:admin_management.php');
        }
        else
        {
        
            $_SESSION['delete'] = "<div class='error'>Failed to Delete User.</div>";
       
            header('location:admin_management.php');
        }

 

    }
    else
    {
        header('location:admin_management.php');
    }
?>
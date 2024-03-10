<?php 
  
    include('db_connect.php');

    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
 

        $sql = "DELETE FROM riders WHERE id=$id";

        $res = mysqli_query($conn, $sql);

        if($res==true)
        {
    
            $_SESSION['delete'] = "<div class='success'>Rider Deleted Successfully.</div>";
        
            header('location:rider_management.php');
        }
        else
        {
        
            $_SESSION['delete'] = "<div class='error'>Failed to Delete Rider.</div>";
       
            header('location:rider_management.php');
        }

 

    }
    else
    {
        header('location:rider_management.php');
    }
?>
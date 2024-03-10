<?php 
  
    include('db_connect.php');



    if(isset($_GET['id']) && isset($_GET['image_name'])) 
    {
        
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        
        if($image_name != "")
        {
            
            $path = "MENU/".$image_name;

            
            $remove = unlink($path);

            if($remove==false)
            {
                
                $_SESSION['upload'] = "<div class='error'>Failed to Remove Image File.</div>";
               
                header('location:item.php');
                
                die();
            }

        }

       
        $sql = "DELETE FROM food WHERE id=$id";
     
        $res = mysqli_query($conn, $sql);
        
        if($res==true)
        {
          
            $_SESSION['delete'] = "<div class='success'>Item Deleted Successfully.</div>";
            header('location:item.php');
        }
        else
        {
            $_SESSION['delete'] = "<div class='error'>Failed to Delete item.</div>";
            header('location:item.php');
        }

        

    }
    else
    {
       
        $_SESSION['unauthorize'] = "<div class='error'>Unauthorized Access.</div>";
        header('location:item.php');
    }

?>
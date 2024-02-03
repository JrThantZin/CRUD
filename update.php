<?php
    
    require "connect.php";

    if(isset($_REQUEST['id'])){
        $post_id_update = $_REQUEST['id'];
     
        $title = $_REQUEST['title'];
        $description = $_REQUEST['description'];

        try{
            $data = mysqli_query($db,"UPDATE posts SET title='$title',description='$description' WHERE id=$post_id_update");
            header('location:index.php');
        }
        catch(Exception $error)
        {
            echo $error->getMessage();
            
        }

      
       
      
    
    }  
?>
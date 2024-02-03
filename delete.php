<?php
    
    require "connect.php";
    
    $id = $_GET['post_id_delete'];

    mysqli_query($db,"DELETE FROM posts  WHERE id=$id");

    header('location:index.php');
 
?>
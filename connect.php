<?php

$server='localhost';
$name='root';
$password='';
$dbname='crud_php';


$db =mysqli_connect($server,$name,$password,$dbname);

if($db == true){
    // echo " <h1>Database connect is successfully</h1> ";
    
}else {
    die('Some Error:'.mysqli_connect_error($db) );
}

?>
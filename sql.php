<?php
// echo "Welcome to connection of database <br>";
$servername="localhost";
$username="root";
$password="";
$database = "dbshresth";
//create a connection 
$conn=mysqli_connect($servername, $username, $password, $database);

if(!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}
else{
    echo " ";
}
//creating db

// $sql="CREATE DATABASE dbshresth2";
// $result=mysqli_query($conn, $sql);
// if($result){
//     echo "db was created successfully";
    
// }
// else {
//     echo "db was not created successfully because of this error ----> ". mysqli_error($conn);
    
// }


// echo $result;
// echo "<br>";
 

//die if connection not successfull

//create a table in database





?>
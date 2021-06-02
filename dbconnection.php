<?php 
$servername="localhost";
$username="root";
$password="";
$database="product_crud"; 
$conn = mysqli_connect($servername,$username,$password,$database);

if(!$conn){
     die("Connection not established:".mysqli_connect_error()."so,you can't connect to the database");
}

?>
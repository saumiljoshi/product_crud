<?php 
include("dbconnection.php");
$id=$_GET['id'];
echo $id;
$delete = "DELETE FROM `product_details` WHERE `id` = $id";
$query = mysqli_query($conn,$delete);
if ($query){
    header("Location:index.php");
    echo "<script>alert('your record has been deleted')</script>";
}else {
    echo "<script>alert('delete process failed')</script>";
}
?>
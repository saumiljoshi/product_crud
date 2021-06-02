<?php
error_reporting(0);
include("dbconnection.php");
//INSERT INTO `product_details` (`id`, `image`, `name`, `category`, `brand`, `price`, `display_price`, `description`) VALUES (NULL, 'product_image/red.png', 'saumil joshi', 'tshirt', 'adidas', '400', '599', 'this is xl tshirt');

//if($conn){
   // echo "Connection established";
//}
if(isset($_POST['submit'])) {
    $filename=$_FILES["uploadfile"]["name"];
    $tmpfile=$_FILES["uploadfile"]["tmp_name"];
    $folder = "product_image/".$filename;
    move_uploaded_file($tmpfile,$folder);
    $Name = $_POST['name'];
    $category = $_POST['category'];
    $Brand = $_POST["Brand"];
    $price = $_POST["price"];
    $display_price = $_POST['Display-price'];
    $Description = $_POST['description'];
   
   if($filename!="" && $Name!="" && $category!="" && $Brand!="" && $price!="" && $display_price!="" && $Description!="") {
       $query = "INSERT INTO `product_details` (`id`, `image`, `name`, `category`, `brand`, `price`, `display_price`, `description`) VALUES (NULL, '$folder', '$Name', '$category', '$Brand', '$price', '$display_price', '$Description');";
      // echo $query;
      // exit();
       $data = mysqli_query($conn,$query);
    }
    else 
    {
      echo "All fields are required";
    }
    if($data){
        echo "data inserted into database";
    }
        
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>product_crud</title>
</head>
<body>
<div class="nav-bar" style="margin-top:200px; margin-left:700px; margin-right:100px; margin-bottom:100px;" class = "form-group">
<form action="" method="post" enctype="multipart/form-data">
<div class="container" class= "nav-nav-tabs">
<label for="image-file">image-file</label>
<input type="file" name="uploadfile" class = "form-control" required/><?php echo "<img src='$folder' height='100' width='100'/>";?><br/><br/>
</div>
<div class="container" class="nav-nav-tabs">
<label for="name">full name</label>
<input type="text" name="name" class = "form-control" required/><br/><br/></div>
<div class="container" class= "nav-nav-tabs">
<label for="name">Category</label>
<input type="text" name="category" class = "form-control" required/><br/><br/></div>
<label for="name">Brand</label>
<input type="text" name="Brand" class = "form-control" required/><br/><br/>
<label for="name">Price</label>
<input type="text" name="price" class="form-control" required/><br/><br/>
<label for="name">Display-price</label>
<input type="text" name="Display-price" class="form-control" required/><br/><br/>
<label for="description">Description</label>
<textarea name="description" class="form-control" required></textarea><br/><br/>
<input type="submit" name="submit" class="btn btn-primary" required/><br/>
</form>
</body>
</html>
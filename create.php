<?php
error_reporting(0);
include("dbconnection.php");
//INSERT INTO `product_details` (`id`, `image`, `name`, `category`, `brand`, `price`, `display_price`, `description`) VALUES (NULL, 'product_image/red.png', 'saumil joshi', 'tshirt', 'adidas', '400', '599', 'this is xl tshirt');

//if($conn){
   // echo "Connection established";
//}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>product_crud</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
<div class="card">
<div class="card-header bg-dark"><h1 class="text-white text-center">Insert operation</h1>
</div></div>
<div class="container" style="margin-top:50px; margin-left:700px; margin-right:500px; margin-bottom:100px;">
<form action="" method="post" enctype="multipart/form-data">
<label for="image-file">image-file</label>
<input type="file" name="uploadfile" id="image-file" required/><?php echo "<img src='$folder' height='100' width='100'/>";?><br/><br/>
<label for="name">full name</label>
<input type="text" name="name" style="width: 500px; height: 60px;" id="Name" class="form-control"><li class="rq"><font color="red">*Enter alphabets only.</font></li><br/><br/>
<label for="name">Category</label>
<input type="text" name="category" style="width: 500px; height: 50px;" id="Category" class="form-control"  required/><br/><br/>
<label for="name">Brand</label>
<input type="text" name="Brand" style="width: 500px; height: 50px;" id="Brand" class="form-control"  required/><br/><br/>
<label for="name">Price</label>
<input type="number" name="price" style="width: 500px; height: 50px;" id="Price" class="form-control"  required/><br/><br/>
<label for="name">Display-price</label>
<input type="number" name="Display-price" id="Display-price" style="width: 500px; height: 50px;" class="form-control"  required/><br/><br/>
<label for="description">Description</label>
<textarea name="description" id="description" style="width: 500px; height: 50px;" class="form-control"  required></textarea><br/><br/>
<input type="submit" name="submit" class="btn btn-primary" onclick="return validate();" /><br/><br/>
</form>
<?php 
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
  $query = "INSERT INTO `product_details` (`id`, `image`, `name`, `category`, `brand`, `price`, `display_price`, `description`) VALUES (NULL, '$folder', '$Name', '$category', '$Brand', '$price', '$display_price', '$Description');";
    // echo $query;
    // exit();
  $data = mysqli_query($conn,$query);
  if($data){
      echo "<font color='green'>data inserted into database</font>";
  }
  
      
}else 
{
echo "<font color='blue'>All fields are required</font>";
}

?>

</body>
<script type="text/javascript">
function validate() {
    var Name = document.getElementById("Name");
    var alpha = /^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$/  
    var Category = document.getElementById("Category");
    var Display = document.getElementById("Display-price");
    var Desc = document.getElementById("description");
    var img = document.getElementById("image-file");
    if (Name.value == "") {
        alert('Please enter Name');
        return false;
    }
    if(Category.value == ""){
      alert('Please enter Category');
    }
    if(Brand.value == ""){
      alert('Please insert Brand-name');
    }
    if(Price.value == ""){
      alert('please enter the price!!');
    }
    if(Display.value == ""){
      alert('please enter Display-price!!!');
    }
    if(Desc.value == ""){
      alert("please enter Description about your product");
    }
    if(img.value == ""){
      alert("please upload image!!");
    }
    else if (!Name.value.match(alpha)) {
        alert('Invalid,allow only alphabetic characters on full-name');       
        return false;
   }
   else 
   {
    return true;
   }
}
</script>
</html>

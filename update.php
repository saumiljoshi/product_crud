<?php 
include("dbconnection.php"); 
//echo $_GET['id']; echo"<br/>";
 //echo $_GET ['Description'];echo"<br/>"; 
 echo $_GET['image'];
 
 

 
 
 
 if(isset($_POST['edit'])){

   $id = $_GET['id'];  
   $Name = $_POST['name'];
    $category = $_POST['category'];
    $Brand = $_POST['brand'];
    $Img = $_FILES["Uploadfile"]["name"];
    $tmpfile=$_FILES["Uploadfile"]["tmp_name"];
    $folder = "product_image/".$Img;
    move_uploaded_file($tmpfile,$folder);
    $Price = $_POST['Price'];
    $display_price = $_POST['display_price'];
    $Desc = $_POST['description'];
    $update =  "UPDATE product_details SET name='$Name',category='$category',brand='$Brand', image='$folder',price='$Price',display_price='$display_price',description='$Desc' WHERE id='$id'" ;
     // $update="UPDATE 'product_details' SET 'name' = '$Name','category' = '$category','brand' = '$Brand','price' = '$Price','display_price' = '$display_price','description' = '$Desc' WHERE  'id' = $id";
    //echo( $update);
    //exit();
    //UPDATE `product_details` SET `name` = 'aamir', `category` = 'frg44', `brand` = '55666', `price` = '333', `display_price` = '666' WHERE `product_details`.`id` = 34;
    $query = mysqli_query($conn,$update);
    if($query){
        echo "record has been updated successfully";
      }
      else
      {
        echo "not updated successfully";
      } 
}
    else {
     echo "<center><font color='blue'>click on button</font></center>";
   }
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
<div class="container" class= "col-lg-12 m-auto" class="form-group">
    <form method="POST" action="" enctype="multipart/form-data">
    <label for="name">name:</label>
    <input type="text" name="name" placeholder="insert your name here" value="<?php echo $_GET['name'];?>"  class="form-control"/><br/>
    <label for="category">category:</label>
    <input type="text" name="category" placeholder="insert your data here" value="<?php echo $_GET['category']; ?>" class="form-control"/><br/>
    <input type ="file" name="Uploadfile"/><br/>
    <label for="category">Brand:</label>
    <input type="text" name="brand" placeholder="insert your data here" value="<?php echo $_GET['brand']; ?>" class="form-control"/><br/>
    <label for="category">Price:</label>
    <input type="text" name="Price" placeholder="insert your" value="<?php echo $_GET['price']; ?>" class="form-control"/><br/>
    <label for="category">display_price:</label>
    <input type="text" name="display_price" placeholder="insert" value="<?php echo $_GET['display_price']; ?>" class="form-control"/><br/>
    <label for="category">Description:</label>
    <input type="textarea" name="description" style="width: 500px; height: 50px;" placeholder="insert here"  value="<?php echo $_GET['description']; ?>" class="form-control" style="width:200px; margin-right:100px; margin-bottom:10px; height:100px;" /><br/>
    <input type="submit" name="edit" class="btn btn-primary" value="update"/><br/>
    </form>
</div>
</body>
</html>

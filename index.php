<?php 
include("dbconnection.php");
$sql = "SELECT * FROM `product_details`";
//echo $sql;
$select = mysqli_query($conn,$sql);
$total = mysqli_num_rows($select);
//echo $total;
if ($total > 0)
{
    
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
<form>
    <table style ="margin-top: 10px; margin-left:400px;">
    <thead>
    <tr>
    <th>image-file</th>
    <th>full name</th>
    <th>Category</th>
    <th>Brand</th>
    <th>Price</th>
    <th>Display-price</th>
    <th>Description</th>
    <th colspan ="2">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php 
    
    while ($result = mysqli_fetch_array($select))
    {
        ?>
        <tr>
          <td><?php echo "<img src='$result[image]' height='100' width='100'/>"; ?></td>
          <td><?php echo $result ["name"]; ?></td>
          <td><?php echo $result ["category"];?></td>
          <td><?php echo $result ["brand"];?></td>
          <td><?php echo $result["price"]; ?></td>
          <td><?php echo $result["display_price"]; ?></td>
          <td><?php echo $result["description"]; ?></td>
          <td><button class="btn-danger btn"><a class = "btn-delete-action" href = "delete.php?id=<?php echo $result["id"];?>" onclick="return del();">Delete</a></button></td>
          <td><button class="btn-danger btn"><a class = "btn-edit-action" href = "update.php?id=<?php echo $result["id"];?>">Edit</button></a></td>
          </tr>
    <?php
    }
    
}else 
{
  echo "no record found";    
}
    ?>
     
    </tbody>
    </table>
    <script type="text/javascript"> 
         function del() {
            var ans = confirm("Are you sure you want to delete!!");
            if(ans ==true) {
               return true;
            }else
            {
               return false;
            }
            return false;
         }
    </script>
    </form>
</body>
</html>
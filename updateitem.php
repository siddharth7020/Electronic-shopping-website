<?php
include "db.php";
error_reporting();
if(!isset($_GET['id']))
{
    header("location:login.php");
}
else
{
    $id = $_GET['id'];
    $qry = mysqli_query($conn,"select * from products where pid = '$id'");
    $qryresult = mysqli_fetch_assoc($qry);
}
?>
<html>
<head>
    <title>Add Product</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Add Product</h2>

<form method="post" action="" enctype="multipart/form-data">
  <div class="container">
    <label for="uname"><b>Product Name</b></label>
    <input type="text" placeholder="Enter Productname" value="<?php echo $qryresult['pname'];?>" name="pname" required>

    <label for="price"><b>Price</b></label>
    <input type="number" placeholder="Price" value="<?php echo $qryresult['price'];?>" class="phone" name="price" required>
      
    <label for="size"><b>Quantity</b></label>
    <input type="number" placeholder="Quantity" value="<?php echo $qryresult['qty'];?>" class="phone" name="qty" required>

    <label for="category"><b>Category</b></label>
    <input type="text" placeholder="category" value="<?php echo $qryresult['pcategory'];?>" name="category" required>

    <label for="file"><b>Select Image</b></label>
    <input type="file" name="file">
      
    <button type="submit" name="add">Add Product</button>
  </div>
</form>
</body>
</html>

<?php

if(isset($_POST['add']))
{
    $name = $_POST['pname'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    $category = $_POST['category'];
    $img = $_FILES['file']['name'];
    $tmp = $_FILES['file']['tmp_name'];
    $qry = mysqli_query($conn,"update products set pname='$name',price='$price',qty='$qty',pcategory='$category',path='$img' where pid='$id'");
    if($qry)
    {
        echo '<script>alert("Updated Successfully");location.href="admin.php";</script>';
    }
    else
    {
        echo '<script>alert("Error");</script>';
    }
}

?>
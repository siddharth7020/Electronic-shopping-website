<?php
include "db.php";
?>
<html>
<head>
    <title>Add Product</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Add Product</h2>

<form method="post" action="addproduct.php" enctype="multipart/form-data">
  <div class="container">
    <label for="uname"><b>Product Name</b></label>
    <input type="text" placeholder="Enter Productname" name="pname" required>

    <label for="price"><b>Price</b></label>
    <input type="number" placeholder="Price" class="phone" name="price" required>

    <label for="size"><b>Quantity</b></label>
    <input type="number" placeholder="Quantity" class="phone" name="qty" required>

    <label for="category"><b>Category</b></label>
    <input type="text" placeholder="category" name="category" required>

    <label for="file"><b>Select Image</b></label>
    <input type="file" name="file"><br><br><br>
    <a href="admin.php" class="cancelbtn" style="text-decoration:none;color:#fff;">Cancel</a>
    <br><button type="submit" name="add">Add Product</button>
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
     $qry = mysqli_query($conn,"INSERT INTO `products`(`pname`, `price`, `qty`, `pcategory`, `path`) VALUES('$name','$price','$qty','$category','$img')");
    if($qry)
    {
        echo '<script>alert("Done");</script>';

    }
    else
    {
       
        echo "error is".mysqli_error();
    }
}

?>
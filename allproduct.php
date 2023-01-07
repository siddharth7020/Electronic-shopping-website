<?php

include "db.php";
if(isset($_GET['pcategory']))
{
    $category = $_GET['pcategory'];
    $fruits = mysqli_query($conn,"select * from products where pcategory = '$category'");
}
include("header.php");

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>All Products</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src=""></script>
</head>
<body>
<div class="row no-gutters container mx-auto text-center p-4">
<?php
if(mysqli_num_rows($fruits)>=1)
{
    while($f = mysqli_fetch_assoc($fruits))
    {
        echo '<a href="view_product.php?id='.$f['pid'].'" class="text-dark text-center nav-link p-0">
        <div class="card col-3">
            <img src="all_pic/'.$f['path'].'" class="img" alt="...">
            <div class="card-body">
                <h5 class="card-title m-0">'.substr($f['pname'],0,20).'</h5>
                <p class="card-text m-0">1 kg</p>
                <p class="card-text text-success">Rs.'.$f['price'].'.00</p>
            </div>
            <a href="p_info.php?id='.$f['pid'].'" class="btn btn-primary mb-2 w-75 mx-auto">Shop Now</a>
        </div>
        </a>';
    }  
}
else
{
    echo '<div class="card col-6 mx-auto p-4">
            <h3 class="text-center">Product not found<h3>
            <div class="pt-4 text-right">
                <a href="index.php" class="btn btn-success">Continue Shopping</a>
            </div>
         </div>';
}
?>
</div>
<?php

include "footer.html";

?>
</body>
</html>
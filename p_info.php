<?php

include("db.php");
error_reporting();

if(isset($_GET['pcategory']))
{
    $c = $_GET['pcategory'];
    $qry = mysqli_query($conn,"select * from products where pcategory='$c'");
}


?>

<html>
<head>
    <title>Product Info</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        img
        {
            width:180px;
            height:200px;
        }
    </style>

</head>
<body>
    <?php
        include("header.php");
    ?>
<div class="row no-gutters p-4">
<?php
if(mysqli_num_rows($qry)>=1)
{
    while($d = mysqli_fetch_assoc($qry))
    {
       echo '<a href="view_product.php?id='.$d['pid'].'" class="text-dark nav-link p-0 text-center">
            <div class="card" style="width: 18rem;">
            <img src="all_pic/'.$d['path'].'" class="mx-auto" alt="...">
            <div class="card-body">
              <h5 class="card-title">'.substr($d['pname'],0,40).'</h5>
              <p class="card-text text-success">Rs. '.money($d['price']).'</p>
              <p class="card-text">'.substr($d['mdetail'],0,20).'.</p>
            </div>
            <a href="view_product.php?id='.$d['pid'].'" class="btn btn-primary my-3 w-75 mx-auto my-2">Shop Now</a>
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
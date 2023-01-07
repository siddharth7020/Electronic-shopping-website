<?php
error_reporting(0);
include("header.php");
include("db.php");
if(isset($_POST['search']))
{
    $c = $_POST['pvalue'];
    $qry = mysqli_query($conn,"select * from products where pname like '%$c%'");
}

?>
<html>
<body>
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
              <p class="m-0">1 kg</p>
              <p class="text-success m-0">Rs. '.$d['price'].'.00</p>
            </div>
            <a href="view_product.php?id='.$d['pid'].'" class="btn btn-primary mb-2 w-75 mx-auto my-2">Shop Now</a>
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
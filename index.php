<?php

include("db.php");
$empty=0;
$smartphones = mysqli_query($conn,"select * from products where pcategory = 'smartphones' and  qty>'$empty'");
$wires = mysqli_query($conn,"select * from products where pcategory = 'wires' order by pid desc limit 4");
$sockets = mysqli_query($conn,"select * from products where pcategory = 'sockets' order by pid desc limit 4");

?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php
include "import.php"  ?>
 <style>
          .card-img
          {
            width:350px;
            height:300px;
          }
        </style>
    <title>Home</title>
</head>
<body>
    <?php 
    include "header.php"?>
    <!--heaader(navbar) end here-->
<div id="backbanner">
<img src="slider/banner1.jpg" class="img-fluid" style="width:100%;height:80vh" alt="..">
</div>
<!--banner end here-->
<div class="container text-center ">
    <h1 class="mt-1">The Elecrtick present</h1>
    <h3 class="mt-2">Most afordable and quality electronic gadjets here</h3>

<!--        Top Categories    -->
<h2 class="text-center my-3 d-block">TOP SMARTPHONES</h2>

<div class="row no-gutters container mx-auto text-center">
<?php

while($f = mysqli_fetch_assoc($smartphones))
{
  echo '<a href="view_product.php?id='.$f['pid'].'" class="text-dark text-center nav-link p-0">
            <div class="card col-3">
                <img src="all_pic/'.$f['path'].'" class="img" alt="...">
                <div class="card-body">
                    <h5 class="card-title m-0">'.substr($f['pname'],0,20).'</h5>
                    <p class="card-text m-0"></p>
                    <p class="card-text text-success">Rs.'.$f['price'].'.00</p>
                </div>
                <a href="view_product.php?id='.$f['pid'].'" class="btn btn-primary my-3 w-75 mx-auto">Shop Now</a>
            </div>
            </a>';
}  

  ?>
</div>
<!--end of smartphones-->


<h2 class="text-center my-3 d-block">TOP WIRES</h2>

<div class="row no-gutters container mx-auto text-center">  
<?php

while($v = mysqli_fetch_assoc($wires))
{
  echo '<a href="view_product.php?id='.$v['pid'].'" class="text-dark nav-link p-0">
          <div class="card col-3">
            <img src="all_pic/'.$v['path'].'" class="img" alt="...">
              <div class="card-body">
                <h5 class="card-title m-0">'.substr($v['pname'],0,20).'</h5>
                <p class="card-text m-0"></p>
                <p class="card-text text-success">Rs.'.$v['price'].'.00</p>
              </div>
            <a href="view_product.php?id='.$v['pid'].'" class="btn btn-primary my-3 w-75 mx-auto">Shop Now</a>
          </div>
        </a>';
}  

  ?>
</div>
<!--        End of wires   -->

<h2 class="text-center my-3 d-block">TOP SOCKET</h2>

<div class="row no-gutters container mx-auto text-center">  
<?php

while($v = mysqli_fetch_assoc($sockets))
{
  echo '<a href="view_product.php?id='.$v['pid'].'" class="text-dark nav-link p-0">
          <div class="card col-3 m2">
            <img src="all_pic/'.$v['path'].'" class="img" alt="...">
              <div class="card-body">
                <h5 class="card-title m-0">'.substr($v['pname'],0,20).'</h5>
                <p class="card-text m-0"></p>
                <p class="card-text text-success">Rs.'.$v['price'].'.00</p>
              </div>
            <a href="view_product.php?id='.$v['pid'].'" class="btn btn-primary my-3 w-75 mx-auto">Shop Now</a>
          </div>
        </a>';
}  

  ?>
</div>
<!--        End of wires   -->
</div>


<?php 
include "footer.php"?>
<!--footer end here-->
</body>
</html>

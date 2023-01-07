<?php
include("db.php");
error_reporting();

if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $qry = mysqli_query($conn,"select * from products where pid='$id'");
    $d = mysqli_fetch_assoc($qry);
    $category = $d['pcategory'];
}
else
{
    echo '<script>alert("Please login first");location.href="login.php";</script>';
}


?>

<html>
<head>
    <title>Product Description</title>
    <style>
    .card
    {
        width:370px;
    }
    .main-img
    {
        width:250px;
        height:300px;
        margin:auto;
    }
    </style>
</head>
<body>
    <?php
        include("header.php");
    ?>
    <div class="row no-gutters container mx-auto p-4">
        <div class="card col-5 p-4 text-center">
            <img src="all_pic/<?php echo $d['path'];?>" alt="" class="main-img">
            <div class="card-body col-12">
                <a href="addtocart.php?id=<?php echo $d['pid'];?>" class="btn btn-danger col-5">Add To Cart</a>
                <a href="buy.php?id=<?php echo $d['pid'];?>" class="btn btn-success col-5">Buy Now</a>
            </div>
        </div>
        <div class="col-7 p-4">
            <h3>
                <?php echo $d['pname'];?>
            </h3>
            <h4 class="text-success">Rs. <?php echo " ".$d['price'].".00";?></h4>
            <p class="text-muted">Inclusive of all taxes</p>
            <p class="text-muted">Express Delivery: Today 2:00PM - 4:00PM</p>


            <p class="col-8 mx-0 px-0 text-muted">Pay using PayPal & get max. Rs. 500 PayPal Cashback* (FLAT 25%) on all products. Valid once per user. *T&C</p>
        </div>
    </div>

<!--    similar Product     -->
<div class="row no-gutters container mx-auto">
    <h2 class="m-4 col-10">Similar Popular Products </h2>
    <a href="allproduct.php?pcategory=fruits" class="btn btn-primary h-100 m-4">View All</a>
</div>
<div class="row no-gutters container mx-auto text-center">
<?php

$fruits = mysqli_query($conn,"select * from products where pcategory='$category' and pid not like '$id' limit 4");

if(mysqli_num_rows($fruits)>=1)
{
    while($f = mysqli_fetch_assoc($fruits))
    {
    echo '<a href="view_product.php?id='.$f['pid'].'" class="text-dark text-center nav-link p-0">
            <div class="card col-3">
                <img src="all_pic/'.$f['path'].'" class="img" alt="...">
                <div class="card-body">
                    <h5 class="card-title m-0">'.$f['pname'].'</h5>
                    <p class="card-text m-0">1 kg</p>
                    <p class="card-text text-success">Rs.'.$f['price'].'.00</p>
                </div>
                <a href="p_info.php?id='.$f['pid'].'" class="btn btn-primary my-3 w-75 mx-auto">Shop Now</a>
            </div>
            </a>';
    }  
}

    ?>
</div>

<?php

include "footer.html";

?>

</body>
</html>
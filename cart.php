<?php
session_start();
error_reporting(0);
include "db.php";

if(isset($_SESSION['phone']))
{
    
}
else
{
    echo '<script>location.href="index.php";</script>';
}
include("header.php");
?>

<html>
<head>
    <title>Cart</title>
</head>
<body>
    <h2 class="col-6 text-center mx-auto my-3 bg-success p-2 text-white">My Cart</h2>
<?php

//user details 
$phone = $_SESSION['phone'];
$details = mysqli_query($conn,"select * from signup where phone = '$phone'");
if($details){
    $detailsresult = mysqli_fetch_assoc($details);
    $name = $detailsresult['fname'];
}
$qry = mysqli_query($conn,"select * from cart where phone='$phone'");
if(mysqli_num_rows($qry)>=1)
{
    while($d = mysqli_fetch_assoc($qry))
    {
       echo '<a href="view_product.php?id='.$d['pid'].'" class="" style="text-decoration:none;"><div class="d-flex align-item-center justify-content-center media p-4 d-block col-6 mx-auto border-bottom">
       <img src="all_pic/'.$d['path'].'" alt="first image" class="mx-2 img-responsive" style="width:100px;height:150px;">
       <div class="media-body">
         <h6>'.$d['pname'].'</h6>
         <p class="text-success">Rs. '.$d['price'].'</p>
         <form action="updateqty.php?id='.$d['pid'].'" method="post">
            <input type="submit" value="-" name="operator" class="btn btn-danger mb-1 mx-1">
            <input type="number" value="'.$d['qty'].'" name="qty" class="form-control w-25 d-inline m-0">
            <input type="submit" value="+" name="operator" class="btn btn-primary mb-1 mx-1">
        </form>
            <div class="p-2 text-right">
                <form action="deletecart.php?id='.$d['pid'].'" method="post">
                    <input type="submit" value="Delete" name="delete" class="btn btn-primary">
                    <a href="index.php" class="btn btn-success">Continue Shopping</a>
                </form>
            </div>
       </div>
     </div></a>';
    }
    echo '<div class=" col-6 m-auto p-2 text-right">
            <a href="buyfromcart.php" class="btn btn-info">Buy Now</a>
        </div>';
}
else
{
    echo '<div class="card col-6 mx-auto p-4">
            <h3 class="text-center">Cart Is Empty<h3>
            <div class="pt-4 text-right">
                <a href="index.php" class="btn btn-success">Continue Shopping</a>
            </div>
        </div>';
}

?>

<?php

include "footer.html";

?>
</body>
</html>
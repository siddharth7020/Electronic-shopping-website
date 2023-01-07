<?php
session_start();
error_reporting(0);
include("db.php");

if(isset($_SESSION['phone']))
{
    $phone = $_SESSION['phone'];
    $id = $_GET['id'];
    $qry = mysqli_query($conn,"select * from cart where phone='$phone' and pid='$id'");
    if(mysqli_num_rows($qry)<1)
    {
        //user details

        $details = mysqli_query($conn,"select * from signup where phone='$phone'");
        if($details){
            $detailsresult = mysqli_fetch_assoc($details);
            $name = $detailsresult['fname'];
        }

        //getting product details 
        $cartqry = mysqli_query($conn,"select * from products where pid='$id'");
        $totalresult = mysqli_fetch_assoc($cartqry);
        $pname = $totalresult['pname'];
        $path = $totalresult['path'];
        $price = $totalresult['price'];
        $insert = mysqli_query($conn,"INSERT INTO `cart`(`uname`, `phone`, `pname`, `pid`, `path`, `qty`, `price`) VALUES('$name','$phone','$pname','$id','$path','1','$price')");
        $qty = $totalresult['qty'];
        $qty--;
        mysqli_query($conn,"update products set qty='$qty' where pid='$id'");
    }
        $qry = mysqli_query($conn,"select * from cart where phone='$phone'");
        $total = mysqli_query($conn,"select sum(qty*price) AS 'total' from cart where phone='$phone'");
        $totalresult = mysqli_fetch_assoc($total);
        $tnum = mysqli_num_rows($qry);
        $result = $totalresult['total'];

        
        //user address details
        $add = mysqli_query($conn,"select * from signup where phone='$phone'");
        $totalproduct = mysqli_num_rows($add);
        $addresult = mysqli_fetch_assoc($add);
}
else
{
    echo '<script>location.href="index.php";</script>';
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Buy</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    
    <script src="">
        <?php
        function money($money){
            $len = strlen($money);
            $m = '';
            $money = strrev($money);
            for($i=0;$i<$len;$i++){
                if(( $i==3 || ($i>3 && ($i-1)%2==0) )&& $i!=$len){
                    $m .=',';
                }
                $m .=$money[$i];
            }
            return strrev($m);
        }
        ?>
    </script>
</head>
<body>
<div class="row no-gutters container mx-auto p-4">
<div class="col-8">
    <div class="card col-12">
        <h4 class="card-title p-2 my-3 border-bottom text-center">Delivery Address</h4>
        <div class="card-body">
            <p class="p-0 m-0"><b><?php echo $addresult['fname']." ".$addresult['lname'];?></b></p>
            <p class="p-0 m-0"><?php echo $addresult['address'].", ".$addresult['state'].", ".$addresult['zipcode'];?></p>
            <p class="p-0 m-0">Phone - <b><?php echo $addresult['phone'];?></b></p>
        </div>
    </div>
    <h4 class="card bg-dark text-white col-12 text-center mx-auto my-3 border-bottom p-2">My Cart</h4>
    <?php
    if(mysqli_num_rows($qry)>=1)
    {
        while($d = mysqli_fetch_assoc($qry))
        {
        echo '<div class="border d-flex align-item-center justify-content-center media p-4 d-block col-12 mx-auto">
        <img src="all_pic/'.$d['path'].'" alt="first image" class="mx-2 img-responsive" style="width:150px;height:200px;">
        <div class="media-body">
            <h6>'.$d['pname'].'</h6>
           
            <p class="text-success m-0 mb-2">Rs. '.money($d['price']).'.00</p>
            <input type="number" value="'.$d['qty'].'" name="qty" disabled class="form-control w-25 d-inline m-0">
        </div>
        </div>';
        }
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

        <div class="col-12 row no-gutters m-auto p-2 text-left">
            <h4 class="col-6"><b>Grand Total - Rs. <?php echo " ".money($result).".00";?></b></h4>
            <form action="payment.php" method="post">
                <input type="submit" class="btn btn-info" value="Continue Payment" name="submit">
            </form>
        </div>
    </div>
    
<div class="col-4 p-3 h-100">
    <h3 class="p-0 m-0">Price Details</h3>
    <hr>
    <p>Price(<?php echo $tnum; ?> item)<span  style="float:right">Rs. <?php echo " ".$result.".00"; ?></span></p>
    <p>Delivery Charges<span style="float:right">Free</span></p>
    <p>Delivery Method<span style="float:right">COD</span></p>
    <hr>
    <p>Amout Payable<span style="float:right">Rs. <?php echo " ".$result.".00"; ?></span></p>
</div>
</div>

</body>
</html>
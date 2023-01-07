<?php
error_reporting(0);
session_start();
include("db.php");
              $oid = rand();
                $date = getdate();
                $curr_mon = $date["month"];
                $curr_year = $date["year"];
                $oday = $date["mday"];
                $omonth = $date["month"];
                $oyear = $date["year"];
           
if(!isset($_SESSION['phone']))
{
    header("location:index.php");
}
else
{
 $pmethod = $_GET['pmethod'];

    //product data
    $phone = $_SESSION['phone'];
    $q = mysqli_query($conn,"select * from cart where phone='$phone'");
    $r = mysqli_num_rows($q);
    $cp = mysqli_fetch_assoc($q);

    $qforexistence = mysqli_query($conn,"select * from payment where phone = '$phone'");//checking whether the details are already inserted
    $card_number = $_POST['cardnumber'];//getting card number
    $name = $cp['uname'];//user name
    $qforcart = mysqli_query($conn,"select * from cart where phone='$phone'");
    while($fetchdata = mysqli_fetch_assoc($qforcart))
    {
        $pid = $fetchdata['pid'];
        if($_GET['pmethod']=="Through Card")//if card payment is seleected
        {
            $inserted = $insertdata = mysqli_query($conn,"insert into payment values('$name','$phone','$card_number','Through Card','$pid')");
        }
        else//if COD is seleected
        {
            $insertdata = mysqli_query($conn,"insert into payment values('$name','$phone','0000000000000000','Cash On Delivery','$pid')");
        }
    }
    if($r<=0)
    {
        echo '<script>alert("You dont have any product!!!");location.href="index.php";</script>';
    }
    else
    {
        if(isset($_POST['payment']))
        {
            while($r>0)
            {
                $month = array('January','February','March','April','May','June','July','August','September','October','November','December');
                $oid = rand();
                $date = getdate();
                $curr_mon = $date["month"];
                $curr_year = $date["year"];
                $oday = $date["mday"];
                $omonth = $date["month"];
                $oyear = $date["year"];
                $mon = $date["mon"];

                $dt = date("d");
                if($mon==1 ||$mon==3 ||$mon==5 ||$mon==7 ||$mon==8 ||$mon==10 ||$mon==12)
                {
                    $dd = $dt%31;
                    if($dd==28 ||$dd==29 ||$dd==30 ||$dd==0)
                    {
                        $curr_mon = $month[$mon];
                        if($mon==12)
                        {
                            $curr_year++;
                        }
                        $dd = ($dt+4)%31;
                    }
                    else
                    {
                       $curr_mon = $omonth;
                       $dd = $dt+4;
                    }
                }
                else if($mon==4 ||$mon==6 ||$mon==9 ||$mon==11)
                {
                    $dd = $dt%30;
                    if($dd==27 ||$dd==28 ||$dd==29 ||$dd==0)
                    {
                        $curr_mon = $month[$mon];
                    }
                    else
                    {
                        $curr_mon = $omonth;
                    }
                    $dd = ($dt+4)%30;
                }
                else
                {
                    $curr_mon = $month[$mon-1];
                }
                $id = $cp['pid'];
                $name = $cp['uname'];
                $pname = $cp['pname'];
                $path = $cp['path'];
                $qty = $cp['qty'];
                $price = $cp['price'];

                 $day = date("j");
            $month = date("n");
            $year = date("Y");
            $issue_date = date_create("$year-$month-$day");
            $b_date = date_format($issue_date,"Y-m-d");
            $r_date = date_add($issue_date,date_interval_create_from_date_string("1 days"));
            $d_date = date_format($r_date,"d");

                $check = mysqli_query($conn,"INSERT INTO `ordertable`(`pid`, `name`, `phone`, `mdetails`, `prize`, `path`, `qty`, `orderid`, `oday`, `omonth`, `oyear`, `deliverydate`, `deliverymonth`, `deliveryyear`, `pmethod`) values('$id','$name','$phone','$pname','$price','$path','$qty','0','0','0','0','0','0','0','$pmethod')");
                if($check)
                {
                    $update = mysqli_query($conn,"UPDATE ordertable set orderid='$oid',oday='$oday',omonth='$omonth',oyear='$oyear' where pid='$id' and phone='$phone'");
                    $update = mysqli_query($conn,"UPDATE ordertable set deliverydate='$d_date ',deliverymonth='$omonth',deliveryyear='$curr_year' where pid='$id' and phone='$phone'");
                }
                else
                {
                    echo mysqli_error($conn);
                }
                $r--;
            }
        //  for displaying the Address
            $q1 = mysqli_query($conn,"select * from signup where phone='$phone' ");
            $r1 = mysqli_fetch_assoc($q1);

            // for displaying order Details
            $order = mysqli_query($conn,"select * from ordertable where phone='$phone'");
            $orderresult = mysqli_fetch_assoc($order);

            $address = $r1['address'].','.$r1['state'].','.$r1['zipcode'];
        }
        else
        {
            header("index.php");
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Final Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    
    <script src="main.js"></script>
</head>
<body>
    <h1 class="text-success text-center my-3">Thank You For Your Order!!!</h1>
    <p class="text-center col-10 mx-auto my-4">Your order has been placed and is being processed.When the item(s) are shipped,you will receive an email with the courier
Tracking ID and the link where you can track your order.Meanwhile ,you can track your order</p>

<?php

    $gt = mysqli_query($conn,"select sum(qty*price) AS gt from cart where phone='$phone'");
    $gtresult = mysqli_fetch_assoc($gt);

    $p = mysqli_query($conn,"select * from ordertable where pid='$id' and phone='$phone'");
    $presult = mysqli_fetch_assoc($p);
    echo '<div class="row no-gutters">
            <div class="card col-6 p-4">
                <h4 class="text-center border-bottom p-2">Order Details</h4>
                <p>OrderID<span class="col-6" style="float:right">:'.$presult['orderid'].'</span></p>
                <p>Order Date<span class="col-6" style="float:right">:'.$presult['oday'].'/'.$presult['omonth'].'/'.$presult['oyear'].'</span></p>
                <p>Delivery Date<span class="col-6" style="float:right">:'.$presult['deliverydate'].'/'.$presult['omonth'].'/'.$presult['deliveryyear'].'</span></p>
                <p>Total Amount<span class="col-6 text-success" style="float:right">:Rs. '.$gtresult['gt'].'</span></p>
            </div>
            <div class="card col-6 p-4">
                <h4 class="card-title p-2 border-bottom text-center">Delivery Address</h4>
                <div class="card-body">
                    <p class="p-0 m-0"><b>'.$name.'</b></p>
                    <p class="p-0 m-0">'.$address.'</p>
                    <p class="p-0 m-0">Phone - <b>'.$cp['phone'].'</b></p>
                    <p class="p-0 m-0">Payment Method - <b>'.$pmethod.'</b></p>
                </div>
            </div>
        </div>';
    ?>
<table border=1 cellpadding=5 cellspacing=5 class="mx-auto my-4 text-center table-xl">
    <tr>
        <th>Product Description</th>
        <th>Expected Shipping Date</th>
        <th>Expected Delivery Date</th>
        <th>Price</th>
        <th>Qty.</th>
        <th>Subtotal</th>
    </tr>

    <?php 
    $order = mysqli_query($conn,"select * from cart");
    while($d = mysqli_fetch_assoc($order))
    {
        echo "<tr>";
        echo "<td>".$d['pname']."</td>";
        echo "<td>By ".$presult['oday'].' '.$presult['omonth'].' '.$presult['oyear']."</td>";
        echo "<td>By ".$presult['deliverydate'].' ' .$presult['omonth'].' '.$presult['deliveryyear']."</td>";
        echo "<td>Rs. ".$d['price'].".00</td>";
        echo "<td>".$d['qty']."</td>";
        echo "<td>Rs. ".$d['qty']*$d['price'].".00</td>";
        echo "</tr>";
    }
    $gt = mysqli_query($conn,"select sum(qty*price) AS gt from cart where phone='$phone'");
    $gtresult = mysqli_fetch_assoc($gt);
    ?>
    <tr><th colspan="7">Grand Total = Rs.<?php echo " ".$gtresult['gt'].".00";?></th></tr>
  </table>
<div class="mx-auto text-center">
    <a href="order.php" class="btn btn-info">My Orders</a>
    <a href="index.php" class="btn btn-success">Continue Shopping</a>
</div>

</div>
</body>
</html>

<?php
//  deleting the cart
  
  $q = mysqli_query($conn,"delete from cart where phone='$phone'");

?>
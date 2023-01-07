<?php
//error_reporting(0);
include("db.php");
include('header.php');
?>
<?php
  if(!isset($_SESSION['phone']))
  {
    echo '<script>alert("You need to login!!!");location.href="login.php";</script>';
  }
    $phone = $_SESSION['phone'];
    $q = mysqli_query($conn,"select * from ordertable where phone='$phone' ");
    $nor = mysqli_num_rows($q);
  //  for displaying the Address
  $q1 = mysqli_query($conn,"select * from signup where phone='$phone' ");
  $r1 = mysqli_fetch_assoc($q1);
  $address = $r1['address'].','.$r1['state'].','.$r1['zipcode'];
	
  $date = getdate();
  $oday = $date["mday"];
  $omonth = $date["month"];
  $oyear = $date["year"];
  $month = array("January"=>1,"February"=>2,"March"=>3,"April"=>4,"May"=>5,"June"=>6,"July"=>7,"August"=>8,"September"=>9,"October"=>10,"November"=>11,"December"=>12);
 
  $mon = $date["mon"];
  ?>
<html>

<head>
  <title></title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
  <script>
 
  </script>

</head>
<body>
  <h2 class="text-center my-2 p-2 border col-6 mx-auto">My Orders (<?php echo $nor;?>)</h2>
  <?php
  if($nor>0)
  {
    while($d = mysqli_fetch_assoc($q))
    {
        echo '<div class="col-6 p-4 mx-auto">
        <h4 class="text-center bg-danger text-white p-2">Order Details</h4>
        <p>OrderID<span class="col-6" style="float:right">:'.$d['orderid'].'</span></p>
        <p>Order Date<span class="col-6" style="float:right">:'.$d['oday'].'/'.$d['omonth'].'/'.$d['oyear'].'</span></p>
        <p>Delivery Date<span class="col-6" style="float:right">:'.$d['deliverydate'].'/'.$d['deliverymonth'].'/'.$d['deliveryyear'].'</span></p>
        <p>Total Amount<span class="col-6 text-success" style="float:right">:Rs. '.$d['prize']*$d['qty'].'.00 ('.$d['qty'].' item/s)</span></p>
        </div>';
        echo '<a href="view_product.php?id='.$d['pid'].'" class="col-6 mx-auto" style="text-decoration:none;">
        <div class="d-flex align-item-center justify-content-center media p-4 d-block col-6 mx-auto border-bottom">
        <img src="all_pic/'.$d['path'].'" alt="first image" class="mx-2 img-responsive" style="width:100px;height:150px;">
        <div class="media-body">
          <h6>'.$d['mdetails'].'</h6>
          <p class="text-success">Rs. '.$d['prize'].'</p>';
            echo "<a class='btn btn-danger' href=cancelorder.php?orderid=".$d['orderid']." id='cancel'>Cancel</a>";
          
          //else if(($oday-$d['deliverydate'])>0 and $mon!=$month[$d['deliverymonth']])
       //   {
         //         echo "<a class='btn btn-danger' href=cancelorder.php?orderid=".$d['orderid']." id='cancel'>Cancel</a>";
         // }
        echo "<a class='a continue btn btn-success mx-2' href=index.php>Continue Shopping</a>";       
        echo '</div></div></a>';     
    }
  }
  else
  {
      echo '<div class="card col-6 mx-auto p-4">
              <h3 class="text-center">No Orders Yet<h3>
              <div class="pt-4 text-right">
                <a href="index.php" class="btn btn-success">Order Now</a>
              </div>
          </div>';
  }
  ?>
  <?php
    include "footer.html";
  ?>
</body>
</html>

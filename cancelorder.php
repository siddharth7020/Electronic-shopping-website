<?php

session_start();
error_reporting(0);
include("db.php");
if(isset($_SESSION['phone']))
{
	$phone = $_SESSION['phone'];
	$oid = $_GET['orderid'];
	$q = mysqli_query($conn,"select * from ordertable where orderid='$oid' phone='$phone'");
	$qresult = mysqli_fetch_assoc($q);
	$qtyincart = $qresult['qty'];
	$id = $qresult['pid'];
	$qq = mysqli_query($conn,"select * from products where pid='$id'");
	$qqr = mysqli_fetch_assoc($qq);
	$qty = $qqr['qty']+$qtyincart;
	$k = mysqli_query($conn,"update products set qty='$qty' where pid='$id'");
	if($k)
	{
		$q = mysqli_query($conn,"delete from ordertable where orderid='$oid'");
		if($q)
		{
			echo "<script>alert('SuccessFully Canceled Your Order');location.href='order.php';</script>";
		}
	}
}
else
{
	echo "<script>alert('You need to login');location.href='login.php';</script>";
}
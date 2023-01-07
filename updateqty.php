<?php
	session_start();
	error_reporting(0);
	include("db.php");
    $phone = $_SESSION['phone'];
    $id = $_GET['id'];
    $op = $_POST['operator'];
    $qty = $_POST['qty'];
	$qforcart = mysqli_query($conn,"select * from cart where pid='$id' and phone='$phone'");
	$qforcartresult = mysqli_fetch_assoc($qforcart);
	//$folder = $qforcartresult['folder'];
	$q = mysqli_query($conn,"select * from products where pid='$id'"); 
	$qr = mysqli_fetch_assoc($q);
	
	//$qforcartid = mysqli_query($c,"select * from cart where id=1 and name='$name' and phone='$phone'");
	//$norforqforcart = mysqli_num_rows($qforcartid);
	
	
	if($op=="-")
	{
		if($qty==1)
		{
			header("location:cart.php");
		}
		else
		{
			$qty--;
			$update = mysqli_query($conn,"update cart set qty='$qty' where pid='$id' and phone='$phone'");
			if($update)
			{
				//query for grandtotal of items in the cart for ordersummary
	
				$grandt = mysqli_query($c,"select sum(qty*prize) AS 'total' from cart where phone='$phone'");
				//$grandtotal = mysqli_fetch_assoc($grandt);
				
				$qtyforproduct = $qr['qty'];
				$qtyforproduct++;
				$q = mysqli_query($conn,"update products set qty='$qtyforproduct' where pid='$id'");
				if($q)
				{
					header("location:cart.php");
				}

			}
			else
			{
				echo '<script>alert("Something Wrong");</script>';
			}
		}
	}
	else
	{
		if($qty>=($qty+$qr['qty'])){
			echo '<script>alert("Out of stock");location.href="cart.php";</script>';//out of stock
		}
		else if($qty>=10)
		{
			echo '<script>alert("Range Exceed");location.href="cart.php";</script>';
		}
		else
		{
			$qty=$qty+1;
			$update = mysqli_query($conn,"update cart set qty='$qty' where pid='$id' and phone='$phone'");
			if($update)
			{
				//query for grandtotal of items in the cart for ordersummary
	
				//$grandt = mysqli_query($c,"select sum(qty*prize) AS 'total' from cart where name='$name' and id=1 and phone='$phone'");
				//$grandtotal = mysqli_fetch_assoc($grandt);
				
				$qtyforproduct = $qr['qty'];
				$qtyforproduct--;
				$q = mysqli_query($conn,"update products set qty='$qtyforproduct' where pid='$id'");
				
				if($q)
				{
					echo '<script>location.href="cart.php";</script>';
				}
			}
			else
			{
				echo "failed";
			}
		}
    }
?>
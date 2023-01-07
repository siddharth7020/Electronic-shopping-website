<?php
session_start();
include("db.php");
if(!isset($_SESSION['phone']))
{
    header("location:index.php");
}
else if(isset($_GET['id']))
{
    $id = $_GET['id'];

    //query for user details

    $phone = $_SESSION['phone'];
    $details = mysqli_query($conn,"select * from signup where phone='$phone'");
    if($details){
        $detailsresult = mysqli_fetch_assoc($details);
        $name = $detailsresult['fname'];
    }
    else
    {
        echo '<script>alert("Not Registered");<script>';
    }

    //checking whether the product is already added in cart

    $cart = mysqli_query($conn,"select * from cart where pid='$id' and phone='$phone'");
    if(mysqli_num_rows($cart)>=1)
    {
        echo '<script>alert("Product is already Added");location.href="cart.php?id='.$id.'"</script>';
    }
    else
    {
        //getting product details 
        $cartqry = mysqli_query($conn,"select * from products where pid='$id'");
        if($cartqry)
        {
            //getting the total quantity available
            $totalresult = mysqli_fetch_assoc($cartqry);
            $qty = $totalresult['qty'];
            if($qty==0)
            {
                echo '<script>alert("Product is out of stock");</script>';
            }
            else
            {
                $pname = $totalresult['pname'];
                $path = $totalresult['path'];
                $price = $totalresult['price'];
                $insert = mysqli_query($conn,"INSERT INTO `cart`( `uname`, `phone`, `pname`, `pid`, `path`, `qty`, `price`) VALUES('$name','$phone','$pname','$id','$path','1','$price')");
                if($insert)
                {
                    $qty--;
                    $i = mysqli_query($conn,"update products set qty='$qty' where pid='$id'");
                    header("location:cart.php");
                }
                else {
                    echo '<script>alert("Something Went Wrong");<script>';
                }
            }
        }
        else
        {
            echo '<script>alert("Something Went Wrong");<script>';
        }   
    }
}
else
{
    echo '<script>location.href="index.php";<script>';
}

?>
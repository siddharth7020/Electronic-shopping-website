<?php
session_start();
include("db.php");
if(isset($_POST['delete']))
{
    $phone = $_SESSION['phone'];
    $id = $_GET['id'];

    $cart = mysqli_query($conn,"SELECT * from cart where pid='$id' and phone='$phone'");//query to get folder to be updated
    $cartr = mysqli_fetch_assoc($cart);
    $qtyincart = $cartr['qty'];

    $q = mysqli_query($conn,"DELETE from cart where pid='$id' and phone='$phone'");
    //query for number of items in the cart
    $nor = mysqli_query($conn,"select * from cart where phone='$phone'");
    $qresult = mysqli_num_rows($nor);
    if($q)
    {
        $qq = mysqli_query($conn,"select * from products where pid='$id'");
        $qqr = mysqli_fetch_assoc($qq);
        $qty = $qqr['qty']+$qtyincart;
        $k = mysqli_query($conn,"update products set qty='$qty' where pid='$id'");
        if($k)
        {
            header("location:cart.php");
        }
        else
        {
            echo '<script>alert("Something wrong");<script>';
        }
    }
    else {
        echo '<script>alert("You need to login");location.href="login.php";</script>';
    }
}

?>
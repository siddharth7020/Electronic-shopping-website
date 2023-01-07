<?php
session_start();
error_reporting();
include "db.php";
if(!isset($_GET['id']))
{
    header("location:index.php");
}
else
{
    $id = $_GET['id'];
    $qry = mysqli_query($conn,"delete from products where pid='$id'");
    if($qry)
    {
        echo '<script>alert("Deleted Successfully");location.href="admin.php";</script>';
    }
}

?>
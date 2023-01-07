<?php 
$username="root";
$server="localhost";
$password="";
$database="dbElectronic";

$conn=mysqli_connect($server,$username,$password,$database);
$dbSelect=mysqli_select_db($conn,$database);

if ($conn) 
{
	
}
else
{
	die("database not connected");
}

 ?>

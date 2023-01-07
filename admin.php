<?php
    session_start();
    error_reporting();
    include("db.php");
    if(!isset($_SESSION['id']))
    {
        //header("location:login.php");
    }
    $qry = mysqli_query($conn,"select * from products order by pid desc");
?>
<!DOCTYPE html>
<html>
<head>
   <?php 
   include "import.php" ?>
    <title>Admin</title>
    
  <style>
  body
  {
    font-family:Trebuchet MS,Arial,Helvetica,sans-serif;
  }
  
  </style>
  <script>
$(document).ready(function(){
	$(".search").on("keyup",function(){
		var val = $(this).val().toLowerCase();
		$("#search tr").filter(function(){
			$(this).toggle($(this).text().toLowerCase().indexOf(val)>-1);
		});
	});
});
  </script>
</head>
<body>
    <div class="navbar bg-info text-white fixed-top">
        <h1 class="text-left">Admin Page</h1>
        <div class="form-inline">
            <a href="logout.php" class="btn btn-dark nav-link d-inline mx-1">Logout</a>
            <a href="addproduct.php" class="btn btn-danger nav-link">Add Item</a>
        </div>
    </div>
    <table class="table table-lg table-hover" cell-padding=20 style="margin-top:90px;" id="search">
        <tr class="w-100">
            <th>Product Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Category</th>
            <th>Image</th>
            <th>Operation</th>
        </tr>
        <?php
        
            while($result = mysqli_fetch_assoc($qry))
            {
                echo '<tr>
                        <td>'.$result['pname'].'</td>
                        <td>'.$result['price'].'</td>
                        <td>'.$result['qty'].'</td>
                        <td>'.$result['pcategory'].'</td>
                        <td>
                            <img src="all_pic/'.$result['path'].'" width="150" height="150">
                        </td>
                        <td>
                            <a href="updateitem.php?id='.$result['pid'].'" class="btn btn-success w-50 my-1">Update</a>
                            <a href="deleteitem.php?id='.$result['pid'].'" class="btn btn-danger w-50 my-1">Delete</a>
                        </td>
                    </tr>';
            }
        
        
        ?>
    </table>
</body>
</html>
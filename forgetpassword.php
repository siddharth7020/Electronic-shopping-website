<?php

session_start();

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<style>
</style>
</head>
<body>

<h2>Change Password</h2>

<form action="" method="post">
  <div class="imgcontainer">
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTgGIVZ5z8h6iCFebWvsxzk7_lVfQf9e3PxGI_X52seYwhUkil6NQ" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="phone"><b>Phone</b></label>
    <input type="number" placeholder="Enter Phone Number" class="phone" name="phone" required>

    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>New Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>

    <div class="container" style="background-color:#f1f1f1">
        <a href="login.php" class="cancelbtn" style="text-decoration:none;color:#fff;">Cancel</a>
    </div>

    <button type="submit" name="change">Change Password</button>
  </div>
</form>

</body>
</html>
<?php
include("db.php");
if(isset($_POST['change']))
{
  $phone = $_POST['phone'];
  $upass = $_POST['password'];
  $email = $_POST['email'];

  //chechink whether the user is registered or not


  $user = mysqli_query($conn,"select * from signup where phone='$phone' and email='$email'");
  $usercount = mysqli_num_rows($user);
  if($usercount<1)
  {
    echo '<script>alert("Invalid Credentials");</script>';
  }
  else
  {
    $qry = mysqli_query($conn,"update signup set upass='$upass' where phone='$phone'");
    if($qry)
    {
      echo '<script>alert("Succesfully Updated!!!");location.href="logout.php";</script>'; 
    }
    else
    {
      echo '<script>alert("Something wrong!!!");</script>'; 
    }
  }
}

?>
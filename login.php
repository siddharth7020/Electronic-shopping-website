<?php

session_start();
error_reporting(0);
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

<h2>Login Form</h2>

<form action="" method="post">
  <div class="container">
    <label for="phone"><b>Phone</b></label>
    <input type="number" placeholder="Enter Phone Number" class="phone" name="phone" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
        
    <button type="submit" name="login">Login</button>
    <label>
      <input type="checkbox" name="admin"> Login as Admin
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <a href="index.php" class="cancelbtn" style="text-decoration:none;color:#fff;">Cancel</a>
    <a href="signup.php" class="cancelbtn" style="text-decoration:none;color:#fff;">Sign up</a>
    <span class="psw">Forgot <a href="forgetpassword.php">password?</a></span>
  </div>
</form>

</body>
</html>
<?php
include("db.php");
if(isset($_POST['login']))
{
  $phone = $_POST['phone'];
  $password = $_POST['password'];
  $admin = $_POST['admin'];

  if($admin=="")
  {
    //check whether the user is registered or not


    $user = mysqli_query($conn,"select * from signup where phone='$phone'");
    $usercount = mysqli_num_rows($user);
    if($usercount<1)
    {
      echo '<script>alert("User Not registered");location.href="signup.php";</script>';
    }
    else
    {
      $qry = mysqli_query($conn,"select * from signup where phone='$phone' and upass='$password'");
      $count = mysqli_num_rows($qry);
      if($count==1)
      {
        $_SESSION['phone'] = $phone;
        echo '<script>alert(" Login successfull");location.href="index.php";</script>';
      }
      else
      {
        echo '<script>alert("Invalid Login");</script>';
      }
    }
  }
  else
  {
    //chechink whether the user is registered or not
    $user = mysqli_query($conn,"select * from admincredentials where phone='$phone'");
    $usercount = mysqli_num_rows($user);
    if($usercount<1)
    {
      echo '<script>alert("User Not registered");location.href="signup.php";</script>';
    }
    else
    {
      $qry = mysqli_query($conn,"select * from admincredentials where phone='$phone' and password='$password'");
      $count = mysqli_num_rows($qry);
      if($count==1)
      {
        $countresult = mysqli_fetch_assoc($qry);
        $_SESSION['id'] = $countresult['id'];
         echo '<script>alert("logged in successfully");location.href="login.php";</script>';
      }
      else
      {
        echo '<script>alert("Invalid Login");</script>';
      }
    }
  }

}

?>
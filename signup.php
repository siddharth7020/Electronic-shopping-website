<?php
  session_start();
  error_reporting();
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<style>


</style>
<body>

<form action="" method="post" style="border:1px solid #ccc">
  <div class="container">
    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="fname"><b>First Name</b></label>
    <input type="text" id="fname" name="fname" placeholder="Your name.." required>

    <label for="lname"><b>Last Name</b></label>
    <input type="text" id="lname" name="lname" placeholder="Your last name.." required>

    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>

    <label for="phone"><b>Phone</b></label>
    <input type="number" max="9999999999" min="1111111111" placeholder="1234567890" class="phone" name="phone" required >
  

    <label for="state"><b>State</b></label>
    <select id="country" name="state" class="option" required>
      <option value="Maharashtra">Maharashtra</option>
      <option value="Uttar Pradesh">Uttar Pradesh</option>
      <option value="Dehli">Dehli</option>
      <option value="Manipur">Manipur</option>
      <option value="Punjab">Punjab</option>
      <option value="Madhya Pradesh">Madhya Pradesh</option>
    </select>
    
    <label for="zcode" class="zcode"><b>Zipcode</b></label>
    <input type="number" max="999999" min="111111" placeholder="123456" class="option" name="zcode" required>
    <br><br>
    
    
    <label for="address"><b>Address</b></label>
    <textarea id="subject" name="address" placeholder="Enter Address" style="height:200px" required></textarea>


    
    <label>
      <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
    </label>
    
    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

    <div class="clearfix">
      <a href="index.php" class="cancelbtn" style="text-decoration:none;color:#fff;bottom:10px;">Cancel</a>
    </div>
    <button type="submit" class="signupbtn" name="signup">Sign Up</button>
    <p style="text-align:center">Or</p>
    <a href="login.php" class="cancelbtn" name="signup" style="text-decoration:none;color:#fff;display:block;margin:auto;text-align:center;">Login</a>
  </div>
</form>

</body>
</html>

<?php

include("db.php");
if(isset($_POST['signup']))
{
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $pass = $_POST['password'];
  $state = $_POST['state'];
  $zcode = $_POST['zcode'];
  $add = $_POST['address'];
  $phone = $_POST['phone'];

  $userexistance = mysqli_query($conn,"select * from signup where phone='$phone'");
  if(mysqli_num_rows($userexistance)>=1)
  {
    echo '<script>alert("user already registered");</script>';
  }
  else
  {
    $qry = mysqli_query($conn,"INSERT INTO `signup`( `fname`, `lname`, `email`, `upass`, `state`, `zipcode`, `address`, `phone`) VALUES('$fname','$lname','$email','$pass','$state','$zcode','$add','$phone')");

    if($qry)
    {
      echo '<script>location.href="login.php";</script>';
    }
    else
    {
      echo '<script>alert("Error");</script>';
    }
  }



}


?>

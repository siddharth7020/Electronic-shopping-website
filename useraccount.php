<?php
session_start();
error_reporting();
if(!isset($_SESSION['phone']))
{
    header("location:login.php");
}
else
{
    include("db.php");
    $phone = $_SESSION['phone'];
    $qry = mysqli_query($conn,"select * from signup where phone='$phone'");
    $qryresult = mysqli_fetch_assoc($qry);
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>User Account</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css">
    <script src="main.js"></script>
</head>
<body>
<form action="updateuser.php" method="post">
<div class="container">
    <h1 style="text-align:center">My Account</h1>
    <hr>

    <label for="fname"><b>First Name</b></label>
    <input type="text" id="fname" name="fname" placeholder="Your name.." value="<?php echo $qryresult['fname'];?>" disabled>

    <label for="lname"><b>Last Name</b></label>
    <input type="text" id="lname" name="lname" placeholder="Your last name.." value="<?php echo $qryresult['lname'];?>" disabled>

    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="email" value="<?php echo $qryresult['email'];?>" disabled>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" value="<?php echo $qryresult['upass'];?>" disabled>

    <label for="phone"><b>Phone</b></label>
    <input type="number" max="9999999999" min="1111111111" placeholder="1234567890" class="phone" name="phone" value="<?php echo $qryresult['phone'];?>"  disabled >
  

    <label for="state"><b>State</b></label>
    <input type="text" id="country" name="state" class="option" value="<?php echo $qryresult['state'];?>" disabled>
    
    <label for="zcode"><b>Zipcode</b></label>
    <input type="text" max="999999" min="111111" placeholder="123456" class="option" name="zcode" value="<?php echo $qryresult['zipcode'];?>" disabled>
    <br><br>
    
    
    <label for="address"><b>Address</b></label>
    <textarea id="subject" name="address" placeholder="Enter Address" style="height:200px" disabled><?php echo $qryresult['address'];?></textarea>
    <div class="clearfix">
    <a href="index.php" class="cancelbtn" style="text-decoration:none;color:#fff;">Back</a>
      <button type="submit" class="signupbtn" name="signup">Update</button>
    </div>
  </div>
<form>
</body>
</html>
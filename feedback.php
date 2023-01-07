<?php
error_reporting(0);
include("header.php");
include("db.php");
?>
<html>
<body class="text-center">
<div class="container m-5">
<div class="row">
<div class="col-md-12 m-5">
<h3 class="text-center">please give us your valuable feedback</h3>
<form action="feedback.php" method="post">
<label for="name"><b> Name</b></label>
<input type="text" placeholder="Enter your name" class="form-control" name="name" required>
<div class="form-group">
<label>FeedBack</label>
<textarea name="feedback" rows="4" class="form-control" required=""></textarea>
<br><br>
<input type="submit" class="btn btn-success" name="add">
</div>
</form>
</div>
</div>
</div>
<?php
include "footer.html";
?>
</body>
</html>

<?php
include("db.php");
if(isset($_POST['add']))
{
    $feedback = $_POST['feedback'];
    $name = $_POST['name'];
     $qry = mysqli_query($conn,"insert into `feedback`(`name`, `feedback`) values('$name','$feedback')");
    if($qry)
    {
        echo '<script>alert("Done");</script>';

    }
    else
    {
       
        echo "error is".mysqli_error($conn);
    }
}

?>

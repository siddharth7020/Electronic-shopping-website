<?php
session_start();
include("db.php");
if(isset($_POST['submit']))
{
    $phone = $_SESSION['phone'];
    $qry = mysqli_query($conn,"select * from cart where phone='$phone'");
    $total = mysqli_query($conn,"select sum(qty*price) AS 'total' from cart where phone='$phone'");
    $totalresult = mysqli_fetch_assoc($total);
    $tnum = mysqli_num_rows($qry);
    $result = $totalresult['total'];

    //fetching card details of the user

    $qforcard = mysqli_query($conn,"select * from payment where phone='$phone'");
    $qforcardresult = mysqli_num_rows($qforcard);
    if($qforcardresult>=1)
    {
        $details = mysqli_fetch_assoc($qforcard);
        $card_no = $details['cardno'];
    }


}
else{
    header("location:index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    
    <script src="">
        <?php
        function money($money){
            $len = strlen($money);
            $m = '';
            $money = strrev($money);
            for($i=0;$i<$len;$i++){
                if(( $i==3 || ($i>3 && ($i-1)%2==0) )&& $i!=$len){
                    $m .=',';
                }
                $m .=$money[$i];
            }
            return strrev($m);
        }
        ?>
    </script>
    <script type="text/javascript">
    $(document).ready(function(){
        $("#codd").click(function(){
            $("#codb").removeAttr("disabled");
        });
    })
</script>

</head>
<body>
    <h2 class="text-white bg-info p-2 text-center">PAYMENT OPTION</h2>
    <div class="row no-gutters p-4">
        <div class="col-6">
            <div class="accordian" id="accordian">
                <div class="card">
                    <button class="btn btn-primary" data-toggle="collapse" data-target="#credit">Credit/Debit/ATM</button>
                </div>
                <div class="collapse show" id="credit"  data-parent="#accordian">
                    <div class="card-body">
                        <form method="post" action='final.php?pmethod=Through Card'>
                            <div class="row">
                                <input type="number" name="cardnumber" class="form-control form-group" placeholder="Enter Card Number" min="1000000000000000" max="9999999999999999" required value=<?php echo $card_no;?>>
                            </div>
                            <span class="row">
                                <label for="select" class="form-control col-md-6">Expiry Date
                                    <select name="month">
                                        <option>01</option>
                                        <option>02</option>
                                        <option>03</option>
                                        <option>04</option>
                                        <option>05</option>
                                        <option>06</option>
                                        <option>07</option>
                                        <option>08</option>
                                        <option>09</option>
                                        <option>10</option>
                                        <option>11</option>
                                        <option>12</option>
                                    </select>
                                    <select name="year">
                                        <option>18</option>
                                        <option>19</option>
                                        <option>20</option>
                                        <option>21</option>
                                        <option>22</option>
                                        <option>23</option>
                                        <option>24</option>
                                        <option>25</option>
                                        <option>26</option>
                                        <option>27</option>
                                        <option>28</option>
                                        <option>29</option>
                                        <option>30</option>
                                        <option>31</option>
                                        <option>32</option>
                                        <option>33</option>
                                        <option>34</option>
                                        <option>35</option>
                                        <option>36</option>
                                        <option>37</option>
                                        <option>38</option>
                                        <option>39</option>
                                        <option>40</option>
                                    </select>
                                </label>
                                <input type="number" name="cvv" class="form-control form-group col-md-6" placeholder="CVV" max="999" min="100" required>
                                <input type="submit" name="payment" value="Pay Rs.<?php echo $result;?>" class="btn btn-success col-6">
                            </span>
                            <div class="d-block">
                                <label class="form-group">Your card Details Would be Securely saved for faster payment.Your CVV will not be saved.</label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card">
                <button class="btn btn-primary nav-link" data-toggle="collapse" data-target="#cod">Cash On Delivery</button>
            </div>
            <div id="cod" class="collapse" data-parent="#accordian">
                <div class="card-body">
                    <form method="post" action="final.php?pmethod=Cash on Delivery">
                        <input type="radio" name="cod" id="codd" required><label for="codd">Cash on Delivery</label>
                        <input type="submit" id="codb" class="btn btn-success btn-block col-md-6 " disabled="disabled" value="Continue" name="payment">
                    </form>
                </div>
            </div>
        </div>

        <div class="col-4 mx-4">
            <h3 class="p-0 m-0">Price Details</h3>
            <hr>
            <p>Price(<?php echo $tnum; ?> item)<span  style="float:right">Rs. <?php echo " ".$result.".00"; ?></span></p>
            <p>Delivery Charges<span style="float:right">Free</span></p>
            <hr>
            <p>Amout Payable<span style="float:right">Rs. <?php echo " ".$result.".00"; ?></span></p>
        </div>
    </div>
</body>
</html>

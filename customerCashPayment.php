<?php
$conn=mysqli_connect('localhost:3340',
    'root',
    '',
    'projectreach');
session_start();
$username=$_SESSION['username'];
$requestId=$_SESSION['requestId'];
$updateQuery="UPDATE customerrequest SET paymentstatus=1 WHERE requestid='$requestId'";
mysqli_query($conn,$updateQuery);


$amountQuery="SELECT * FROM customerrequest WHERE paymentstatus=0 AND requestid='$requestId' ";
$amountQueryResult=mysqli_query($conn,$amountQuery);
$result=mysqli_fetch_assoc($amountQueryResult);
$amount=0;
if($result['distance']<100){
    $amount=20;
}
elseif ($result['distance']<300){
    $amount=30;
}
elseif($result['distance']<500){
    $amount=40;
}
elseif($result['distance']<750){
    $amount=60;
}
elseif($result['distance']<1000){
    $amount=75;
}
else{
    $amount=100;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="customerCashPayment.css">
    <title>cashPayment</title>


</head>
<header>
    <h1>PROJECT<span>REACH</span></h1>


    <nav>
        <ul class="navbar">
            <li><a class="navbuttons" href="customerHomePage.php">CustomerHome</a></li>
            <!--            <li><a class="navbuttons" href="navBar.php">Home</a></li>-->
            <li><a class="navbuttons" href="changePassword.php">ChangePassword</a></li>
            <li><a class="navbuttons" href="customerHelp.php">Help</a></li>

            <li><a class="navbuttons" href="sign-in.php">Sign-Out</a></li>
        </ul>
    </nav>
</header>
<div class="cashPayment">
    <?php
        echo "your total amount is:";
    echo $amount;
    echo "$";
        ?>
    <br>
    <p>Add your tip and make the payment to dispatcher.</p>
    <button name="movingToYourRequests"  type="submit" id="submit" class="form-control"><a href="yourRequests.php">Your Requests</a>
    </button>

</div>
</html>

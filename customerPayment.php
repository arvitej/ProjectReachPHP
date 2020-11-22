<?php
$errors=array();
$errors['address']='';
$errors['cardNumber']='';
$errors['cvv']='';
$errors['cardHolderName']='';

$conn=mysqli_connect('localhost:3340',
    'root',
    '',
    'projectreach');
session_start();
//$username=$_SESSION['username'];
$requestId=$_SESSION['requestId'];


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
if(isset($_POST['submitbutton'])){
    $cardNumber=$_POST['creditcardnumber'];
    $cvv=$_POST['cvvnumber'];
    $address=$_POST['address'];
    $name=$_POST['cardholdername'];
    if(empty($address)){
        $errors['address']="Billing Address is Required..";
    }
    if(empty($name)){
        $errors['cardHolderName']="Card Holder Name is Required..";
    }


    if(empty($cardNumber)){
        $errors['cardNumber']="CardNumber is Required..";
    }
    if(empty($cvv)){
        $errors['cvv']="CVV is Required..";
    }
    if(strlen($cvv)<3){
        $errors['cvv']="CVV should be minimum of 3 letters";
    }
    if(!is_numeric($cvv)){
        $errors['cvv']="CVV should contain only numbers.";
    }
    if(strlen($cardNumber)<19){
        $errors['cardNumber']="Card number should be minimum of 19 letters";
    }
    if(is_numeric($cardNumber)){
        $errors['cardNumber']="Card Number  contain only numbers.";
    }
    if($errors['cardNumber']==''&$errors['cvv']==''){
        $updateQuery="UPDATE customerrequest SET paymentstatus=1 WHERE requestid='$requestId'";
        mysqli_query($conn,$updateQuery);
        header('location:customerPaymentDone.php');
    }



}
?>
<!doctype html>
<html lang="en">
<head>
    <title>CardPayment</title>
    <link rel="stylesheet" type="text/css" href="customerPayment.css">
</head>

<header>
    <h1>PROJECT<span>REACH</span></h1>
    <nav>
        <ul class="navbar">
            <li><a class="navbuttons" href="customerHomePage.php">CustomerHome</a></li>
            <li><a class="navbuttons" href="navBar.php">LogOut</a></li>

        </ul>
    </nav>

</header>

<body>
<div class="amountDisplay" >
    <h3>Total Amount:</h3><?php
    echo $amount;
    ?>




</div>


<div class="entireform" id="signupform">
    <div>
        <!-- <h1 id="title">Project Reach</h1> -->
        <h2 id="description">Payment</h2>
    </div>

    <form id="survey-form" action="customerPayment.php" method="post">

        <div class="form-group">
            <label for="cardholdername" id="name-label" class="label">
                CardHolder Name:
            </label>
            <input type="text"
                   name="cardholdername"
                   id="name"

                   class="form-control"
                   placeholder="enter your FirstName"
                   required>
            <p>(should match the name on the card)</p>
            <div class="error-text">

                <?php   echo $errors['cardHolderName'];   ?>
            </div>



        </div>



        <div class="form-group">
            <label for="addressbox" id="address">Billing Address:</label>
            <textarea

                name="address"
                type="text-box"
                class="form-control"
                placeholder="Enter Your Billing Address"
                id="addressbox">
            </textarea>

            <div class="error-text">

                <?php   echo $errors['address'];   ?>
            </div>
        </div>

        <div class="form-group">
            <label for="ccn">Credit Card Number:</label>
            <input name="creditcardnumber" id="ccn" type="text" inputmode="numeric" pattern="[0-9\s]{13,19}" autocomplete="cc-number" minlength="19" maxlength="19" placeholder="xxxx xxxx xxxx xxxx">
            <p>Please enter only numbers</p>
            <div class="error-text">

                <?php   echo $errors['cardNumber'];   ?>
            </div>


        </div>
        <div class="form-group">
            <label for="cvv">CVV Number:</label>
            <input id="cvv" name="cvvnumber" type="text" inputmode="numeric"  autocomplete="cvv-number" minlength="3" maxlength="3" placeholder="xxx">

            <p>(3 digit number on the back of your card.)Please enter only numbers</p>
            <div class="error-text">

                <?php   echo $errors['cvv'];   ?>
            </div>

        </div>
        <div class="form-group">
            <label for="cardExpiryDate">Card Expiry Date:</label>

            <input type="date" id="start" name="cardExpiryDate"
                   value="2020-11-21"
                   >

        </div>
        <div class="form-group">
            <label for="tip" id="name-label" class="label">
                Tip you would like to add:
            </label>
            <input type="number"
                   name="tip"
                   id="name"

                   class="form-control"
                   placeholder="Tip you would like to add"
                   >




        </div>


        <div class="form-group">
            <button name="submitbutton"  type="submit" id="submit" class="form-control">Make-Payment
            </button>


        </div>


    </form>
</div>

</body>








</html>

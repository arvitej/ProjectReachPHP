<?php
$conn=mysqli_connect('localhost:3340',
    'root',
    '',
    'projectreach');
session_start();
$username=$_SESSION['username'];
$requestIdFromRequestForm=$_SESSION['requestId'];

$errorSameUser='';
$error='';

if(isset($_POST['requestButton'])){

    //$requestId=$_POST['requestIdInput'];
    //session_start();
    //$_SESSION['requestId']=$requestId;
    $paymentMethod=$_POST['paymentMethod'];
//    $sameUserCheck="SELECT username FROM customerrequest WHERE requestid='$requestId'";
//    $sameUserCheckResult=mysqli_query($conn,$sameUserCheck);
//    $row=mysqli_fetch_assoc($sameUserCheckResult);
//    if($row['username']!=$username){
//        $errorSameUser="you can only choose orders made by you.";
//    }
//    $errorCheck="SELECT * FROM customerrequest WHERE confirmationstatus=0 AND requestid='$requestId'";
//    $errorCheckResult=mysqli_query($conn,$errorCheck);
//    //$errorCheckResultRow=mysqli_fetch_assoc($errorCheckResult);
//    if(mysqli_num_rows($errorCheckResult)==0){
//        $error="Please choose only the requestid which is seen in above table..";
//    }
    if($error==''&&$errorSameUser=='' ){
        //echo "in no error if";
//        $insertQuery="INSERT INTO acceptedrequests(customerUserName,requestid,pickupaddress,pickupcity,dropcity,destinationaddress,customerphonenumber) SELECT username,requestid,pickupaddress,pickupcity,dropcity,destinationaddress,phonenumber FROM customerrequest WHERE requestid='$requestId' ";
//        mysqli_query($conn,$insertQuery);
        $updateStatus="UPDATE customerrequest SET confirmationstatus=1 where requestid='$requestIdFromRequestForm'";
        mysqli_query($conn,$updateStatus);
        if($paymentMethod=="card"){
            header('location:customerPayment.php');
        }
        else if($paymentMethod=="cash"){
            $updatePaymentStatus="UPDATE customerrequest SET paymentstatus=1 where requestid='$requestIdFromRequestForm'";
            mysqli_query($conn,$updatePaymentStatus);

            header('location:customerCashPayment.php');
        }


//        $updateQuery="UPDATE acceptedrequests SET dispatcherUserName='$dispatcherUserName' where requestid='$requestId'";
//        //echo "before update query";
//        mysqli_query($conn,$updateQuery);
        //echo "after update query";
        //header('location:dispatcherHomePage.php');
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="yourRequests.css">
    <title>RequestConfirmation</title>


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
<body>
<div class="entireTable">
    <table>
        <tr>
            <th>RequestId</th>
            <th>PickUpAddress</th>
            <th>DestinationAddress</th>
            <th>TypeofItem</th>
            <th>status</th>
        </tr>

        <?php

        $sql="SELECT * FROM customerrequest WHERE requestid='$requestIdFromRequestForm' AND confirmationstatus=0";
        $result=mysqli_query($conn,$sql);
        //$result_check=mysqli_num_rows($result);
        //if ($result_check>0){
        while ($row=mysqli_fetch_assoc($result)){
            echo "<tr><td>".$row["requestid"]."</td><td>".$row["pickupaddress"]."</td><td>".$row["destinationaddress"]."</td><td>".$row["typeofitem"]."</td><td>".$row["status"]."</td></tr>";



        }
        ?>
    </table>
    <form action="customerRequestConfirmationPage.php" method="post">
        <div class="inputRequestId">

            <label for="PaymentMethod" class="inputDiv">Enter the payment method?</label>
            <div>
                <select class="inputDiv" name="paymentMethod" id="statusChange" placeholder="select the payment method">
                    <option value="cash" name="cash">cash</option>
                    <option value="card" name="card">credit/debit</option>
                </select>

            </div>

            <div>
                <button name="requestButton" type="submit" id="submit" class="inputDiv">Confirm your request
                </button>
            </div>



        </div>




    </form>

</div>



</body>
</html>


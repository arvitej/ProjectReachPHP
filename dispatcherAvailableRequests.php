<?php
$conn=mysqli_connect('localhost:3340',
    'root',
    '',
    'projectreach');
session_start();
$dispatcherUserName=$_SESSION['username'];
$error='';
$errorSameUser='';
$setStatus="Assigned to Dispatcher";

if(isset($_POST['requestButton'])){

    $requestId=$_POST['requestIdInput'];
    $sameUserCheck="SELECT username FROM customerrequest WHERE requestid='$requestId'";
    $sameUserCheckResult=mysqli_query($conn,$sameUserCheck);
    $row=mysqli_fetch_assoc($sameUserCheckResult);
    if($row['username']==$dispatcherUserName){
        $errorSameUser="you cannot choose the order made by you to deliver.";
    }
    $errorCheck="SELECT * FROM customerrequest WHERE status='looking for dispatcher' AND requestid='$requestId'";
    $errorCheckResult=mysqli_query($conn,$errorCheck);
    //$errorCheckResultRow=mysqli_fetch_assoc($errorCheckResult);
    if(mysqli_num_rows($errorCheckResult)==0){
        $error="Please choose only the requestid which is seen in above table..";
    }
    if($error==''&&$errorSameUser=='' ){
        //echo "in no error if";
        $insertQuery="INSERT INTO acceptedrequests(customerUserName,requestid,pickupaddress,pickupcity,dropcity,destinationaddress,customerphonenumber) SELECT username,requestid,pickupaddress,pickupcity,dropcity,destinationaddress,phonenumber FROM customerrequest WHERE requestid='$requestId' ";
        mysqli_query($conn,$insertQuery);
        $updateStatus="UPDATE customerrequest SET status='$setStatus' where requestid='$requestId'";
        mysqli_query($conn,$updateStatus);
        
        $updateQuery="UPDATE acceptedrequests SET dispatcherUserName='$dispatcherUserName' where requestid='$requestId'";
        //echo "before update query";
        mysqli_query($conn,$updateQuery);
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
    <link rel="stylesheet" type="text/css" href="availableRequests.css">
    <title>AvailableRequests</title>


</head>
<header>
    <h1>PROJECT<span>REACH</span></h1>


    <nav>
        <ul class="navbar">
            <li><a class="navbuttons" href="dispatcherHomePage.php">Dispatcher Home</a></li>
            <li><a class="navbuttons" href="navBar.php">Home</a></li>
            <li><a class="navbuttons" href="changePassword.php">ChangePassword</a></li>
            <li><a class="navbuttons" href="dispatcherHelp.php">Help</a></li>
            <li><a class="navbuttons" href="navBar.php#aboutProjectReach">About</a></li>
            <li><a class="navbuttons" href="sign-in.php">Sign-Out</a></li>
        </ul>
    </nav>
</header>
<body>
<div class="entireDiv">
    <table>
        <tr>
            <th>RequestId</th>
            <th>PickUpAddress</th>
            <th>DestinationAddress</th>
            <th>TypeofItem</th>
            <th>status</th>
            <th>CustomerContact</th>
        </tr>

        <?php

        $sql="SELECT * FROM customerrequest WHERE status='looking for dispatcher'";
        $result=mysqli_query($conn,$sql);
        //$result_check=mysqli_num_rows($result);
        //if ($result_check>0){
        while ($row=mysqli_fetch_assoc($result)){
            echo "<tr><td>".$row["requestid"]."</td><td>".$row["pickupaddress"]."</td><td>".$row["destinationaddress"]."</td><td>".$row["typeofitem"]."</td><td>".$row["status"]."</td><td>".$row['phonenumber']."</td></tr>";



        }
        ?>
    </table>
    <form action="dispatcherAvailableRequests.php" method="post">
        <div class="inputRequestId">
            <label for="requestIdInput" class="inputDiv">Enter the RequestId of item which you would like to deliver?</label>
            <input
                type="number"
                id="requestIdInput"
                name="requestIdInput"
                class="inputDiv"

            >
            <div class="error-text">
                <?php  echo $error;
                        echo $errorSameUser;
                ?>
            </div>
            <button name="requestButton" type="submit" id="submit" class="inputDiv">Choose this RequestId
            </button>


        </div>

    </form>



</div>



</body>
</html>


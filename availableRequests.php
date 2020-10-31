<?php
$conn=mysqli_connect('localhost:3340',
    'root',
    '',
    'projectreach');
session_start();
$username=$_SESSION['username'];
$error='';
$setStatus="Assigned to Dispatcher";

if(isset($_POST['requestButton'])){

    $requestId=$_POST['requestIdInput'];
    $errorCheck="SELECT * FROM customerRequest WHERE status='looking for dispatcher' AND requestid='$requestId'";
    $errorCheckResult=mysqli_query($conn,$errorCheck);
    //$errorCheckResultRow=mysqli_fetch_assoc($errorCheckResult);
    if(mysqli_num_rows($errorCheckResult)==0){
        $error="Please choose only the requestid which is seen in above table..";
    }
    if($error==''){
        //echo "in no error if";
        $insertQuery="INSERT INTO acceptedrequests(requestid,pickupaddress,pickupcity,dropcity,destinationaddress) SELECT requestid,pickupaddress,pickupcity,dropcity,destinationaddress FROM customerrequest WHERE requestid='$requestId' ";
        mysqli_query($conn,$insertQuery);
        $updateStatus="UPDATE customerrequest SET status='$setStatus' where requestid='$requestId'";
        mysqli_query($conn,$updateStatus);
        
        $updateQuery="UPDATE acceptedrequests SET dispatcherUserName='$username' where requestid='$requestId'";
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
    <title>yourRequests</title>


</head>
<header>
    <h1>PROJECT<span>REACH</span></h1>


    <nav>
        <ul class="navbar">
            <li><a class="navbuttons" href="dispatcherHomePage.php">Dispatcher Home</a></li>
            <li><a class="navbuttons" href="navBar.php">Home</a></li>
            <li><a class="navbuttons" href="#">ChangePassword</a></li>
            <li><a class="navbuttons" href="#">Help</a></li>
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
        </tr>

        <?php

        $sql="SELECT * FROM customerrequest WHERE status='looking for dispatcher'";
        $result=mysqli_query($conn,$sql);
        //$result_check=mysqli_num_rows($result);
        //if ($result_check>0){
        while ($row=mysqli_fetch_assoc($result)){
            echo "<tr><td>".$row["requestid"]."</td><td>".$row["pickupaddress"]."</td><td>".$row["destinationaddress"]."</td><td>".$row["typeofitem"]."</td><td>".$row["status"]."</td></tr>";



        }
        ?>
    </table>
    <form action="availableRequests.php" method="post">
        <div class="inputRequestId">
            <label for="requestIdInput" class="inputDiv">Enter the RequestId of item which you would like to deliver?</label>
            <input
                type="number"
                id="requestIdInput"
                name="requestIdInput"
                class="inputDiv"

            >
            <div class="error-text">
                <?php  echo $error; ?>
            </div>
            <button name="requestButton" type="submit" id="submit" class="inputDiv">Choose this RequestId
            </button>


        </div>

    </form>



</div>



</body>
</html>


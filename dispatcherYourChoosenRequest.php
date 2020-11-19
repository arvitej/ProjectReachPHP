<?php
$conn=mysqli_connect('localhost:3340',
    'root',
    '',
    'projectreach');
$error='';
$errorWrongRequestId='';
session_start();
$dispatcherUserName=$_SESSION['username'];
$checkingForAcceptedRequest="SELECT * FROM acceptedrequests WHERE dispatcherUserName='$dispatcherUserName'";
$result=mysqli_query($conn,$checkingForAcceptedRequest);
$result1=mysqli_fetch_assoc($result);
$num_rows=mysqli_num_rows($result);
if($num_rows>0){
    if(isset($_POST['requestButton'])){
        $changeStatus=$_POST['status'];
        $inputId=$_POST['requestIdInput'];
        $validInputIdQuery="SELECT requestid FROM acceptedrequests WHERE dispatcherUserName='$dispatcherUserName' AND requestId='$inputId' ";
        $validInputIdQueryResult=mysqli_query($conn,$validInputIdQuery);
        $validInputIdQueryResultRows=mysqli_fetch_assoc($validInputIdQueryResult);
        if(mysqli_num_rows($validInputIdQueryResult)==0){
            $errorWrongRequestId="you cannot change status of request which is not choosen by you..";
        }
        if($errorWrongRequestId==''){
            $customerRequestTableQuery="UPDATE customerrequest SET status='$changeStatus' WHERE requestId='$inputId'";
            mysqli_query($conn,$customerRequestTableQuery);
            $acceptedRequestsTableQuery="UPDATE acceptedrequests SET status='$changeStatus' WHERE requestId='$inputId'";
            mysqli_query($conn,$acceptedRequestsTableQuery);

        }


    }

}
else{
    $error="You don't have any accepted requests..";
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="yourChoosenRequest.css">
    <title>yourChoosenRequests</title>


</head>
<header>
    <h1>PROJECT<span>REACH</span></h1>


    <nav>
        <ul class="navbar">
            <li><a class="navbuttons" href="dispatcherHomePage.php">DispatcherHome</a></li>
            <li><a class="navbuttons" href="navBar.php">Home</a></li>
            <li><a class="navbuttons" href="changePassword.php">ChangePassword</a></li>
            <li><a class="navbuttons" href="dispatcherHelp.php">Help</a></li>
            <li><a class="navbuttons" href="navBar.php#aboutProjectReach">About</a></li>
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

            <th>status</th>
            <th>customerContact</th>
        </tr>


        <?php

        if($error==''){
            $sql="SELECT * FROM acceptedrequests WHERE dispatcherUserName='$dispatcherUserName'";
            $result=mysqli_query($conn,$sql);
            //$result_check=mysqli_num_rows($result);
            //if ($result_check>0){
            while ($row=mysqli_fetch_assoc($result)){
                echo "<tr><td>".$row["requestid"]."</td><td>".$row["pickupaddress"]."</td><td>".$row["destinationaddress"]."</td><td>".$row["status"]."</td><td>".$row["customerphonenumber"]."</td></tr>";



            }
        }
        else{
            echo $error;
        }


        ?>
    </table>

</div>

<form action="dispatcherYourChoosenRequest.php" method="post">
    <div class="inputRequestId">
        <label for="requestIdInput" class="inputDiv">Enter the RequestId of item which you would like to change the status?</label>
        <input
            type="number"
            id="requestIdInput"
            name="requestIdInput"
            class="inputDiv"

        >
        <select class="inputDiv" name="status" id="statusChange" placeholder="select the status">
            <option value="picked-up">picked-up</option>
            <option value="delivered">delivered</option>
        </select>
            <div class="error-text">
               <?php  echo $error;
                        echo $errorWrongRequestId;
               ?>
            </div>
        <button name="requestButton" type="submit" id="submit" class="inputDiv">Change the Status of this RequestId
        </button>


    </div>

</form>



</body>
</html>

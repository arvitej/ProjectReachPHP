<?php
$conn=mysqli_connect('localhost:3340',
    'root',
    '',
    'projectreach');
session_start();
$username=$_SESSION['username'];

$delivered="delivered";
$error='';

if(isset($_POST['feedBackButton'])){
    $requestId=$_POST['requestIdInput'];
    $rating=$_POST['ratingNumber'];
    $comments=$_POST['textArea'];
    $errorCheckQuery="SELECT customerUserName FROM acceptedrequests WHERE requestid='$requestId' and status='$delivered' ";
    $errorResult=mysqli_query($conn,$errorCheckQuery);
    $row=mysqli_fetch_assoc($errorResult);

    if($row['customerUserName']==$username){
        $dispatcherUserNameQuery="SELECT dispatcherUserName FROM acceptedrequests WHERE requestid='$requestId'";
        $dispatcherUserNameQueryResult=mysqli_query($conn,$dispatcherUserNameQuery);
        $row1=mysqli_fetch_assoc($dispatcherUserNameQueryResult);
        $dispatcherUserName=$row1['dispatcherUserName'];
        $insertQuery="INSERT INTO feedback(requestId,rating,comments,customerUserName,dispatcherUserName) VALUES('$requestId','$rating','$comments','$username','$dispatcherUserName')";
        mysqli_query($conn,$insertQuery);

    }
    else{
        $error="Please select the requestId from the above shown table";





    }


    // change entire dispatcher variable to customervariables
//    $dispatcherUserNameQuery="SELECT dispatcherUserName FROM acceptedrequests WHERE requestid='$requestId'";
//    $dispatcherUserNameQueryResult=mysqli_query($conn,$dispatcherUserNameQuery);
//    $dispatcherUserName=mysqli_fetch_assoc($dispatcherUserNameQueryResult);
    //if there row(customerUserName)!=username user not selected the requestId from above table
//    if($row!=$username){
//        $error="Please select the requestId from the above shown table";
//        echo "in error";
//        echo $row['c'];
//    }
    //inserting data into feedback table
//    if($error==''){
//        $insertQuery="INSERT INTO feedback(requestId,rating,comments,customerUserName,dispatcherUserName) VALUES('$requestId','$rating','$comments','$username','$dispatcherUserName')";
//        mysqli_query($conn,$insertQuery);
//    }



}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="customerGiveFeedback.css">
    <title>giveFeedBack</title>


</head>
<header>
    <h1>PROJECT<span>REACH</span></h1>


    <nav>
        <ul class="navbar">
            <li><a class="navbuttons" href="customerHomePage.php">CustomerHome</a></li>
            <!--            <li><a class="navbuttons" href="navBar.php">Home</a></li>-->
            <li><a class="navbuttons" href="changePassword.php">ChangePassword</a></li>
            <li><a class="navbuttons" href="customerHelp.php">Help</a></li>
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
            <th>DispatcherUserName</th>
            <th>status</th>
        </tr>

        <?php

        $sql="SELECT * FROM acceptedrequests WHERE status='$delivered' AND customerUserName='$username'";
        $result=mysqli_query($conn,$sql);
        //$result_check=mysqli_num_rows($result);
        //if ($result_check>0){

        while ($row=mysqli_fetch_assoc($result)){

            echo "<tr><td>".$row["requestid"]."</td><td>".$row["pickupaddress"]."</td><td>".$row["destinationaddress"]."</td><td>".$row["dispatcherUserName"]."</td><td>".$row["status"]."</td></tr>";



        }
        ?>
    </table>

    <form action="customerGiveFeedback.php" method="post">
        <div class="inputRequestId">
            <div>
                <label for="requestIdInput" class="inputDiv">Enter the RequestId of item, to which you would like to give feedback?</label>

                <input
                        type="number"
                        id="requestIdInput"
                        name="requestIdInput"
                        class="inputDiv"

                >
                <div class="error-text">
                    <?php  echo $error;

                            ?>
                </div>

            </div>
            <div>
                <label for="selectForRating"  class="inputDiv">Rating:</label>
            </div>

<!--            <select id="rating" name="ratingNum  class="inputDiv" >-->
<!--                <option value="one" >1</option>-->
<!--                <option value="two">2</option>-->
<!--                <option value="three">3</option>-->
<!--                <option value="four">4</option>-->
<!--                <option value="five">5</option>-->
<!--            </select>-->
            <select id="selectForRating" class="inputDiv" name="ratingNumber" >

                <option disabled="disabled">choose rating from 1 to 5</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <div>
                <label for="feedBackTextArea" class="inputDiv">Any Comments:</label>
            </div>
            <div>

                <textarea name="textArea" class="inputDiv" id="feedBackTextArea">
                </textarea>

            </div>




<!--            <div class="error-text">-->
<!--                --><?php // echo $error;
//                echo $errorSameUser;
//                        ?>
<!--            </div>-->
            <button name="feedBackButton" type="submit" id="submit" class="">Give FeedBack
            </button>


        </div>

    </form>

</div>



</body>
</html>

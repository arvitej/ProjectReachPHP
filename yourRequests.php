<?php
$conn=mysqli_connect('localhost:3340',
    'root',
    '',
    'projectreach');
session_start();
$username=$_SESSION['username'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="yourRequests.css">
    <title>yourRequests</title>


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
            <th>TypeofItem</th>
            <th>status</th>
        </tr>

        <?php

        $sql="SELECT * FROM customerrequest WHERE username='$username'";
        $result=mysqli_query($conn,$sql);
        //$result_check=mysqli_num_rows($result);
        //if ($result_check>0){
        while ($row=mysqli_fetch_assoc($result)){
            echo "<tr><td>".$row["requestid"]."</td><td>".$row["pickupaddress"]."</td><td>".$row["destinationaddress"]."</td><td>".$row["typeofitem"]."</td><td>".$row["status"]."</td></tr>";



        }
        ?>
    </table>

</div>



</body>
</html>

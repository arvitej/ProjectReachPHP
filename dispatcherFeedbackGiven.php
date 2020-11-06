<?php
$conn=mysqli_connect('localhost:3340',
    'root',
    '',
    'projectreach');
$error='';
session_start();
$dispatcherUserName=$_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="yourChoosenRequest.css">
    <title>feedBackGiven</title>


</head>
<header>
    <h1>PROJECT<span>REACH</span></h1>


    <nav>
        <ul class="navbar">
            <li><a class="navbuttons" href="dispatcherHomePage.php">DispatcherHome</a></li>
            <li><a class="navbuttons" href="navBar.php">Home</a></li>
            <li><a class="navbuttons" href="#">ChangePassword</a></li>
            <li><a class="navbuttons" href="#">Help</a></li>
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


            <th>Rating</th>
            <th>Comments</th>
            <th>Status</th>
        </tr>


        <?php

        if($error==''){
            $sql="SELECT * FROM feedback WHERE dispatcherUserName='$dispatcherUserName'";
            $result=mysqli_query($conn,$sql);
            //$result_check=mysqli_num_rows($result);
            //if ($result_check>0){
            while ($row=mysqli_fetch_assoc($result)){
                echo "<tr><td>".$row["requestId"]."</td><td>".$row["rating"]."</td><td>".$row["comments"]."</td><td>".$row["status"]."</td></tr>";



            }
        }
        else{
            echo $error;
        }


        ?>
    </table>

</div>

</body>

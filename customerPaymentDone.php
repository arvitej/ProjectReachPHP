

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="#">
    <title>cashPayment</title>
    <style>
        body{
            background-color: lightblue;
        }
        .thankYouNote{
            background-color: white;
            border-radius: 3px ;
            text-align: center;
            padding:10px;
            margin:auto;
            width:50%;

            box-shadow: 5px 10px 18px #888888;
            margin-top: 150px;


        }
        header{
            width:100%;
            height:70px;
            background-color:black;
        }
        h1{
            position: absolute;
            padding:3px;
            float:left;
            margin-top:10px;
            margin-left:2%;
            color:#39ca74;
        }
        span{
            color:#ffffff;
        }
        ul{
            width:auto;
            float:right;
            margin-top:8px;
        }
        li{
            display:inline-block;
            padding:15px 30px;
        }

        a{
            text-align:center;
            color:#ffffff;
            font-size:16px;
        }
        a:hover{
            color:#F0c330;
            transition: 15ms;;
        }
        .yourrequests{
            background-color:green;
            border-radius:25px;
            cursor:pointer;
            margin-left:325px;
            margin-top: 10px;
            width:50%;
        }
    </style>


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
<?php
echo '

    <div class="thankYouNote">
        <h3>Your payment is successfully accepted ,Please click on  "your request" button to check status of your requests.</h3>
    
        
    </div>
    

';
?>

    <button name="movingToYourRequests"  type="submit" id="submit" class="yourrequests"><a href="yourRequests.php">Your Requests</a>
    </button>

</div>
</html>

<?php
$error=array();
$error['password']='';
$error['otp']='';
if(isset($_POST['passwordresetbutton'])) {


    $dbservername="localhost:3340";
    $dbUsername="root";
    $dbPassword="";
    $dbName="projectreach";
//        include ('config.php');
    $conn=mysqli_connect('localhost:3340',
        'root',
        '',
        'projectreach');
    $newpassword=$confirmnewpassword='';
    session_start();
    $regEmail=$_SESSION['regEmail'];


    $newpassword=$_POST['newPassword'];

    $confirmnewpassword=$_POST['confirmnewpassword'];
    $otp=$_POST['otp'];
    if($newpassword!=$confirmnewpassword){
        $error['password']= "password and confirm password should be same";

    }
    $otpQuery="SELECT otp FROM forgotpassword WHERE  email='" . mysqli_escape_string($conn,$regEmail) . "' ";
    $otpQueryResult=mysqli_query($conn,$otpQuery);
    $row=mysqli_fetch_assoc($otpQueryResult);


    if($row['otp']!=$otp){
        $error['otp']="You have entered the wrong otp";
    }
    if($error['otp']==''&$error['password']==''){
        $query="UPDATE signup SET password='$newpassword' WHERE email='$regEmail'";
        $queryResult=mysqli_query($conn,$query);
        //if(mysqli_fetch_assoc($queryResult))
        header('location:sign-in.php');
    }
    /*    if($error==''){
            $query="UPDATE signup SET password='$newpassword' WHERE username='$username'";
            mysqli_query($conn,$query);
            header('location:sign-in.php');
        }
        else{
            echo 'print error';

        }*/

}



?>
<!doctype html>
<html lang="en">
<head>
    <title>forgotChangePassword</title>

    <link rel="stylesheet" type="text/css" href="changePassword.css">
    <nav>
        <ul class="navbar">
            <li><a class="navbuttons" href="navBar.php">Home</a></li>

            <li><a class="navbuttons" href="navBar.php#aboutProjectReach">About</a></li>
        </ul>
    </nav>
</head>

<header>
    <h1>PROJECT<span>REACH</span></h1>


</header>

<form id="changePassword-form" action="forgotChangePassword.php" method="post" class="entireform">
    <div class="form-group">
        <label for="newPassword" id="newPassword-label" class="label">
            New Password:
        </label>
        <input type="password"
               name="newPassword"
               id="newPassword"

               class="form-control"
               placeholder="enter the new password"
               required>



    </div>




    <div class="form-group">
        <label for="confirmnewpassword" id="confirmnewpassword-label" class="label">Confirm New Password:</label>
        <input
            type="password"
            id="confirmnewpassword"
            name="confirmnewpassword"
            class="form-control"
            placeholder="Confirm the new Password"
            required
        >
        <div class="error-text">

            <?php echo $error['password'];?>
        </div>



    </div>
    <div class="form-group">
        <label for="otp" id="otp-label" class="label">
            OTP sent to your email:
        </label>
        <input type="text"
               name="otp"
               id="otp"

               class="form-control"
               placeholder="enter OTP.."
               required>
        <div class="error-text">

            <?php echo $error['otp'];?>
        </div>



    </div>






    <div class="form-group">
        <button name="passwordresetbutton"  type="submit" id="submit" class="form-control">password-reset
        </button>


    </div>


</form>
</html>


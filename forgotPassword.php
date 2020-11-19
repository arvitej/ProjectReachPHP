
<?php
$error='';

if(isset($_POST['submitbutton'])) {



    $fromEmail="ravitejasankuratri@gmail.com";

    $conn=mysqli_connect('localhost:3340',
        'root',
        '',
        'projectreach');
   /* $dbServername="localhost:3340";
    $dbUsername="root";
    $dbPassword="";
    $dbName="projectreach";
//        include ('config.php');
    $conn=mysqli_connect('localhost:3340',
        'root',
        '',
        'projectreach');*/
    $regEmail=$_POST['email'];
    session_start();
    $_SESSION['regEmail']=$regEmail;

    $emailCheckQuery="SELECT * FROM signup WHERE (email='$regEmail') LIMIT 1";
    $result=mysqli_query($conn,$emailCheckQuery);
    if(mysqli_fetch_assoc($result)){
        $otp=rand(100000,999999);
        $to=$regEmail;
        $from=$fromEmail;
        $bounce=$fromEmail;
        $subject="OTP to change your password";
        $body="your otp is :$otp";
        //echo $body;
        //$message = "Line 1\r\nLine 2\r\nLine 3";

// In case any of our lines are larger than 70 characters, we should use wordwrap()
        //$message = wordwrap($message, 70, "\r\n");
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// Send
        mail($to,$subject, $body);
        $checkEmailInForgotPassword="SELECT * FROM forgotpassword WHERE email='$regEmail' LIMIT 1";
        $checkEmailInForgotPasswordResult=mysqli_query($conn,$checkEmailInForgotPassword);
        if(mysqli_fetch_assoc($checkEmailInForgotPasswordResult)){
            $updateQuery="UPDATE forgotpassword SET otp='$otp'";
            mysqli_query($conn,$updateQuery);


        }
        else{
            $insertQuery="INSERT INTO forgotpassword(email,otp) VALUES('$regEmail','$otp')";
            mysqli_query($conn,$insertQuery);
        }

        header('location:forgotChangePassword.php');




    }
    else{
        $error="Given email is not registered with ProjectReach";

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
    <title>changePassword</title>

    <link rel="stylesheet" type="text/css" href="changePassword.css">
</head>

<header>
    <h1>PROJECT<span>REACH</span></h1>


</header>

<form id="changePassword-form" action="forgotPassword.php" method="post" class="entireform">
    <div class="form-group">
        <label for="newPassword" id="newPassword-label" class="label">Enter Registered Email:
        </label>
        <input type="text"
               name="email"
               id="email"

               class="form-control"
               placeholder="Enter email with which you signedup.."
               required>
        <div class="error-text">
            <?php  echo $error;  ?>
        </div>



    </div>




<!--    <div class="form-group">
        <label for="confirmnewpassword" id="confirmnewpassword-label" class="label">Confirm New Password:</label>
        <input
            type="password"
            id="confirmnewpassword"
            name="confirmnewpassword"
            class="form-control"
            placeholder="Confirm the new Password"
            required
        >



    </div>

    <div class="form-group">
        <label for="code" id="emailcode-label" class="label">
            Enter Code Sent to Email:
        </label>
        <input type="text"
               name="code"
               id="code"

               class="form-control"
               placeholder="enter the code sent to your email."
               required>



    </div>-->






    <div class="form-group">
        <button name="submitbutton"  type="submit" id="submit" class="form-control">submit
        </button>


    </div>


</form>
</html>

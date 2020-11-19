<?php
$error='';
if(isset($_POST['passwordresetbutton'])) {



    $dbServername="localhost:3340";
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

    $username=$_SESSION['username'];

    $newpassword=$_POST['newPassword'];

    $confirmnewpassword=$_POST['confirmnewpassword'];
    if($newpassword!=$confirmnewpassword){
        $error= "password and confirm password should be same";

    }
    if($error==''){
        $query="UPDATE signup SET password='$newpassword' WHERE username='$username'";
        mysqli_query($conn,$query);
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
    <title>changePassword</title>

    <link rel="stylesheet" type="text/css" href="changePassword.css">
</head>

<header>
    <h1>PROJECT<span>REACH</span></h1>


</header>

<form id="changePassword-form" action="changePassword.php" method="post" class="entireform">
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

            <?php echo $error; ?>
        </div>



    </div>






    <div class="form-group">
        <button name="passwordresetbutton"  type="submit" id="submit" class="form-control">password-reset
        </button>


    </div>


</form>
</html>

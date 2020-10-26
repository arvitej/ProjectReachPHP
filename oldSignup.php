

<?php


if(isset($_POST['username'])){
    $dbServername="localhost";
    $dbUsername="root";
    $dbPassword="";
    $dbName="projectreach";
    $errors=array('username'=>'','email'=>'','password'=>'','confirmpassword'=>'','address'=>'');
    $user_check_query='';

    $conn=mysqli_connect('localhost:3340',
        'root',
        '',
        'projectreach');
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $confirmpassword=$_POST['confirmpassword'];
    $address=$_POST['address'];

    //form validation
    if(empty($username)){
        $errors['username']="username is required";
    }

    if(empty($email)){
        $errors['email']="email is required";
    }

    if(empty($password)){
        array_push($errors,"password is required");
    }

    if(empty($confirmpassword)){
        array_push($errors,"username is required");
    }

    if(empty($address)){
        array_push($errors,"username is required");
    }

    if($password!=$confirmpassword){
        array_push($errors,"password is not matched");
    }


    //check db for existing usernames and emails

    $user_check_query="SELECT * FROM signup WHERE username=$username OR email=$email LIMIT 1";

    $results=mysqli_query($conn,$user_check_query);
    $user=mysqli_fetch_assoc($results);

    if($user){
        if($user['username'==$username]){
            array_push($errors,"This username already exits");
        }

        if($user['email'==$email]){
            array_push($errors,"This email already exits");
        }
    }

    if(count($errors)==0){
        echo 'vv';
        $password=md5($password);
        $query="INSERT INTO signup(username,email,password,confirmpassword,address) VALUES('$username','$email','$password','$confirmpassword','$address')";
        mysqli_query($conn,$query);
        $_SESSION['username']=$username;
        $_SESSION['success']="you are now successfully logged in";
        //header('location:sign-in.php');
        echo 'd';
    }
    elseif (count($errors) > 0) {
        foreach ($errors as $error) {
            echo '$error';
        }
    }

}

?>






<!doctype html>
<html lang="en">
<head>
    <title>sign-up</title>
    <link rel="stylesheet" type="text/css" href="projectReachSignUpCSS.css">
</head>

<header>
    <h1>PROJECT<span>REACH</span></h1>
    <nav>
        <ul class="navbar">
            <li><a class="navbuttons" href="navBar.php">Home</a></li>
            <li><a class="navbuttons" href="signup.php">Sign-Up</a></li>
            <li><a class="navbuttons" href="sign-in.php">Sign-In</a></li>
            <li><a class="navbuttons" href="navBar.php#aboutProjectReach">About</a></li>
        </ul>
    </nav>

</header>

<body>


<div class="entireform" id="signupform">
    <div>
        <!-- <h1 id="title">Project Reach</h1> -->
        <h2 id="description">Sign-up form</h2>
    </div>
    <form id="survey-form" action="signup.php" method="post">
        <div class="form-group">
            <label for="name" id="name-label" class="label">
                Username:
            </label>
            <input type="text"
                   name="username"
                   id="name"

                   class="form-control"
                   placeholder="enter your name"
                   required>

        </div>




        <div class="form-group">
            <label for="email" id="email-label" class="label">Email:</label>
            <input
                type="text"
                id="email"
                name="email"
                class="form-control"
                placeholder="Enter you Email"
                required
            >

        </div>

        <div class="form-group">
            <label for="name" id="name-label" class="label">
                Password:
            </label>
            <input type="text"
                   name="password"
                   id="name"

                   class="form-control"
                   placeholder="enter your password"
                   required>

        </div>


        <div class="form-group">
            <label for="name" id="Confirmpassword-label">
                Confirm Password:
            </label>
            <input type="text"
                   name="confirmpassword"
                   id="name"

                   class="form-control"
                   placeholder="confirm your password"
                   required>




        </div>









        <div class="form-group">
            <label for="addressbox" id="address">Address:</label>
            <textarea

                name="address"
                type="text-box"
                class="form-control"
                placeholder="Enter Your Address"
                id="addressbox">
          </textarea>

        </div>

        <div class="form-group">
            <button name="submitbutton"  type="submit" id="submit" class="form-control">sign-up
            </button>


        </div>


    </form>
</div>

</body>








</html>












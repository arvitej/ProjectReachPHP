

<?php


    $errors=array();
    $errors['username']='';
    $errors['email']='';
    $errors['password']='';
    $errors['confirmpassword']='';
    $errors['address']='';

    if(isset($_POST['submitbutton'])){
        $dbServername="localhost:3340";
        $dbUsername="root";
        $dbPassword="";
        $dbName="projectreach";
//        include ('config.php');
        $conn=mysqli_connect('localhost:3340',
            'root',
            '',
            'projectreach');
        $username =$email=$password=$confirmpassword=$address=$phonenumber='';
//        //check username
//        if(empty($_POST['username'])){
//            $errors['username']="Username Cannot be empty";
//        }
//        else{
//            $username=$_POST['username'];
//
//        }
//        //check email
//        if(empty($_POST['email'])){
//            $errors['email']="email Cannot be empty";
//        }
//        else{
//            $email=$_POST['email'];
//            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
//                $errors['email']="email must be a valid email address";
//            }
//
//        }
//        //check password
//        if(empty($_POST['password'])){
//            $errors['password']="Password Cannot be empty";
//        }
//        else{
//            $password=$_POST['password'];
//
//        }
//        //check confirm password
//        if(empty($_POST['confirmpassword'])){
//            $errors['confirmpassword']="ConfirmPassword Cannot be empty";
//        }
//        elseif($_POST['confirmpassword']!=$_POST['password']){
//            $errors['confirmpassword']="Password and confirmpassword shoul be same";
//        }
//        else{
//            $confirmpassword=$_POST['confirmpassword'];
//
//
//        }
//        //check address
//        if(empty($_POST['address'])){
//            $errors['address']="Address Cannot be empty";
//        }
//        els
//            $address=$_POST['address'];
//
//        }








        $username=$_POST['username'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $confirmpassword=$_POST['confirmpassword'];
        $address=$_POST['address'];
        $phonenumber=$_POST['phonenumber'];


        //form validation
        if(empty($username)){
            $errors['username']="username is required";
        }

        if(empty($email)){
            $errors['email']="email is required";
        }

        if(empty($password)){
            $errors['password']="password is required";
        }

        if(empty($confirmpassword)){
            $errors['confirmpassword']=" please confirm your password";
        }

        if(empty($address)){
            $errors['address']="please enter you address";
        }

        if(!(preg_match("/@gmail.com/",$email))){
            $errors['email']="your email should be a google account..";
        }

        if($password!=$confirmpassword){
            $errors['confirmpassword']="password and confirm password should be same";
        }


        //check db for existing usernames and emails

        $username_check_query="SELECT * FROM signup WHERE (username='$username' )  LIMIT 1";

        $results=mysqli_query($conn,$username_check_query) ;
        $user=mysqli_fetch_assoc($results);

        if($user){

            $errors['username']="username is already taken";

//            if($user['username'==$username]){
//                $errors['username']="username not available";
//            }
//
//            if($user['email'==$email]){
//                $errors['email']="This email already exits..";
//            }
        }
        //$errors['username']==''&& $errors['email']==''&& $errors['password']==''&& $errors['confirmpassword']==''&& $errors['address']==''

        $email_check_query="SELECT * FROM signup WHERE (email='$email' )  LIMIT 1";

        $results=mysqli_query($conn,$email_check_query) ;
        $emailquery=mysqli_fetch_assoc($results);
        if($emailquery){
            $errors['email']="email already exist";
        }



        if($errors['username']==''&$errors['email']==''&$errors['password']==''&$errors['confirmpassword']==''&$errors['address']==''){
            //echo 'entered if';
            //$password=md5($password);
            $query="INSERT INTO signup(username,email,password,confirmpassword,phonenumber,address) VALUES('$username','$email','$password','$confirmpassword','$phonenumber','$address')";
            mysqli_query($conn,$query);
            $_SESSION['username']=$username;
            $_SESSION['success']="you are now successfully logged in";
            header('location:sign-in.php');

        }
//        elseif (count($errors)>0) {
////            foreach ($errors as $error) {
////                                echo $error;
////                                    }
//            echo 'enterted else if';
//            echo count($errors);
//            print_r(array_values($errors));
//        }

//        echo $errors['username'];
//        echo $errors['email'];
//        echo $errors['password'];
//        echo $errors['confirmpassword'];
//        echo $errors['address'];



    }
?>







    <!doctype html>
    <html lang="en">
    <head>
        <title>signup</title>
        <link rel="stylesheet" type="text/css" href="SignupCSS.css">
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

                  <div class="error-text">

                    <?php   echo $errors['username'];   ?>
                  </div>

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
                <div class="error-text">

                    <?php   echo $errors['email'];   ?>
                </div>


            </div>

            <div class="form-group">
                <label for="name" id="name-label" class="label">
                    Password:
                </label>
                <input type="password"
                       name="password"
                       id="name"

                       class="form-control"
                       placeholder="enter your password"
                       required>

                <div class="error-text">

                    <?php   echo $errors['password'];   ?>
                </div>

            </div>


            <div class="form-group">
                <label for="name" id="Confirmpassword-label">
                    Confirm Password:
                </label>
                <input type="password"
                       name="confirmpassword"
                       id="name"

                       class="form-control"
                       placeholder="confirm your password"
                       required>

                <div class="error-text">

                    <?php   echo $errors['confirmpassword'];   ?>
                </div>





            </div>

            <div class="form-group">
                <label for="phonenumber" id="phone-label" class="label">
                    PhoneNumber:
                </label>
                <input name="phonenumber"
                       id="phonenumber"
                       class="form-control"
                       placeholder="enter your phone number"
                        type="tel"
                        maxlength="10"
                       minlength="10"

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

                <div class="error-text">

                    <?php   echo $errors['address'];   ?>
                </div>



            </div>

            <div class="form-group">
                <button name="submitbutton"  type="submit" id="submit" class="form-control">sign-up
                </button>


            </div>


        </form>
    </div>

    </body>








    </html>














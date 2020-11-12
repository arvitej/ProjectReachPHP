

<?php
    $errors=array();

    $errors['username']='';
    $errors['password']='';
    $errors['signup']='';
    if(isset($_POST['sign-in'])){

        $conn=mysqli_connect('localhost:3340',
            'root',
            '',
            'projectreach');


        $username=$_POST['username'];
        $password=$_POST['password'];
        $dropdown=$_POST['chooseusertype'];

        $query="SELECT phonenumber FROM signup  WHERE username='$username'";
        $queryResult=mysqli_query($conn,$query);
        $row=mysqli_fetch_assoc($queryResult);
        session_start();

        $_SESSION['username']=$username;
        $_SESSION['phonenumber']=$row['phonenumber'];



        if(empty($username)){
            $errors['username']="username is required";
        }

        if(empty($password)){
            $errors['password']="password is required";
        }
        if($errors['username']==''&$errors['password']==''){


            $user_check_query="SELECT * FROM signup WHERE username='$username' and password='$password' and verified=1 ";

            $results=mysqli_query($conn,$user_check_query) ;
            $user=mysqli_fetch_assoc($results);

            if($user){
                if($dropdown=="customer"){
                    header('location:customerHomePage.php');

                }
                elseif ($dropdown="dispatcher"){
//                    session_start();
//                    $_SESSION['login_user'] = $username;
                    header('location:dispatcherHomePage.php');

                }


            }
            else{
                $username_check_query="SELECT * FROM signup WHERE username='$username'   ";
//                $password_check_query="SELECT * FROM signup WHERE password='$password'  ";
                $results1=mysqli_query($conn,$username_check_query) ;
//                $results2=mysqli_query($conn,$password_check_query) ;
                $usernameSql=mysqli_fetch_assoc($results1);
//              $passwordSql=mysqli_fetch_assoc($results2);
                if($usernameSql){
                    $errors['password']="password associated with username is wrong (or) email is not verified";
                }
                else{
                    $errors['signup']="please sign-up before sign-in";

                }


            }



        }



    }





?>


<!doctype html>
<html lan="en">
  <head>
    <title>sign-in</title>
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

    <div class="entireform"  id="signform">
      <div>
        <!-- <h1 id="title">Project Reach</h1> -->
        <h2 id="description">Sign-In</h2>
      </div>
      <form id="survey-form" action="sign-in.php" method="POST">
        <div class="form-group">

          <label for="name" id="name-label">
            Username:
          </label>

            <input type="text" name="username" id="name" class="form-control" placeholder="enter your name" required>

            <div class="error-text">

                <?php   echo $errors['username'];   ?>
            </div>
        </div>


        
       
        
        

        
         <div class="form-group">
          <label for="name" id="name-label">
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
          <label for="name" id="name-label">
            Choose eigther to be a Dispatcher or Customer:
          </label>
          <select name="chooseusertype" id="userType" class="form-control">
            <option value="dispatcher" name="namedispatcher">dispatcher</option>
            <option value="customer" name="namecustomer">customer</option>

          </select>

            <div class="error-text">

                <?php   echo $errors['signup'];   ?>
            </div>

   
        </div>



  
  

        
        
        
        
          
        
          
       
          

          
          <div class="form-group">
            <button type="submit" id="submit" class="form-control" name="sign-in">sign-in
            </button>

            <button type="submit" id="forgotpassword" class="form-control">forgot password
            </button>
            
          </div>
      </form>
    </div>

  </body>

 

  

  

  
</html>



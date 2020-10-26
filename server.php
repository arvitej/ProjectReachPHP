<?php



session_start();
//intializing varialbles

$username="";
$email="";
$password="";
$confirmpassword="";
$address="";
$errors=array();

//connect to db
$db=mysqli_connect('localhost','root','','projectreach') or die("could not connect to database");

$username=mysqli_real_escape_string($db,$_POST[username]);
$email=mysqli_real_escape_string($db,$_POST[email]);
$password=mysqli_real_escape_string($db,$_POST[password]);
$confirmpassword=mysqli_real_escape_string($db,$_POST[password]);
$address=mysqli_real_escape_string($db,$_POST[address]);

//form validation
if(empty($username)){
    array_push($errors,"username is required");
}

if(empty($email)){
    array_push($errors,"email is required");
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
    array_push($errors,"password is not matched")
}

//check db for existing usernames and emails

$user_check_query="SELECT * FROM signup WHERE username=$username OR email=$email LIMIT 1"; 

$results=mysqli_query($db,$user_check_query);
$user=mysqli_fetch_assoc($results);

if($user){
    if($user['username'==$username]){
        array_push($errors,"This username already exits");
    }

    if($user['email'==$email]){
        array_push($errors,"This email already exits");
    }
}

//registering user if there is no error
if(count($errors)==0){
    $password=md5($password);
    $query="INSERT INTO signup(username,email,password,confirmpassword,address) VALUES('$username','$email','$password','$confirmpassword','$address')";
    mysqli_query($db,$query);
    $_SESSION['username']=$username;
    $_SESSION['success']="you are now successfully logged in";
    header('location:index.php');
}



























?>
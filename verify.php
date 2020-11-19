<?php
    $dbServername="localhost:3340";
    $dbUsername="root";
    $dbPassword="";
    $dbName="projectreach";
    //        include ('config.php');
    $conn=mysqli_connect('localhost:3340',
        'root',
        '',
        'projectreach');
    if(isset($_GET['verificationkey'])){
        $vkey=$_GET['verificationkey'];
        $query="SELECT verificationkey,verified FROM signup WHERE verified=0 AND verificationkey='$vkey' LIMIT 1";
        $queryResult=mysqli_query($conn,$query);
        if(mysqli_num_rows($queryResult)==1){
            $updateQuery="UPDATE signup SET verified=1 WHERE verificationkey='$vkey'";
            $updateQueryResult=mysqli_query($conn,$updateQuery);
            if($updateQueryResult){
                echo "your email is verified you may now sign-in";
                echo '
                    <a href="sign-in.php">sign-in</a>
                
                ';
            }
            else{
                echo "This account is invalid or already verified";

            }

        }

    }
    else{
        echo"this is not the correct link";
    }

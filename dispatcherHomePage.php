<?php



echo '
<!doctype html>
<html lan="en">

    <head>
        <meta charset="UTF-8">
        <title>ProjectReach</title>
        <link rel="stylesheet" href="customerHomePageCSS.css">

    </head>

    <header>
        <h1>PROJECT<span>REACH</span></h1>
        <nav>
            <ul class="navbar">
                <li><a class="navbuttons" href="navBar.php">Home</a></li>
                <li><a class="navbuttons" href="#">ChangePassword</a></li>
                <li><a class="navbuttons" href="#">Help</a></li>
                <li><a class="navbuttons" href="signup.php#aboutProjectReach">About</a></li>
                <li><a class="navbuttons" href="sign-in.php">Sign-Out</a></li>
              </ul>
        </nav>

    </header>
        <body>


            <div class="divButtons">

                <button type="submit" class="allButtons" id="button1"> Available Requests to Choose</button>
                <button type="submit" class="allButtons"  id="button2"> your requests</button>
                <button type="submit"  class="allButtons" id="button3"> Feedback Given</button>

            </div>

            <div class="footer">
                <div class="footerheading1">
                <h3>Useful Links</h3>
                <a href="signup.php">Signup</a>
                <a href="sign-in.php">Signin</a>
                </div>
                <div class="footerheading2">
                <h4>CopyRight@CSCE5430Team2</h4>
                <h4>2020</h4>
                </div>
            </div>

        </body>



</html>
';

?>

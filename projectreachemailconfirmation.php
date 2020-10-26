<?php
echo '

<!doctype html>
<html lan="en">
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

    <div class="entireform" id="signform">
      <div>
        <!-- <h1 id="title">Project Reach</h1> -->
        <h2 id="description">Sign-In</h2>
        <h4>We sent a code to you registered email please enter it below.</h4>
      </div>
      <form id="survey-form">

        
       
        
        

        
         <div class="form-group">
          <label for="name" id="name-label">
            Confirmatiom Code:
          </label>
          <input type="text"
                 name="name"
                 id="name"
                 
                 class="form-control"
                 placeholder="enter your password" 
                 required>
   
        </div>
  
  

        
        
        
        
          
        
          
       
          

          
          <div class="form-group">
            <button type="submit" id="submit" class="form-control">Re-Send Code
            </button>

            <button type="submit" id="submit" class="form-control">Proceed
            </button>
            
          </div>
        
      
      </form>
    </div>



  </body>

 

  

  

  
</html>

';

?>


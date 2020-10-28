<?php

echo '
<!doctype html>
<html lan="en">
  <head>
    <title>sign-up</title>
    <link rel="stylesheet" type="text/css" href="SignupCSS.css">
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

    <div class="entireform" id="feedback-form">
      <div>
        <!-- <h1 id="title">Project Reach</h1> -->
        <h2 id="feedback-form-h2">feedback-form</h2>
      </div>
      <form id="survey-form">
        <div class="form-group">
          <label for="rating-choice" id="rating-label">
            Rating:
          </label>

          <select name="chooseRating" id="rating-choice" class="form-control" aria-placeholder="rate between 1-5">
            <option value="1">1</option>
            <option value="2">2</option> 
            <option value="3">3</option> 
            <option value="4">4</option> 
            <option value="5">5</option> 

          </select>

          
        </div>
        
       
        
        

        
        
        
        
          
        
          
       
          
        <div class="form-group">
          <label for="commentsBox" id="comments">Comments:</label>
          <textarea
  
                 type="text-box"
                 class="form-control"
                    placeholder="Any Comments.."
                    id="commentsBox">
          </textarea>
          
          </div>
          
          <div class="form-group">
            <button type="submit" id="submit" class="form-control">submit
            </button>
            
          </div>
        
      
      </form>
    </div>

  </body>

 

  

  

  
</html>

';

?>
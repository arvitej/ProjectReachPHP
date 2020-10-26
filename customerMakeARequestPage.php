<?php

echo '
<!doctype html>
<html lan="en">
  <head>
    <title>sign-up</title>
    <link rel="stylesheet" type="text/css" href="customerMakeRequestPage.css">
  </head>

  <header>
    <h1>PROJECT<span>REACH</span></h1>
    <nav>
        <ul class="navbar">
            <li><a class="navbuttons" href="navBar.php">Home</a></li>
            <li><a class="navbuttons" href="#">ChangePassword</a></li>
            <li><a class="navbuttons" href="#">Help</a></li>
            <li><a class="navbuttons" href="navBar.php#aboutProjectReach">About</a></li>
            <li><a class="navbuttons" href="sign-in.php">Sign-Out</a></li>
          </ul>
    </nav>
  
</header>

  <body>

    <div class="entireform" id="signupform">
      <div>
        <!-- <h1 id="title">Project Reach</h1> -->
        <h2 id="description">Make A Request</h2>
      </div>
      <form id="customerRequest-form">
        <div class="form-group">
          <label for="pickUpAddressBox" id="pickUpAddresBox-label">
            Pick-Up Address:
          </label>
          <textarea
  
                 type="text-box"
                 class="form-control"
                    placeholder="Enter Your Pick-Up Address"
                    id="pickUpAddressBox" required>
          </textarea>
          
        </div>
        
       
        
        
        <div class="form-group">
          <label for="destinationAddressBox" id="destinationAddressBox-Label">Destination Adress</label>
          <textarea
  
                 type="text-box"
                 class="form-control"
                    placeholder="Enter Your Pick-Up Address"
                    id="destinationAddressBox" required>
          </textarea>
          
        </div>
        
         <div class="form-group">
          <label for="typeOfItem" id="typeOfItem-Label">
            Type of Item:
          </label>
          <select name="itemType" id="typeOfItem" class="form-control">
            <option value="food">food</option>
            <option value="books">books</option>
            <option value="clothes">clothes</option>
            <option value="elctronics">electronics</option>
            <option value="medicine">medicine</option>

          </select>
   
        </div>
  
  
        <div class="form-group">
          <label for="itemWeight" id="itemWeightLabel">
           Weight in Pounds:
          </label>
          <input type="text"
                 name="itemWeightInput"
                 id="itemWeight"
                 
                 class="form-control"
                 placeholder="Enter weigth of Item.." 
                 required>
           
  
           
          
        </div>
        
        
        
        
          
        
          
       
          
        <div class="form-group">
          <label for="distance" id="distanceLabel">Distance between pick-up and drop point:</label>
          <input type="text"
                 name="distanceInput"
                 id="distance"
                 
                 class="form-control"
                 placeholder="Enter distance between pick-up and drop point.." 
                 required>
          
          </div>
          
          <div class="form-group">
            <button type="submit" id="makeRequest" class="form-control">Make a Request
            </button>
            
          </div>
        
      
      </form>
    </div>

  </body>

 

  

  

  
</html>
';

?>


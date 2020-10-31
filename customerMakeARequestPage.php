<?php
//echo "working";
$errors=array();
$errors['pickupcity']='';
$errors['dropcity']='';
$errors['typeofitem']='';
$errors['weight']='';
$errors['distance']='';
//echo "before isset";
if(isset($_POST['makeARequestButton'])){
    //echo "after isset";


        $conn=mysqli_connect('localhost:3340',
            'root',
            '',
            'projectreach');
        session_start();
        $username=$_SESSION['username'];
        $pickupaddress=$_POST['pickupaddress'];
        $pickupcity=$_POST['pickupcity'];
        $dropcity=$_POST['dropcity'];
        $destinationaddress=$_POST['destinationaddress'];
        $typeofitem=$_POST['typeofitem'];
        $weight=$_POST['weight'];
        $distance=$_POST['distance'];

        //checking for errors in form input
        if(!(preg_match("/^[a-z A-Z]+$/",$pickupcity))){

            $errors['pickupcity']="pick-up city name should be only alphabets";

        }
        if(!(preg_match("/^[a-z A-Z]+$/",$dropcity))){
            $errors['dropcity']="Drop city  should contain only alphabets";

        }
        if(!(preg_match("/^[0-9]+$/",$weight))){
            $errors['weight']="Weight should be only numbers";

        }
        if(!(preg_match("/^[0-9]+$/",$distance))){
            $errors['distance']="Distance should be only numbers";

        }


        if($errors['pickupcity']==''&$errors['dropcity']==''&$errors['weight']==''&$errors['distance']==''){
            //echo 'entered errors if';
            //$password=md5($password);
            //echo "before query";

            $query="INSERT INTO customerrequest(username,pickupaddress,pickupcity,dropcity,destinationaddress,typeofitem,weight,distance) VALUES('$username','$pickupaddress','$pickupcity','$dropcity','$destinationaddress','$typeofitem','$weight','$distance')";
            mysqli_query($conn,$query);
//            $_SESSION['username']=$username;
//            $_SESSION['success']="you are now successfully logged in";
            echo "before header";
            header('location:yourRequests.php');

        }







}



?>

<!doctype html>
<html lan="en">
  <head>
    <title>MakeARequest</title>
    <link rel="stylesheet" type="text/css" href="SignupCSS.css">
<!--      <script type="text/javascript"-->
<!--              src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA28e_E1hrVBwTy81k9Gj9NYsRh5oyr9gM&libraries=places&callback=autoComplete">-->
<!--      </script>-->






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
      <form id="customerRequest-form" action="customerMakeARequestPage.php" method="post">
        <div class="form-group">
          <label for="pickUpAddressBox" id="pickUpAddresBox-label">
            Pick-Up Address:
          </label>
          <textarea
  
                 type="text-box"
                 class="form-control"
                    placeholder="Enter Your Pick-Up Address"
                    id="pickUpAddressBox"
                 name="pickupaddress" required>
          </textarea>


          
        </div>

          <div class="form-group">
              <label for="pickUpCityBox" id="pickUpCityBox-label">
                  Pick-Up City:
              </label>
              <input

                  type="text"
                  class="form-control"
                  placeholder="Enter Your Pick-Up City"
                  id="pickUpCityBox"
                  name="pickupcity" required>


              <div class="error-text">

                  <?php   echo $errors['pickupcity'];   ?>
              </div>

          </div>

          <div class="form-group">
              <label for="dropCityBox" id="dropCityBox-label">
                  Drop City:
              </label>
              <input

                  type="text"
                  class="form-control"
                  placeholder="Enter Your Drop City"
                  id="dropCityBox"
                  name="dropcity" required>

              <div class="error-text">

                  <?php   echo $errors['dropcity'];   ?>
              </div>

          </div>

        
       
        
        
        <div class="form-group">
          <label for="destinationAddressBox" id="destinationAddressBox-Label">Destination Adress</label>
          <textarea
  
                 type="text-box"
                 class="form-control"
                    placeholder="Enter Your Pick-Up Address"
                    id="destinationAddressBox"
                 name="destinationaddress" required>
          </textarea>
          
        </div>
        
         <div class="form-group">
          <label for="typeOfItem" id="typeOfItem-Label">
            Type of Item:
          </label>
          <select name="typeofitem" id="typeOfItem" class="form-control">
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
                 name="weight"
                 id="itemWeight"
                 
                 class="form-control"
                 placeholder="Enter weigth of Item.." 
                 required>
            <div class="error-text">

                <?php   echo $errors['weight'];   ?>
            </div>
           
  
           
          
        </div>
        
        
        
        
          
        
          
       
          
        <div class="form-group">
          <label for="distanceInput" id="distanceLabel">Distance between pick-up and drop point:</label>
          <input type="text"
                 name="distance"
                 id="distanceInput"
                 
                 class="form-control"
                 placeholder="Enter distance between pick-up and drop point.." 
                 required>
            <div class="error-text">

                <?php   echo $errors['distance'];   ?>
            </div>
          
          </div>
          
          <div class="form-group">
            <button name="makeARequestButton"type="submit" id="submit" class="form-control">Make a Request
            </button>
            
          </div>
        
      
      </form>
    </div>



<!--    <script>-->
<!--        function autoComplete(){-->
<!--            var searchInput = document.getElementById('pickUpCityBox');-->
<!--            var autocomplete= new google.maps.places.Autocomplete((document.getElementById(searchInput)));-->
<!--            //google.maps.event.addDomListener(window, 'load', initialize);-->
<!---->
<!--        }-->
<!--    </script>-->


  </body>

 

  

  

  
</html>





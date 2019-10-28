<?php
include("includes/config.php");
  if(!isset($_SESSION['userLoggedIn']))
  {
    header("Location: index.php");
  }
include("includes/classes/Account.php");
include("includes/classes/Constants.php");

$account = new Account($con);  

function getInputValue($name)
{
  if(isset($_POST[$name]))
  {
     echo $_POST[$name];
  }
}
 
include("includes/handlers/create-handler.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Create Account</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
  
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <!--link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<--===============================================================================================-->
 <link rel="stylesheet" type="text/css" href="bootstrap1/css/bootstrap.min.css" /> <!-- THIS IS USED FOR THE USER LOGO -->
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
<style type="text/css">
  .input-group {
  position: relative;
  margin-bottom: 30px;
  border-bottom: 2px solid #ccc;
  background: transparent;
}

.input--style-1 {
  padding: 9px 0;
  color: white;
  background: transparent;
  width: 100%;
}

.input--style-1::-webkit-input-placeholder {
  
  color: white;
}




</style>
</head>
<body>
  
  <div class="limiter">
    <div class="container-login100" style="background-image: url('assets/registration.jpg');">
      <div class="wrap-login100">
        <form class="login100-form validate-form" id="creation" method="POST" action="createaccount.php" >

          <span class="login100-form-title p-b-34 p-t-27">
            Create a new Account
          </span>

          <div class="input-group" >
            <div style = "color: red" >
            <?php echo  $account->geterror(Constants::$firstnamechars); ?></div>
            <input class="input--style-1"  type="text" name="firstname" id="firstname" value="<?php getInputValue('firstname') ?>" placeholder="Name">
          </div>

          <div class="row" >
            <p class="col-5" style="color: white">Date Of Birth :</p>
            <p class="col-5" style="margin-left: 18px;color: white">Gender :</p>
          </div>
          <br>

            <div class="row row-space" style="margin-left: 1px" >
          <div class="input-group col-2" >

            <input class="input--style-1"  type="date" name="dob" id="dob">
            <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i> 
          </div>
          <div class="col-1"></div>
          <div class="input-group col-4 rs-select2" >
                              <select class="input--style-1"  name="gender" id="gender" >
                                            <option disabled="disabled" style="color: black;" selected="selected">GENDER</option>
                                            <option style="color: black;">Male</option>
                                            <option style="color: black;">Female</option>
                                        </select>
          </div>
          </div>
            

          <div class="input-group" >
             <div style = "color: red" >
              <?php echo $account->geterror(Constants::$numberlengthy); ?>
              <?php echo $account->geterror(Constants::$phonenumberwrong); ?></div>
            <input class="input--style-1"  type="text" name="phonenumber" id="phonenumber" value="<?php getInputValue('phonenumber') ?>" placeholder="Phone Number">
           
          </div>

          <div class="input-group" >
            <div style = "color: red" >
            <?php echo  $account->geterror(Constants::$pannumber); ?></div>
            <input class="input--style-1"  type="text" name="panno" id="panno" value="<?php getInputValue('panno') ?>" placeholder="PAN Number">
          </div>
          
          <div class="input-group" >
            <input class="input--style-1"  type="text" name="address" id="address" value="<?php getInputValue('address') ?>" placeholder="Address">
          </div>
          


          <div class="container-login100-form-btn">
            <button class="login100-form-btn" type="submit" name="createaccountbutton">
              Submit
            </button>
          </div>

          
        </form>
      </div>
    </div>
  </div>
  

</body>
</html>
<?php
include("includes/config.php");
include("includes/classes/Account.php");
include("includes/classes/Constants.php");

$account = new Account($con);  
 
 
include("includes/handlers/register-handlers.php");

function getInputValue($name)
{
  if(isset($_POST[$name]))
  {
     echo $_POST[$name];
  }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registration Page</title>
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
    <div class="container-login100" style="background-image: url('assets/ex.jpg');background-position: center;">
      <div class="wrap-login100">
        <form class="login100-form validate-form" id="Registration" method="POST" action="registration.php" >

          <span class="login100-form-title p-b-34 p-t-27">
            Registration
          </span>
          <div class="input-group" >
            <div style = "color: red" >
            <?php echo $account->geterror(Constants::$usernamechars); ?>
            <?php echo $account->geterror(Constants::$usernametaken); ?></div>
            <input class="input--style-1"  type="text" name="username" id="username" value="<?php getInputValue('username') ?>" placeholder="Username">
          </div>

          
          <div class="input-group" >
            <div style = "color: red" >
            <?php echo  $account->geterror(Constants::$emailinvalid);?>
            <?php echo $account->geterror(Constants::$emailsdontmatch); ?></div>
            <input class="input--style-1"  type="email" name="email" id="email" value="<?php getInputValue('email') ?>" placeholder="Email">
          </div>

          <div class="input-group" >
            <input class="input--style-1"  type="email" name="email2" id="email2" value="<?php getInputValue('email2') ?>" placeholder="Confirm Email">
          </div>

          <div class="input-group"  data-validate="Enter password">
            <div style = "color: red" >
            <?php echo $account->geterror(Constants::$passwordsdontmatch); ?>
            <?php echo $account->geterror(Constants::$passwordnotalphanumeric); ?></div>
            <input class="input--style-1" type="password" name="password" id="password" placeholder="Password">
          </div>

          <div class="input-group"  data-validate="Enter password">
            <input class="input--style-1" type="password" name="password2" id="password2" placeholder="Confirm Password">
          </div>


          <div class="container-login100-form-btn">
            <button class="login100-form-btn" type="submit" name="registerbutton">
              Submit
            </button>
          </div>

          
        </form>
      </div>
    </div>
  </div>
  

</body>
</html>
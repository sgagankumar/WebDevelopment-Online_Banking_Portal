<?php
include("includes/config.php");
  if(!isset($_SESSION['userLoggedIn']))
  {
    header("Location: index.php");
  }
include("includes/classes/Account.php");
include("includes/classes/Constants.php");

$account = new Account($con);  
$username=$_SESSION['userLoggedIn'];

function getInputValue($name)
{
  if(isset($_POST[$name]))
  {
     echo $_POST[$name];
  }
}

if(isset($_POST['transactionbutton'])){
	// echo "transfer button was pressed";

	$account1 = $_POST['account1'];
	$account2 = $_POST['account2'];
	$amount = $_POST['amount'];

  // echo $account1;
  // echo $account2;
  // echo $amount;

	//transfer function

	$result = $account->moneytransfer($username,$account1,$account2,$amount);

	if($result == true)
	{
    echo ' success  ';
		header("Location: transfermoney.php");
	}
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Transfer Money</title>
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
    <div class="container-login100" style="background-image: url('assets/moneytransfer.jpeg');">
      <div class="wrap-login100">
        <form class="login100-form validate-form" id="transfermoney" method="POST" action="transfermoney.php" >

          <span class="login100-form-title p-b-34 p-t-27">
            Transfer Money
          </span>
          <div class="input-group" >
          	<div style = "color: red" >
            <?php echo $account->geterror(Constants::$accountlength); ?>
            <?php echo $account->geterror(Constants::$accountwrong); ?></div>
            <label style="color: white"><h5>ACCOUNT NUMBER</h5></label>
            <input class="input--style-1"  type="text" name="account1" id="account1" value="<?php getInputValue('account1') ?>" placeholder="">
          </div>
   
          <div class="input-group" >
          	<div style = "color: red" >
            <?php echo $account->geterror(Constants::$accountsdontmatch); ?></div>
            <label style="color: white"><h5>CONFIRM ACCOUNT NUMBER</h5></label>
            <input class="input--style-1"  type="text" name="account2" id="account2" value="<?php getInputValue('account2') ?>" placeholder="">
          </div>

          <div class="input-group">
          	<div style = "color: red" >
            <?php echo $account->geterror(Constants::$enternumber); ?>
            <?php echo $account->geterror(Constants::$nomoney); ?></div>
            <label style="color: white"><h5>ENTER AMOUNT</h5></label>
            <input class="input--style-1" type="text" name="amount" id="amount" placeholder="">
          </div>

          <div class="container-login100-form-btn">
            <button class="login100-form-btn" type="submit" name="transactionbutton">
              TRANSFER
            </button>
          </div>

          
        </form>
      </div>
    </div>
  </div>
  

</body>
</html>
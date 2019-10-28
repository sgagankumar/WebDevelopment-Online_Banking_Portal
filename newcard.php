<?php
  include("includes/config.php");
  if(!isset($_SESSION['userLoggedIn']))
  {
    header("Location: index.php");
  }
  if(isset($_POST['logout']))
  {
    echo "Success";
    session_destroy();
    header("Location: index.php");
  }
  include("includes/classes/Account.php");
  include("includes/classes/Constants.php");
  $username=$_SESSION['userLoggedIn'];
?>




<!DOCTYPE html>
<html>
<head>
	<title>NEW CARD</title>
	<!--Initial Setup -->
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Importing Custom CSS files -->
	<link rel="stylesheet" type="text/css" href="includes/css/HOME.css">

	<!-- Importing Bootstrap API -->
	<link rel="stylesheet" type="text/css" href="bootstrap1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap1/js/bootstrap.min.js"></script>

	<!-- Importing w3Schools API -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<!-- TOP NAVIGATION BAR -->
	<div class="w3-top">
	 <div class="w3-bar w3-theme-d2 w3-left-align">
	  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-hover-white w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
	  <a href="userhomepage.php" class="w3-bar-item w3-button w3-teal"> <b>ABC BANK</b></a>
	  <a href="checkbalance.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">MY ACCOUNTs</a>
	  <a href="applyforloan.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">MY LOANs</a>
	  <a href="applyforcard.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">MY CARDS</a>
	  <a href="transactions.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">TRANSACTIONS</a>
  	  <a href="createaccount.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">APPLY FOR NEW ACCOUNT</a>
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-right w3-hover-teal" title="Search"><form method="POST"><button class="w3-hide-small" name="logout" title="Notifications">LOGOUT</button></form></a>

 </div>
	 </div>

      <?php
        if(isset($_POST['diamond']))
        {
          $expdate = date('Y-m-d', strtotime('+3 years'));
          $cardno1=rand(500000,999999);
          $cardno2=rand(10000000,99999999);
          $cardno=($cardno1*1000000)+$cardno2;
          $sql="INSERT INTO creditcard VALUES('$username','$cardno','$expdate','Diamond','active')";
          $r=mysqli_query($con,$sql);
          if($r)
          {
            ?>
              <hr>
              <hr>
              <hr>
              <div class="alert alert-success fade in">
              <a href="#" class="close" data-dismiss="alert">&times;</a>
              <strong>SUCCESS!</strong> YOUR APPLICATION FOR CARD HAS BEEN ACCEPTED AND WILL BE DELIVERED TO YOU SHORTLY.
              </div>
            <?php
          }
        }
        if(isset($_POST['elite']))
        {
          $expdate = date('Y-m-d', strtotime('+3 years'));
          $cardno1=rand(500000,99999999);
          $cardno2=rand(10000000,99999999);
          $cardno=($cardno1*1000000)+$cardno2;
          $sql="INSERT INTO creditcard VALUES('$username','$cardno','$expdate','Elite','active')";
          $r=mysqli_query($con,$sql);
          if($r)
          {
            ?>
              <hr>
              <hr>
              <hr>
              <div class="alert alert-success fade in">
              <a href="#" class="close" data-dismiss="alert">&times;</a>
              <strong>SUCCESS!</strong>YOUR APPLICATION FOR CARD HAS BEEN ACCEPTED AND WILL BE DELIVERED TO YOU SHORTLY.
              </div>
            <?php
          }
        }
        if(isset($_POST['platinum']))
        {
          $expdate = date('Y-m-d', strtotime('+3 years'));
          $cardno1=rand(500000,99999999);
          $cardno2=rand(10000000,99999999);
          $cardno=($cardno1*1000000)+$cardno2;
          $sql="INSERT INTO creditcard VALUES('$username','$cardno','$expdate','Platinum','active')";
          $r=mysqli_query($con,$sql);
          if($r)
          {
            ?>
              <hr>
              <hr>
              <hr>
              <div class="alert alert-success fade in">
              <a href="#" class="close" data-dismiss="alert">&times;</a>
              <strong>SUCCESS!</strong> YOUR APPLICATION FOR CARD HAS BEEN ACCEPTED AND WILL BE DELIVERED TO YOU SHORTLY.
              </div>
            <?php
          }
        }
        
  ?>

<!-- ACCOUNTS CONTAINER -->
<div class="w3-row-padding w3-padding-64 w3-theme-l1" id="work">

<div class="w3-quarter">
<h2>CREDIT CARDS</h2>
<p>A world of convenience and privilege awaits you with each ABC Bank Credit Card. Our Credit Cards come with unmatched benefits, exciting rewards and amazing discounts. No matter what your lifestyle, we have the best Credit Card for you.</p>
</div>

<div class="w3-quarter">
<div class="w3-card w3-white">
  <img src="assets/card1.jpg" alt="savings image" style="width:100%" style="height: 500px">
  <div class="w3-container">
  <h3>DIAMOND</h3>
  <h4>Welcome Benefit of up to 7500Rs and huge discounts on Airways ticket</h4>
  <p>Redeem Reward points as CashBack (100 Reward points = Rs.20)</p>
  </div>
  <form class="" method="POST" action="newcard.php">
  <button type="submit" name="diamond" onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-teal w3-padding-large"><i class="fa fa-check"></i>Apply for this card</button></form>
  </div>
</div>

<div class="w3-quarter">
<div class="w3-card w3-white">
  <img src="assets/card2.jpg" alt="salary image" style="width:100%" style="height: 500px">
  <div class="w3-container">
  <h3>ELITE</h3>
  <h4>Expect benefits beyond the ordinary like our Free Insurance Cover</h4>
  <p>25% off on movies and up to 20% off on dining. (at participating outlets)</p>
  <p>Bouquet of discount vouchers as welcome gift</p>
  </div>
  <form class="" method="POST" action="newcard.php">
  <button type="submit" name="elite" onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-teal w3-padding-large"><i class="fa fa-check"></i>Apply for this card</button></form>
  </div>
</div>

<div class="w3-quarter">
<div class="w3-card w3-white">
  <img src="assets/card3.jpg" alt="rural image" style="width:100%" style="height: 500px">
  <div class="w3-container">
  <h3>PLATINUM</h3>
  <h4>Welcome Benefit of up to 2500Rs and huge discounts on Movies ticket</h4>
  <p>10% off on movies and up to 10% off on dining. (at participating outlets)</p>
  <p>Flexible Repayment Tenure</p>
  </div>
  <form class="" method="POST" action="newcard.php">
  <button type="submit" name="platinum" onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-teal w3-padding-large"><i class="fa fa-check"></i>Apply for this card</button></form>
  </div>
</div>
</div>

 <!--  <div style="background-color: red">ABCDEF <?php //echo $sq; ?></div> -->
    
</body>
</html>
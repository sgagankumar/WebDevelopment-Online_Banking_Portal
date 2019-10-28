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
	<title>Accounts</title>
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
	 <div>
	 	
	 	<?php
      $con = mysqli_connect("localhost", "root", "", "digitalbanking");
        if(mysqli_connect_errno()) 
        {
          echo "Failed to connect: " . mysqli_connect_errno();
        }
          $sql = "SELECT * FROM `accounts` where username='$username'";
          echo $sql;
          $resul = mysqli_query($con ,$sql);
        

        if(mysqli_num_rows($resul)==0)
        {
        	?>
        	<hr>
        	<table class="table" >
   			 <tr><td = colspan="7"><h1><B>YOU STILL DONT HAVE ANY ACCOUNT</B></h1></td></tr>
   			</table>
   			<?php
        }  
          if(mysqli_num_rows($resul)>0)
          {                                        
    ?>
	<table class="table" >
    <tr><td = colspan="7"><h1><B>YOUR ACCOUNT DETAILS</B></h1></td></tr>
      <tr >
        <td><h4>ACCOUNT NUMBER</h4> </td>
        <td><h4>AMOUNT</h4></td>
        <td><h4>RATE OF INTEREST</h4></td>
        <!-- <td><h4>ACCOUNT STATUS</h4></td> -->
      </tr> 
      <?php
        while ($row = mysqli_fetch_array($resul))
        { 
          ?>
          <tr>
            <td><?php echo $row["acc_no"]; ?></td>
            <td><?php echo $row["amount"]; ?></td>
            <td> <?php echo $row["roi"];?></td>

            <?php echo "<br>";?>
          </tr>      
          <?php
        }
    }
 ?>
<hr>
<div>
  

</div>
    
</body>
</html>
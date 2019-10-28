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
	<title>LOANS PAGE</title>
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
                    $sql = "SELECT * FROM `loans` where username='$username';";

                    $resul = mysqli_query($con ,$sql);

                if(mysqli_num_rows($resul)>0)
                {
                    ?>

	<table class="table" >
    <tr><td = colspan="7"><h1>YOUR LOANS</h1></td></tr>
                      <tr >
                      <td><h4> LOAN NUMBER </h4> </td>
                      <td><h4> LOAN TYPE </h4></td>
                      <td><h4> RATE OF INTEREST </h4></td>
                      
                      <td><h4> LOAN AMOUNT </h4></td>
                      <td><h4> LOAN PERIOD </h4></td>
                      <td><h4> EMI </h4></td>
                    
                     
                      
                      
                      
                       </tr> <?php
                                        while ($row = mysqli_fetch_array($resul))
                                        { ?><tr><td><?php
                                            echo $row["loan_id"]; ?>
                                           </td><td><?php 
                                            echo $row["loan_type"]; ?></td>
                                           <td> <?php echo $row["rateofinterest"];?></td>
                                         
                                          <td> <?php echo $row["loanamount"];?></td>
                                          <td> <?php echo $row["loan_per"];?></td>
                                           <td> <?php echo $row["emipm"];?></td>
                                          <?php echo "<br>";

                                ?>
                                    </tr>      
                                <?php
                                        }
                                    }

                                ?>

	 </div>	 
	 <form class="" method="POST" action="applyforloan.php" >
        <div class="col-sm-6">
          <hr><hr>
        	<div><h2>APPLY FOR NEW LOAN</h2></div>
      <div class="w3-section">      
        <label>LOAN TYPE</label>
        <input class="w3-input" type="text" name="type" required>
      </div>
      <div class="w3-section">      
        <label>LOAN AMOUNT</label>
        <input class="w3-input" type="text" name="amt" required>
      </div>
      <div class="w3-section">      
        <label>LOAN PERIOD</label>
        <input class="w3-input" type="text" name="per" required>
      </div>  
      <button type="submit" class="w3-button w3-right w3-theme" name="applyloan">APPLY</button>
  </div>
      </form>

      <?php
      	if(isset($_POST['applyloan']))
      	{
      		$type=$_POST['type'];
      		$amt=$_POST['amt'];
      		$per=$_POST['per'];
      		$loan=rand(10000000,99999999);
      		$emi=($amt*1.09)/$per;
      		$sql1="INSERT INTO loans VALUES('$username','$loan','$type','09','$amt','$per','$emi')";
      		$r=mysqli_query($con,$sql1);
      		if($r)
      		{
      			$sq="CALL calcemi('10','$per','$amt','$username');";
      			// echo $sq;
      			$re=mysqli_query($con,$sq);
      			if($re)
      			{
      				// echo "string";
      			}
      		}


      	}
  ?>
 <!--  <div style="background-color: red">ABCDEF <?php echo $sq; ?></div> -->
    
</body>
</html>
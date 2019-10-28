<?php

  include("includes/config.php");
  include("includes/classes/Account.php");
  include("includes/classes/Constants.php");

  $account = new Account($con); 

  include("includes/handlers/login-handlers.php");

?>
<!DOCTYPE html>
<html>
<title>ABC BANK</title>
<!--Initial Setup -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Importing Custom CSS files -->
  <link rel="stylesheet" type="text/css" href="includes/css/HOME.css">

<!-- Importing Bootstrap API -->
<link rel="stylesheet" type="text/css" href="bootstrap1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- Importing w3Schools API -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body id="myPage">

<!-- TOP NAVIGATION BAR -->
<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-hover-white w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a href="#" class="w3-bar-item w3-button w3-teal"> <b>ABC BANK</b></a>
  <a href="#team" class="w3-bar-item w3-button w3-hide-small w3-hover-white">PRODUCTS</a>
  <a href="#work" class="w3-bar-item w3-button w3-hide-small w3-hover-white">ACCOUNTS</a>
  <a href="#pricing" class="w3-bar-item w3-button w3-hide-small w3-hover-white">LOANS</a>
  <a href="#" onclick="document.getElementById('id01').style.display='block'" class="w3-bar-item w3-button w3-hide-small w3-hover-white">APPLY NOW</a>
    <div class="w3-dropdown-hover w3-hide-small">
    <button class="w3-button" title="Notifications">CONTACT US<i class="fa fa-caret-down"></i></button>     
    <div class="w3-dropdown-content w3-card-4 w3-bar-block">
      <a href="#googleMap" class="w3-bar-item w3-button">BRANCES</a>
      <a href="#contact" class="w3-bar-item w3-button">CUSTOMER CARE</a>
      <a href="#googleMap" class="w3-bar-item w3-button">LOCATE US</a>
    </div>
  </div>
 </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium">
    <a href="#team" class="w3-bar-item w3-button">PRODUCTS</a>
    <a href="#work" class="w3-bar-item w3-button">ACCOUNTS</a>
    <a href="#pricing" class="w3-bar-item w3-button">LOANS</a>
    <a href="#contact" class="w3-bar-item w3-button">APPLY NOW</a>
  </div>
</div>


<!-- CAROUSEL EFFECT SLIDES -->
<!-- Image Header -->
<div class="w3-display-container w3-animate-opacity">
  <div class="bs-example">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Carousel indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="1" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
            <li data-target="#myCarousel" data-slide-to="4"></li>
        </ol>   
        <!-- Wrapper for carousel items -->
        <div class="carousel-inner">
            <div class="item active">
                <img src="assets/images/extras/slide0.png" alt="Basic Slide">
            </div><div class="item">
                <img src="assets/images/extras/slide1.png" alt="First Slide">
            </div>
            <div class="item">
                <img src="assets/images/extras/slide2.png" alt="Second Slide">
            </div>
            <div class="item">
                <img src="assets/images/extras/slide3.png" alt="Third Slide">
            </div>
            
        </div>
        <!-- Carousel controls -->
        <a class="carousel-control left" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="carousel-control right" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
</div>
  <div class="w3-container w3-display-bottomleft w3-margin-bottom">  
    <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-xlarge w3-theme w3-hover-teal" title="ModalOpen" >LOGIN / SIGN UP</button>
  </div>
</div>



<!-- MODAL LOGIN PAGE -->
<div id="id01" class="modal">
  
  <form class="modal-content animate" method="POST" >
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="assets/images/extras/useravatar.png" alt="Avatar" class="avatar">
    </div>

    <div class="containermodal">
      <label for="loginUsername"><b>Username</b></label>
      <input id="loginUsername" type="text" placeholder="Enter Username" name="loginUsername" required>
    
      <label for="loginPassword"><b>Password</b></label>
      <input id="loginPassword" type="password" placeholder="Enter Password" name="loginPassword" required>

      <?php echo  $account->geterror(Constants::$loginFailed);?>
      <!-- <div style="background-color: red">RECOVERY
        <?php $username = $_POST['loginUsername'];
        $password = $_POST['loginPassword'];
        echo $username;
        echo $password;?>
      </div> -->
        
      <button type="submit" name="loginbutton">Login</button>
      
      <label>
        
      </label>
    </div>
    <div class="containermodal" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">NEW CUSTOMER?  <a href="registration.php"> REGISTER</a></span>
    </div>

        
    </div>
    
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

<!-- PRODUCTS CONTAINER -->
<div class="w3-container w3-padding-64 w3-center" id="team">
<h2>OUR PRODUCTS</h2>
<p>Variety of Services offered by ABC bank...</p>

<div class="w3-row"><br>

<div class="w3-quarter">
  <img src="assets/images/extras/icon-sa.png" alt="Boss" style="width:45%" class="w3-circle w3-hover-opacity">
  <!-- <h4><a href="#">Know more -></a></h4> -->
  <p>Choose an account to suit your needs – from a basic banking account to a feature rich premium option</p>
</div>

<div class="w3-quarter">
  <img src="assets/images/extras/icon-pl.png" alt="Boss" style="width:45%" class="w3-circle w3-hover-opacity">
  <!-- <h4><a href="#">Know more -></a></h4> -->
  <p>Simplified Documentation, Personal Loan Disbursal in 4 Hours*, Competitive Pricing, Transparent Processing</p>
</div>

<div class="w3-quarter">
  <img src="assets/images/extras/icon-cc.png" alt="Boss" style="width:45%" class="w3-circle w3-hover-opacity">
  <!-- <h4><a href="#">Know more -></a></h4> -->
  <p>Explore a world of convenience, customized benefits, rewards and Smartbuy cashback offers with credit and debit cards from ABC Bank.</p>
</div>

<div class="w3-quarter">
  <img src="assets/images/extras/icon-cl.png" alt="Boss" style="width:45%" class="w3-circle w3-hover-opacity">
  <!-- <h4><a href="#">Know more -></a></h4> -->
  <p>Get the finance you need for a new car with our range of ABC Bank Car Loans</p>
</div>

</div>
</div>


<!-- ACCOUNTS CONTAINER -->
<div class="w3-row-padding w3-padding-64 w3-theme-l1" id="work">

<div class="w3-quarter">
<h2>ACCOUNTS</h2>
<p>Everyone needs a bank account! It’s crucial for the day-to-day management of your money. So, ensuring you have a savings account that meets your needs will make a big difference.</p>
</div>

<div class="w3-quarter">
<div class="w3-card w3-white">
  <img src="assets/images/extras/savings.jpg" alt="savings image" style="width:100%" style="height: 500px">
  <div class="w3-container">
  <h3>Savings Account</h3>
  <h4>Choose an account to suit your needs – from a basic banking account to a feature rich premium option</h4>
  <p>Choose an account to suit your needs – from a basic banking account to a feature rich premium option</p>
  </div>
  </div>
</div>

<div class="w3-quarter">
<div class="w3-card w3-white">
  <img src="assets/images/extras/salary.jpg" alt="salary image" style="width:100%" style="height: 500px">
  <div class="w3-container">
  <h3>SALARY ACCOUNTS</h3>
  <h4>Customised salary accounts to suit the needs of every corporate</h4>
  <p>Expect benefits beyond the ordinary like our Free Insurance Cover</p>
  <p>7 Year Loan Tenure</p>
  
  </div>
  </div>
</div>

<div class="w3-quarter">
<div class="w3-card w3-white">
  <img src="assets/images/extras/rural.jpg" alt="rural image" style="width:100%" style="height: 500px">
  <div class="w3-container">
  <h3>RURAL ACCOUNTS</h3>
  <h4>Everyday banking solutions for farmers</h4>
  <p>Accounts that understand your unique requirements</p>
  <p>Flexible Repayment Tenure</p>
  </div>
  </div>
</div>

</div>

<!-- Container -->
<div class="w3-container" style="position:relative">
  <a onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-xlarge w3-circle w3-teal" style="position:absolute;top:-28px;right:24px">+</a>
</div>

<!-- LOAN OPTIONS ROWS -->
<div class="w3-row-padding w3-center w3-padding-64" id="pricing">
    <h1>LOANS</h1>
    <p>Find loans with minimal paperwork, quick eligibility checks, and competitive interest rates</p><br>
    <div class="w3-third w3-margin-bottom">
      <ul class="w3-ul w3-border w3-hover-shadow">
        <li class="w3-theme">
          <p class="w3-xlarge">PERSONAL LOANS</p>
        </li>
        <li class="w3-padding-16">Simplified Documentation</li>
        <li class="w3-padding-16">Personal Loan Disbursal in 4 Hours*</li>
        <li class="w3-padding-16">Competitive Pricing</li>
        <li class="w3-padding-16">Transparent Processing</li>
        <li class="w3-theme-l5 w3-padding-24">
          <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-teal w3-padding-large"><i class="fa fa-check"></i> Sign Up</button>
        </li>
      </ul>
    </div>

    <div class="w3-third w3-margin-bottom">
      <ul class="w3-ul w3-border w3-hover-shadow">
        <li class="w3-theme-l2">
          <p class="w3-xlarge">HOME LOANS</p>
        </li>
        <li class="w3-padding-16">Flexible Repayment Options</li>
        <li class="w3-padding-16">Quick Processing</li>
        <li class="w3-padding-16">Free & Safe Document Storage</li>
        <li class="w3-padding-16">Wide Range of Home Loan Products</li>
        <li class="w3-theme-l5 w3-padding-24">
          <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-teal w3-padding-large"><i class="fa fa-check"></i> Sign Up</button>
        </li>
      </ul>
    </div>

    <div class="w3-third w3-margin-bottom">
      <ul class="w3-ul w3-border w3-hover-shadow">
        <li class="w3-theme">
          <p class="w3-xlarge">CAR LOANS</p>
        </li>
        <li class="w3-padding-16">Get the finance you need for a new car with our range of ABC Bank Car Loans</li>
        <li class="w3-padding-16">Up to 100% Funding</li>
        <li class="w3-padding-16">7 Year Loan Tenure</li>
        <li class="w3-padding-16">2% Lower Interest Rates</li>
        <li class="w3-theme-l5 w3-padding-24">
          <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-teal w3-padding-large"><i class="fa fa-check"></i> Sign Up</button>
        </li>
      </ul>
    </div>
</div>

<!-- Contact Container -->
<div class="w3-container w3-padding-64 w3-theme-l5" id="contact">
  <div class="w3-row">
    <div class="w3-col m5">
    <div class="w3-padding-16"><span class="w3-xlarge w3-border-teal w3-bottombar">Contact Us</span></div>
      <h3>Address</h3>
      <p>Jnanakshi Road, Rajarajeshwarinagar,</p>
      <p><i class="fa fa-map-marker w3-text-teal w3-xlarge"></i>  Bangalore -98</p>
      <p><i class="fa fa-phone w3-text-teal w3-xlarge"></i>  +91 8073130198</p>
      <p><i class="fa fa-envelope-o w3-text-teal w3-xlarge"></i>  sgagankumar@gmail.com</p>
    </div>
    <div class="w3-col m7">
      <form class="w3-container w3-card-4 w3-padding-16 w3-white" action="/action_page.php" target="_blank">
        <div><h2>CONTACT ME </h2></div>
      <div class="w3-section">      
        <label>Name</label>
        <input class="w3-input" type="text" name="Name" required>
      </div>
      <div class="w3-section">      
        <label>Email</label>
        <input class="w3-input" type="text" name="Email" required>
      </div>
      <div class="w3-section">      
        <label>Mobile</label>
        <input class="w3-input" type="text" name="Mobile" required>
      </div>  
      
      <button type="submit" class="w3-button w3-right w3-theme">SEND</button>
      </form>
    </div>
  </div>
</div>


<!-- Footer -->
<footer class="w3-container w3-padding-32 w3-theme-d1 w3-center">
  <h4>Follow Us</h4>
  <a class="w3-button w3-large w3-teal" href="javascript:void(0)" title="Facebook"><i class="fa fa-facebook"></i></a>
  <a class="w3-button w3-large w3-teal" href="javascript:void(0)" title="Twitter"><i class="fa fa-twitter"></i></a>
  <a class="w3-button w3-large w3-teal" href="javascript:void(0)" title="Google +"><i class="fa fa-google-plus"></i></a>
  <a class="w3-button w3-large w3-teal" href="javascript:void(0)" title="Google +"><i class="fa fa-instagram"></i></a>
  <a class="w3-button w3-large w3-teal w3-hide-small" href="javascript:void(0)" title="Linkedin"><i class="fa fa-linkedin"></i></a>
  <p>Created by<a href="https://github.com/sgagankumar" target="_blank">S. Gagan Kumar</a></p>

  <div style="position:relative;bottom:100px;z-index:1;" class="w3-tooltip w3-right">
    <span class="w3-text w3-padding w3-teal w3-hide-small">Go To Top</span>   
    <a class="w3-button w3-theme" href="#myPage"><span class="w3-xlarge">
    <i class="fa fa-chevron-circle-up"></i></span></a>
  </div>
</footer>

<script>
// Script for side navigation
function w3_open() {
    var x = document.getElementById("mySidebar");
    x.style.width = "300px";
    x.style.paddingTop = "10%";
    x.style.display = "block";
}

// Close side navigation
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>

</body>
</html>

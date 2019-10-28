<?php
	class Account {

		private $con;
		private $errorArray;

		public function __construct($con)
		{
			$this->con=$con;
			$this->errorArray = array();
		}

		public function login($un,$pw)
		{
			$pw = md5($pw);
			$query = mysqli_query($this->con, "SELECT * FROM userdetails WHERE username='$un' AND password='$pw'");
			if(mysqli_num_rows($query) == 1)
			{
				return true;
			}
			else
			{
				array_push($this->errorArray,Constants::$loginFailed);
				return false;
			}

		}

		public function moneytransfer($un,$account1,$account2,$amount)
		{
			$this->validateacccounts($account1,$account2);
			$this->validateamount($amount);
			$sql1 = "SELECT * FROM accounts WHERE username='$un';";
			// echo $sql1;
			$query1 = mysqli_query($this->con, $sql1);
			$row1 = mysqli_fetch_array($query1);
			$sbalance = $row1["amount"];
			// echo $sbalance;
			// echo $amount;
			if($sbalance < $amount)
			{
				array_push($this->errorArray,Constants::$nomoney);
				return false;
			}
			$sql2 = "SELECT * FROM accounts WHERE acc_no='$account1';";
			// echo $sql2;
			$query2 = mysqli_query($this->con, $sql2);
			$row2 = mysqli_fetch_array($query2);
			if(mysqli_num_rows($query2)==0)
			{
				if(empty($this->errorArray)== true)
				{
					array_push($this->errorArray,Constants::$accountwrong);
					return false;
				}
			}
			if(empty($this->errorArray)== true){
				// echo 'transfering';
				// echo $un;
				// echo $account1;
				// echo $amount;
				return $this->transfer($un,$account1,$amount);
			}
			else
			{
				return false;
			}
			
		}

		public function register($un, $em, $em2, $pw, $pw2){
			$this->validateUsername($un);
			$this->validateEmails($em,$em2);
			$this->validatePasswords($pw,$pw2);

			if(empty($this->errorArray)== true){
				//insert into db
				return $this->insertUserDetails($un, $em, $pw);
				
			}
			else{
				return false;
				
			}

		}

		public function createaccount($nm, $dob, $gg, $ph, $pan, $ad, $un)
		{
			$this->validatename($nm);
			$this->validatephn($ph);
			$this->validatepanno($pan);
			$this->validateaddress($ad);

			if(empty($this->errorArray)== true){
				//insert into db
				return $this->insertCustomerdetails($un,$nm, $dob, $gg, $ph, $pan, $ad);
			}
			else
			{
				return false;
			}
			
		}


		public function getError($error) {
			if(!in_array($error, $this->errorArray)){
				$error = "";
			}
			return "<span class='errorMessage'>$error</span>";
		}


		private function insertUserDetails($un, $em, $pw)
		{	
			$encryptedPw = md5($pw); 

			// echo "INSERT INTO userdetails VALUES(NULL,'$un','$em','$encryptedPw');";
			$result = mysqli_query($this->con, "INSERT INTO userdetails VALUES(NULL,'$un','$em','$encryptedPw');");
			return $result;
		}

		private function insertCustomerdetails($un,$nm, $dob, $gg, $ph, $pan, $ad)
		{
			$date = date("Y-m-d");
			$num=rand(4000000000,5000000000);
			$result = mysqli_query($this->con, "INSERT into customerdetails VALUES('$un','$nm','$gg','$num','$ph','$pan','$dob','$ad','$date');");
			return $result;
		}

		private function transfer($un,$account1,$amount)
		{
			$date = date("Y-m-d h:i:sa");
			$sql1 = "SELECT * FROM accounts WHERE username='$un';";
			$query1 = mysqli_query($this->con, $sql1);
			$row1 = mysqli_fetch_array($query1);
			$sbalance = $row1["amount"];
			$newsbalance = $sbalance - $amount;
			$acc = $row1["acc_no"];
			$sql3 = "UPDATE `accounts` SET `amount` = '$newsbalance' WHERE acc_no='76523416';";
			$r1 = mysqli_query($this->con, $sql3);



			$sql2 = "SELECT * FROM accounts WHERE acc_no='$account1';";
			$query2 = mysqli_query($this->con, $sql2);
			$row2 = mysqli_fetch_array($query2);
			$rbalance = $row1["amount"];
			$newrbalance = $rbalance + $amount;
			$sql4 = "UPDATE `accounts` SET `amount` = '$newrbalance' WHERE acc_no='$account1';";
			$r2 = mysqli_query($this->con, $sql4);




			$result = mysqli_query($this->con, "INSERT into transactions VALUES('$un',NULL,'$amount','$acc','$account1','$date');");

		}

		private function validateUsername($un) {

			if(strlen($un) > 25 || strlen($un) < 3)
			{
				array_push($this->errorArray, Constants::$usernamechars);
				return;
			}

			// check if username exists

			$checkUsernameQuery = mysqli_query($this->con, "SELECT username FROM userdetails WHERE username='$un'");
			if(mysqli_num_rows($checkUsernameQuery) !=0) 
			{
				array_push($this->errorArray, Constants::$usernametaken);
				return;
			}

		}

		private function validateEmails($em,$em2) {
		
			if($em != $em2)
			{
				array_push($this->errorArray,Constants::$emailsdontmatch);
				return;
			}

			if(!filter_var($em, FILTER_VALIDATE_EMAIL))
			{
				array_push($this->errorArray,Constants::$emailinvalid);
				return;
			}

			// check email 
			$checkEmailQuery = mysqli_query($this->con, "SELECT email FROM userdetails WHERE username='$em'");
			if(mysqli_num_rows($checkEmailQuery) !=0) 
			{
				array_push($this->errorArray, Constants::$emailexists);
				return;
			}

		}

		private function validatePasswords($pw,$pw2) {

			if($pw != $pw2)
			{
				array_push($this->errorArray,Constants::$passwordsdontmatch);
				return;
			}

			if(preg_match('/[^A-Za-z0-9]/', $pw)){
				array_push($this->errorArray,Constants::$passwordnotalphanumeric);
				return;
			}

			if(strlen($pw) > 18 || strlen($pw) < 6)
			{
				array_push($this->errorArray,Constants::$passwordchars);
				return;
			}

		}	


		private function validatename($nm) {

			// if(preg_match('/[^A-Za-z]/', $nm)){
			// 	array_push($this->errorArray,Constants::$namenumeric);
			// 	return;
			// }

		}	

		private function validatephn($ph) {

			if (!preg_match('/^[1-9][0-9]*$/', $ph)) {
     		   array_push($this->errorArray,Constants::$phonenumberwrong);
    		} else {
    		    // Continue
    		}
			if(strlen($ph) > 10 || strlen($ph) < 10)
			{
				array_push($this->errorArray,Constants::$numberlengthy);
				return;
			}

		}

		private function validatepanno($nm) {
			if (!preg_match('/^[1-9][0-9]*$/', $nm)) {
     		   array_push($this->errorArray,Constants::$pannumber);
    		} else {
    		    // Continue
    		}
		}

		private function validateaddress($nm) {
		}

		private function validateamount($am)
		{
			if (!preg_match('/^[1-9][0-9]*$/', $am)) {
     		   array_push($this->errorArray,Constants::$enternumber);
     		   return;
    		} else {
    		    // Continue
    		}
		}

		private function validateacccounts($ac1,$ac2)
		{
			if (!preg_match('/^[1-9][0-9]*$/', $ac1)) {
     		   array_push($this->errorArray,Constants::$accountlength);
     		   return;
    		} else {
    		    // Continue
    		}
    		if(strlen($ac1) > 8 || strlen($ac1) < 8)
			{
				array_push($this->errorArray,Constants::$accountlength);
				return;
			}
			if($ac1!= $ac2)
			{
				array_push($this->errorArray,Constants::$accountsdontmatch);
				return;
			}


		}
	}
?>
<?php

function sanitizeFormPassword($inputText) {
	$inputText = strip_tags($inputText);
	return $inputText;
}

function sanitizeFormUsername($inputText) {
	$inputText = strip_tags($inputText);
	$inputText = str_replace(" ", "", $inputText);
	return $inputText;
}

function sanitizeFormString($inputText) {
	$inputText = strip_tags($inputText);
	$inputText = str_replace(" ", "", $inputText);
	$inputText = ucfirst(strtolower($inputText));
	return $inputText;
}

if(isset($_POST['createaccountbutton'])){
	//echo "createaccountbutton button was pressed";
	$username = $_SESSION['userLoggedIn'];
	echo $username;
	$firstname = sanitizeFormString($_POST['firstname']);
	$dob = $_POST['dob'];
	$gender = $_POST['gender'];
	$phonenumber = sanitizeFormUsername($_POST['phonenumber']);
	$panno = sanitizeFormUsername($_POST['panno']);
	$address = sanitizeFormPassword($_POST['address']);

	echo $firstname;
	echo $dob;
	echo $gender;
	echo $phonenumber;
	echo $panno;
	echo $address;

	

	$wasSuccessful = $account->createaccount($firstname, $dob, $gender, $phonenumber, $panno, $address,$username);
	if($wasSuccessful == true)
	{
		header("Location: checkbalance.php");
	}
	
}

?>
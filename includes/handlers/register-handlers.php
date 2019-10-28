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

if(isset($_POST['registerbutton'])){
	//echo "RegisterButton button was pressed";
	$username = sanitizeFormUsername($_POST['username']);
	$email = sanitizeFormUsername($_POST['email']);
	$email2 = sanitizeFormUsername($_POST['email2']);
	$password = sanitizeFormPassword($_POST['password']);
	$password2 = sanitizeFormPassword($_POST['password2']);
	// echo $username;
	// echo $email;
	// echo $email2;
	// echo $password;
	// echo $password2;

	$wasSuccessful = $account->register($username, $email, $email2, $password, $password2);
	if($wasSuccessful == true)
	{
		$_SESSION['userLoggedIn'] = $username;
		header("Location: userhomepage.php");
	}
	
}

?>
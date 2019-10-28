<?php


if(isset($_POST['loginbutton'])){
	 echo "login button was pressed";

	$username = $_POST['loginUsername'];
	$password = $_POST['loginPassword'];

	//login function

	$result = $account->login($username,$password);

	if($result == true)
	{
		session_start();
		$_SESSION['userLoggedIn'] = $username;
		header("Location: userhomepage.php");
	}
}

?>
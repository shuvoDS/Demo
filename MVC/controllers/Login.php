<?php 
session_start();
require '../model/User.php';

if ($_SERVER['REQUEST_METHOD'] === "POST") {
	$isValid = true;
	$username = $_POST['uname'];
	$password = $_POST['password'];
	$usernameErrMsg = "";
	$passwordErrMsg = "";
	$errMsg = "";

	if (empty($username)) {
		$_SESSION['usernameErrMsg'] = "Please fill up the username";
		$isValid = false; 
	}
	else {
		$_SESSION['username'] = $username;
		$_SESSION['usernameErrMsg'] = "";
	}
	if (empty($password)) {
		$_SESSION['passwordErrMsg'] = "Please fill up the password";
		$isValid = false;
	}

	if ($isValid === true) {
		if (credentials($username, $password)) {
			header("Location: ../views/home.php");
		}
		else {
			$errMsg = "Username or password incorrect";
			header("Location: ../views/login.php?err=" . $errMsg);
		}
	}
	else {
		header("Location: ../views/login.php");
	}
}
else {
	echo "Invalid Request";
}

?>
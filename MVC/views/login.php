<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Form Validation</title>
</head>
<body>

	<form action="../controllers/Login.php" method="post" novalidate>

		<label for="uname">Username</label>
		<input type="text" name="uname" id="uname" value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ""; ?>">
		<?php echo isset($_SESSION['usernameErrMsg']) ? $_SESSION['usernameErrMsg'] : ""; ?>
		<br><br>
		<label for="password">Password</label>
		<input type="password" name="password" id="password">
		<?php echo isset($_SESSION['passwordErrMsg']) ? $_SESSION['passwordErrMsg'] : ""; ?>
		<br><br>

		<input type="submit" value="Login">
		
	</form>

	<?php echo isset($_GET['err']) ? $_GET['err'] : ""; ?>

	Not Registered? Click<a href="registration.html">here.</a>
</body>
</html>
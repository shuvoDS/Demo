<?php 
	
function credentials($username, $password) {
	if ($username === "admin" and $password === "admin") {
		return true;
	}
	else {
		return false;
	}
}
?>
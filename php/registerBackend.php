<?php

	include_once '../cfg/conn.php';

	$user = $_POST['user'];
	$pass = $_POST['pass'];
	$confirm = $_POST['confirm'];
	$admin = 0;

	if($pass == $confirm){
		$sql = "INSERT INTO phpaccess VALUES ('$user', '$pass', '$admin', null);";
		mysqli_query($conn, $sql);

		header("Location: login.html?signup=success"); /* Redirect browser */
		exit();
	}
	
		header("Location: register.html?signup=failure"); /* Redirect browser */
		exit();
?>
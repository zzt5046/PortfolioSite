<?php

	include_once '../cfg/conn.php';

	$user = $_POST["user"];
	$pass = $_POST["pass"];
	$confirm = $_POST["confirm"];
	$admin = 0;

	if($pass == $confirm){
		$sql = "INSERT INTO phpaccess (username, password, admin) VALUES ('$user', '$pass', '$admin');"
		mysqli_query($conn, $sql);

		header("login.php?signup=success"); /* Redirect browser */
		exit();
	}
	
	echo "Passwords do not match.";
	exit();
?>
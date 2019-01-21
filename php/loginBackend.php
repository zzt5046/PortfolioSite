<?php

	include_once '../cfg/conn.php';

	$user = $_POST['user'];
	$pass = $_POST['pass'];

	$lookupPass = mysqli_query($conn, "SELECT password FROM phpaccess WHERE username='$user';");
	echo "$lookupPass";
	exit();
	if($pass == $lookupPass){

		header("Location: functions.php?login=success"); /* Redirect browser */
		exit();
	}
	
		header("Location: login.html?login=failure"); /* Redirect browser */
		exit();
?>
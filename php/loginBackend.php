<?php

	include_once '../cfg/conn.php';

	$user = $_POST['user'];
	$pass = $_POST['pass'];

	$lookup = mysqli_query($conn, "SELECT * FROM phpaccess WHERE username='$user' 
										AND password='$pass';");

	if(mysqli_num_rows($lookup) == 1){

		header("Location: functions.php?login=success"); /* Redirect browser */
		exit();
	}
	
		header("Location: login.html?login=failure"); /* Redirect browser */
		exit();
?>
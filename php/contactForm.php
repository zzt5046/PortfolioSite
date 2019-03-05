<?php

if (isset($_POST['submit'])) {
	$name = $_POST['contactName'];
	$email = $_POST['contactEmail'];
	$subject = $_POST['contactSubject'];
	$msg = $_POST['contactMessage'];

	$mailto = "zthomas2323@gmail.com";
	$headers = "From PortfolioSite: ".$email;
	$txt = "You have received an email from ".$name.".\n\n".$msg;

	mail($mailto, $subject, $txt, $headers);
	header("Location: index.html?mailsent")
}
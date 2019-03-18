<?php

require_once('../../PHPMailer-5.2.25/PHPMailerAutoload.php');

// Replace this with your own email address
$siteOwnersEmail = 'zthomas2323@gmail.com';


if($_POST) {

   $name = trim(stripslashes($_POST['contactName']));
   $email = trim(stripslashes($_POST['contactEmail']));
   $subject = trim(stripslashes($_POST['contactSubject']));
   $contact_message = trim(stripslashes($_POST['contactMessage']));

   // Check Name
	if (strlen($name) < 2) {
		$error['name'] = "Please enter your name.";
	}
	// Check Email
	if (!preg_match('/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-]+\.([a-z0-9\-]+\.)*+[a-z]{2}/is', $email)) {
		$error['email'] = "Please enter a valid email address.";
	}
	// Check Message
	if (strlen($contact_message) < 1) {
		$error['message'] = "Please enter your message. It should have at least 15 characters.";
	}
   // Subject
	if ($subject == '') { $subject = "Contact Form Submission"; }


   // Set Message
   $message .= "Email from: " . $name . "<br />";
	$message .= "Email address: " . $email . "<br />";
   $message .= "Message: <br />";
   $message .= $contact_message;
   $message .= "<br /> ----- <br /> This email was sent from your site's contact form. <br />";

   // Set From: header
   $from =  $name . " <" . $email . ">";

   // Email Headers
	$headers = "From: " . $from . "\r\n";
	$headers .= "Reply-To: ". $email . "\r\n";
 	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";


   if (!$error) {

      //ini_set("sendmail_from", $siteOwnersEmail); // for windows server
      //$mail = mail($siteOwnersEmail, $subject, $message, $headers);

      $phpmailer = new PHPMailer();
      $phpmailer->isSMTP();
      $phpmailer->SMTPAuth = true;
      $phpmailer->SMTPSecure = 'ssl';
      $phpmailer->Host = 'smtp.gmail.com';
      $phpmailer->Port = '465';
      $phpmailer->isHTML();
      $phpmailer->Username = 'zttechmailer@gmail.com';
      $phpmailer->Password = 'a6a6726v4d2!';
      $phpmailer->SetFrom('no-reply@zachthomas.tech');
      $phpmailer->Subject = 'From: '.$email;
      $phpmailer->Body = $message;
      $phpmailer->AddAddress('zthomas2323@gmail.com');

      $phpmailer->Send();
      $mail = true;

		if ($mail) { echo "OK"; }
      else { echo "Something went wrong. Please try again."; }
		
	} # end if - no validation error

	else {

		$response = (isset($error['name'])) ? $error['name'] . "<br /> \n" : null;
		$response .= (isset($error['email'])) ? $error['email'] . "<br /> \n" : null;
		$response .= (isset($error['message'])) ? $error['message'] . "<br />" : null;
		
		echo $response;

	} # end if - there was a validation error

}

?>
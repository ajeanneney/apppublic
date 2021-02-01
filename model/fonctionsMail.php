<?php

// mail : contact.senior.health.care@gmail.com
// mdp : }eq.BeD&+a5d;]Lh

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../PHPMailer-6.2.0/src/Exception.php';
require '../PHPMailer-6.2.0/src/PHPMailer.php';
require '../PHPMailer-6.2.0/src/SMTP.php';

function sendMail($to, $object, $content){
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->Mailer = "smtp";
	$mail->SMTPDebug  = 0;  
	$mail->SMTPAuth   = TRUE;
	$mail->SMTPSecure = "tls";
	$mail->Port       = 587;
	$mail->Host       = "smtp.gmail.com";
	$mail->Username   = "contact.senior.health.care@gmail.com";
	$mail->Password   = "}eq.BeD&+a5d;]Lh";

	$mail->IsHTML(true);
	$mail->AddAddress($to, $to);
	$mail->SetFrom("contact.senior.health.care@gmail.com", "Senior Health Care");
	$mail->AddReplyTo("contact.senior.health.care@gmail.com", "Senior Health Care");
	$mail->Subject = $object;
	$content = $content;

	$mail->MsgHTML($content); 
	if(!$mail->Send()) {
		echo "Error while sending Email.";
	} else {
	}
}




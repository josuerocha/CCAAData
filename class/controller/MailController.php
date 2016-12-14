<?php
require_once "../class/entity/phpmailer/PHPMailerAutoload.php";
ini_set('default_charset', 'UTF-8');

class MailController{

function SendMail($to,$subject,$message){

	// Configurando o servidor de SMTP
	$mail = new PHPMailer(true);
	$mail->CharSet = 'UTF-8';
	$mail->isHTML(true);
	$mail->isSMTP();

	//$mail->isMail(true);
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 587;
	$mail->SMTPSecure = 'tls';

	$mail->SMTPOptions = array(
		'ssl' => array(
			'verify_peer' => false,
			'verify_peer_name' => false,
			'allow_self_signed' => true
			)
		);

	$mail->SMTPAuth = true;
	$mail->Username = "timoteoccaa@gmail.com";
	$mail->Password = "chucknorris";

	// Email Sending Details
	$mail->addAddress($to);
	$mail->Subject = $subject;
	$mail->msgHTML($message);
	$mail->setFrom("timoteoccaa@gmail.com");

	// Success or Failure
	if (!$mail->send()) {
		$error = "Mailer Error: " . $mail->ErrorInfo;
		echo '<p id="para">'.$error.'</p>';
		return false;
	}
	else {
		echo "<script>alert('E-mail enviado com sucesso!');</script>";
		return true;
	}

}

}
?>
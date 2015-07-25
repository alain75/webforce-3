	<?php

	//envoie un email grâce aux serveurs SMTP de gmail

	/*||||||||||||||||||||||
	Attention :: Il faut maintenant autoriser les apps en se rendant d'abord sur 
	https://www.google.com/settings/security/lesssecureapps
	||||||||||||||||||||||*/

	/*
	ATTENTION : NE PUBLIEZ PAS VOTRE MOT DE PASSE GMAIL DE VOTRE COMPTE PERSO SUR GITHUB !!!!!
	*/

	require ("config.php");
	require ("vendor/autoload.php");

	//instance de PHPMailer
	$mail = new PHPMailer;

	//config de l'envoi
	$mail->isSMTP();
	$mail->setLanguage('fr');
	$mail->CharSet = 'UTF-8';

	//debug
	$mail->SMTPDebug = 0;	//0 pour désactiver les infos de débug
	$mail->Debugoutput = 'html';

	//config du serveur smtp
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 587;
	$mail->SMTPSecure = 'tls';
	$mail->SMTPAuth = true;
	$mail->Username = SMTPUSER;
	$mail->Password = SMTPPASS;

	//qui envoie, et qui reçoit
	$mail->setFrom('accounts@wf3-auth.com', 'WF3 Auth');
	$mail->addAddress('guillaumewf3@gmail.com', 'Guillaume Sylvestre'); //retirer en prod
	$mail->addAddress($email, $username);

	//mail au format HTML
	$mail->isHTML(true); 

	//sujet 
	$mail->Subject = 'Oubli du mot de passe chez WF3 ?';

	//message (avec balises possibles)
	$mail->Body = 
	'<p>Vous avez oublié votre mot de passe ?<br />
	<a href="http://localhost/php/j13/auth/forgot_password_2.php?token='.$randomString.'">
	Cliquez ici pour créer un nouveau mot de passe</a></p>
	<p>Si vous n\'êtes pas à l\'origine de cette demande, vous pouvez ignorer ce message</p>';

	//pièce jointe
	//$mail->addAttachment('panda.gif');

	//send the message, check for errors
	if (!$mail->send()) {
		echo "Mailer Error: " . $mail->ErrorInfo;
	} else {
		echo "Message sent!";
	}

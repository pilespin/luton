<?php

function ft_send_mail($to, $to_name, $from_name, $from_mail, $subject, $message)
{
	$message = "
	<html>
	<head>
	<title>$subject</title>
	</head>
	<body>
	$message
	</body>
	</html>
	";

	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
	$headers .= "To: $to_name <$to>" . "\r\n";
	$headers .= "From: $from_name <$from_mail>" . "\r\n";

	mail($to, $subject, $message, $headers);
}

function ft_send_mail_confirm($login, $mail, $key)
{
	include "config/database.php";

	echo "Please confirm your mail, sent to $mail <br><br>";
	// $content['notif'] .= "Please confirm your mail, sent to $mail"."<br>";


	$url = "$_SERVER[HTTP_ORIGIN]/$FOLDER_ROOT/index.php?r=confirm_mail&key=$key";
	$urltest = "$_SERVER[HTTP_ORIGIN]/$FOLDER_ROOT/index.php?r=confirm_mail&key=$key";
	
	echo " <a href=$urltest>Clic here to activate your account</a> "; //DELETE !!!!!

	$subject = 'Confirm your e-mail for validate your account';

	$message = "Hi $login, <br>
	Please confirm your e-mail for validate your account. <br>
	<p>$url</p>
	";

	ft_send_mail($mail, $login, $MAIL_NAME, $MAIL, $subject, $message);
}

function ft_send_mail_modify_pass($mail, $key)
{
	include "config/database.php";

	// echo "Please confirm your mail, sent to $mail";
	$content['notif'] .= "Please confirm your mail, sent to $mail"."<br>";

	$url = "$_SERVER[HTTP_ORIGIN]/$FOLDER_ROOT/index.php?r=confirmlostpass&key=$key";

	$login = ft_get_login_from_mail($mail);

	$urltest = "$_SERVER[HTTP_ORIGIN]/$FOLDER_ROOT/index.php?r=confirmlostpass&key=$key";

	echo " <a href=$urltest>Clic here to change your password</a> "; //DELETE !!!!!

	$subject = 'Choose a new password';

	$message = "Hi $login, <br>
	Please click on this link for choose a new password. <br>
	<p>$url</p>
	";

	ft_send_mail($mail, $login, $MAIL_NAME, $MAIL, $subject, $message);
}

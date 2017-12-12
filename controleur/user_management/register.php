<?php

include_once "modele/user_management/lib/lib.php";
include_once "modele/user_management/lib/db_conect.php";
include_once "modele/user_management/lib/db_get.php";
include_once "modele/user_management/lib/send_mail.php";
include_once "modele/user_management/lib/check.php";
include_once "config/database.php";

$post = ft_protect_post($_POST);

if (!$post['mail'] || !$post['pass'] || !$post['pass2'] || !$post['login'])
{
	$content['error'] = _("ERROR missing input");
	return ;
}

$mail 		= 	ft_check_mail($post['mail']);
$pass 		= 	ft_check_pass($post['pass']);
$pass2 		= 	ft_check_pass($post['pass2']);
$login 		= 	ft_check_login($post['login']);
$nlogin		= 	ft_get_number_of_this_login($post['login']);
$nmail 		= 	ft_get_number_of_this_mail($post['mail']);
$diff_pass 	= 	strcmp($post['pass'], $post['pass2']);

if ($diff_pass || !$mail || !$pass || !$pass2 || !$login || $nlogin || $nmail)
{
	if ($nlogin && $nmail)
	{
		$content['notif'] .= _("You are already registered")."<br>";
	}
	else
	{
		if ($diff_pass)
			$content['warn'] .= _("Password are not identical")."<br>";
		if ($nlogin)
			$content['warn'] .= _("Login already used")."<br>";
		if ($nmail)
			$content['warn'] .= _("E-mail already used")."<br>";
		if (!$pass)
			$content['warn'] .= _("Bad password please select a less $DB_LENGTH_MIN_PASS and maximum $DB_LENGTH_MAX_PASS caracters")."<br>";
		if (!$login)
			$content['warn'] .= _("Bad login please select a less $DB_LENGTH_MIN_LOGIN caracter <br> and use only letter and digits")."<br>";
		if (!$mail)
			$content['warn'] .= _("Bad e-mail")."<br>";
	}
	return ;
}

try
{
	$db = ft_conect_db();

	$db->beginTransaction();
	$st = $db->prepare("INSERT INTO users(login, grade, mail, pass, mail_confirm, created, updated)
		VALUES (:login, :grade, :mail, :pass, :mail_confirm, NOW(), NOW());"
		);
	$st->bindParam(':login', $post['login']);
	$grade = "user";
	$st->bindParam(':grade', $grade);
	$hash = ft_hash($post['pass']);
	$st->bindParam(':pass', $hash);
	$key = ft_hash("$post[login]".time());
	$st->bindParam(':mail_confirm', $key);
	$st->bindParam(':mail', $post['mail']);
	$st->execute();
	$db->commit();

	ft_send_mail_confirm($post['login'], $post['mail'], $key);
	$content['notif'] .= _("Email Sended")."<br>";
}
catch (Exception $e)
{
	$content['error'] .= _("Unknow Error")."<br>";
}

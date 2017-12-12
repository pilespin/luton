<?php

include_once "modele/user_management/lib/lib.php";
include_once "modele/user_management/lib/db_conect.php";
include_once "modele/user_management/lib/check.php";
include_once "config/database.php";


$post = ft_protect_post($_POST);

$pass 		= 	ft_check_pass($post['pass']);
$pass2 		= 	ft_check_pass($post['pass2']);
$diff_pass 	= 	strcmp($post['pass'], $post['pass2']);

if ($diff_pass || !$pass || !$pass2)
{
	if ($diff_pass)
		$content['error'] .= _("Password are not identical")."<br>";
	if (!$pass)
		$content['error'] .= _("Password is too short please select a less $DB_LENGTH_MIN_PASS caracter")."<br>";
	return ;
}

try
{
	if (ft_check_login_and_pass($_SESSION['login'], $post['oldpass']))
	{
		$db = ft_conect_db();

		$db->beginTransaction();
		$st = $db->prepare("UPDATE users SET pass = :pass , updated = NOW() WHERE login = :login;");
		$st->bindParam(':login', $_SESSION['login']);
		$st->bindParam(':pass', ft_hash($post['pass']));
		$st->execute();
		$db->commit();
		$content['notif'] .= _("Password Changed")."<br>";
	}
	else
	{
		$content['error'] .= _("Bad Old Password")."<br>";
	}
}
catch (Exception $e)
{
	$content['error'] .= _("Unknow Error")."<br>";
}

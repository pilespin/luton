<?php

include_once "modele/user_management/lib/lib.php";
include_once "modele/user_management/lib/db_conect.php";
include_once "modele/user_management/lib/check.php";
include_once "modele/user_management/lib/db_get.php";
include_once "config/database.php";

$post = ft_protect_post($_POST);

try
{
	if (ft_get_number_of_this_key_in_pass_confim($post['key']) == 1)
	{
		$post = ft_protect_post($_POST);

		if (!$post['pass'] || !$post['pass2'])
		{
			$content['error'] .= _("ERROR missing input")."<br>";
			return ;
		}

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

		$db = ft_conect_db();

		$db->beginTransaction();
		$st = $db->prepare("UPDATE users SET pass = :hash, pass_confirm = 'OK' WHERE pass_confirm = :pass_confirm;");
		$st->bindParam(':pass_confirm', $post['key']);
		$hash = ft_hash($post['pass']);
		$st->bindParam(':hash', $hash);
		$st->execute();
		$db->commit();

		$content['notif'] .= _("Password Changed")."<br>";
	}
	else
	{
		$content['warn'] .= _("Password already changed")."<br>";
	}
}
catch (Exception $e)
{
	$content['error'] .= _("Unknow Error")."<br>";
}

<?php

include_once "modele/user_management/lib/lib.php";
include_once "modele/user_management/lib/db_conect.php";
include_once "modele/user_management/lib/send_mail.php";
include_once "modele/user_management/login_validate.php";

$post = ft_protect_post($_POST);

try
{
	if (ft_check_login_and_pass($post['login'], $post['pass']))
	{
		if (ft_get_key_for_reconfirm_mail($post['login']) == "OK")
		{
			$_SESSION['login'] = $post['login'];
			$db = ft_conect_db();

			$db->beginTransaction();
			$st = $db->prepare("UPDATE users SET last_logged = NOW() WHERE login = :login;");
			$st->bindParam(':login', $post['login']);
			$st->execute();
			$db->commit();
			header('Location: index.php');
		}
		else
		{
			$content['notif'] .= _("Email not confirmed")."<br>";
			$key = ft_get_key_for_reconfirm_mail($post['login']);
			ft_send_mail_confirm($post['login'], ft_get_mail_from_login($post['login']), $key);
		}
	}
	else
	{
		$content['error'] .= _("Bad Password")."<br>";
	}
}
catch (Exception $e)
{
	$content['error'] .= _("Unknow Error")."<br>";
}

<?php

include_once "modele/user_management/lib/lib.php";
include_once "modele/user_management/lib/db_conect.php";
include_once "modele/user_management/lib/db_get.php";

$get = ft_protect_post($_GET);

try
{
	if (ft_get_number_of_this_key($get['key']) == 1)
	{
		$db = ft_conect_db();

		$db->beginTransaction();
		$st = $db->prepare("UPDATE users SET mail_confirm = 'OK' , updated = NOW() WHERE mail_confirm = :confirm;");
		$st->bindParam(':confirm', $get['key']);
		$st->execute();
		$db->commit();
		$content['notif'] .= _("Your account are validated")."<br>";
	}
	else
	{
		$content['notif'] .= _("You are already validated this account")."<br>";
	}
}
catch (Exception $e)
{
	$content['error'] .= _("Unknow Error")."<br>";
}

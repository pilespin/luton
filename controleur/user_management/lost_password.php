<?php

include_once "modele/user_management/lib/lib.php";
include_once "modele/user_management/lib/db_conect.php";
include_once "modele/user_management/lib/db_get.php";
include_once "modele/user_management/lib/send_mail.php";

$post = ft_protect_post($_POST);

if (ft_get_number_of_this_mail($post['mail']) == 1)
{
	try
	{
		$db = ft_conect_db();

		$db->beginTransaction();
		$key = ft_hash("$post[mail]".time());
		$st = $db->prepare("UPDATE users SET pass_confirm = :hash WHERE mail = :mail;");
		$st->bindParam(':mail', $post['mail']);
		$st->bindParam(':hash', $key);
		$st->execute();
		$db->commit();
		ft_send_mail_modify_pass($post['mail'], $key);

		$content['notif'] .= _("e-Mail has been sended")."<br>";
	}
	catch (Exception $e)
	{
		$content['error'] .= _("Unknow Error")."<br>";
	}
}
else
{
	$content['error'] .= _("Bad e-Mail")."<br>";
}

<?php

include_once "modele/user_management/lib/lib.php";
include_once "modele/user_management/lib/db_conect.php";
include_once "modele/user_management/lib/check.php";
include_once "modele/user_management/lib/db_get.php";

$post = ft_protect_post($_POST);

$mail 		= 	ft_check_mail($post['mail']);
$nmail 		= 	ft_get_number_of_this_mail($post['mail']);

if (!$mail || $nmail)
{
	if ($nmail)
		$content['error'] .= _("E-mail already used")."<br>";
	if (!$mail)
		$content['error'] .= _("Bad e-mail")."<br>";
	return ;
}

try
{
	$db = ft_conect_db();

	$db->beginTransaction();
	$st = $db->prepare("UPDATE users SET mail = :mail , updated = NOW() WHERE login = :login;");
	$st->bindParam(':login', $_SESSION['login']);
	$st->bindParam(':mail', $post['mail']);
	$st->execute();
	$db->commit();
	$content['notif'] .= _("E-mail Changed")."<br>";

}
catch (Exception $e)
{
	$content['error'] .= _("Unknow Error")."<br>";
}

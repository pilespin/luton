<?php

include_once "modele/user_management/lib/lib.php";
include_once "modele/user_management/lib/db_conect.php";

///////////////////////////////////////////////////////
if (!isset($_SESSION['login'])) {
	echo "<meta http-equiv='refresh' content='0; url=index.php' />";
	return;
}
///////////////////////////////////////////////////////

$post = ft_protect_post($_POST);
// print_r($post);

if (ifset($post[article]) && ifset($post[promotion]))
{
	try
	{
		$db = ft_conect_db();

		$db->beginTransaction();
		$st = $db->prepare("INSERT INTO promo(login, article, promotion, agemin, agemax, nationality, sex, created)
			VALUES (:login, :article, :promotion, :agemin, :agemax, :nationality, :sex, NOW());"
		);
		$st->bindParam(':login', $_SESSION['login']);
		$st->bindParam(':article', $post[article]);
		$st->bindParam(':promotion', $post[promotion]);
		$st->bindParam(':agemin', $post[agemin]);
		$st->bindParam(':agemax', $post[agemax]);
		$st->bindParam(':nationality', $post[nationality]);
		$st->bindParam(':sex', $post[sex]);

		$st->execute();
		$db->commit();
		$content['notif'] .= _("Promotion added")."<br>";

	}
	catch (Exception $e)
	{
		// var_dump($e);
		$content['error'] .= _("Unknow Error")."<br>";
	}
}
else
{
	$content['error'] .= _("Missing input")."<br>";
}

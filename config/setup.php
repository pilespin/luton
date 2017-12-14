<?php

include "database.php";

try
{
	$db = new PDO($DB_DSN_CREATE, $DB_USER, $DB_PASSWORD);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$db->beginTransaction();
	$st = $db->prepare("CREATE DATABASE $DB_NAME;
		USE $DB_NAME;
		CREATE TABLE users(
			id int UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL UNIQUE,
			login varchar($DB_LENGTH_MAX_LOGIN) NOT NULL UNIQUE,
			grade varchar($DB_LENGTH_MAX_LOGIN) NOT NULL,
			parrain varchar($DB_LENGTH_MAX_LOGIN),
			mail varchar($DB_LENGTH_MAX_EMAIL) NOT NULL UNIQUE,
			pass varchar($DB_LENGTH_MAX_PASS) NOT NULL,
			mail_confirm varchar($DB_LENGTH_MAX_HASH) NOT NULL,
			pass_confirm varchar($DB_LENGTH_MAX_HASH),
			last_logged DATETIME,
			ip varchar($DB_LENGTH_MAX_LOGIN),
			user_agent varchar($DB_LENGTH_MAX_LOGIN),
			created DATETIME,
			updated DATETIME
			);

			CREATE TABLE promo(
			id int UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL UNIQUE,
			login varchar($DB_LENGTH_MAX_LOGIN),
			article varchar($DB_LENGTH_MAX_LOGIN),
			promotion varchar($DB_LENGTH_MAX_LOGIN),
			agemin varchar($DB_LENGTH_MAX_LOGIN),
			agemax varchar($DB_LENGTH_MAX_LOGIN),
			nationality varchar($DB_LENGTH_MAX_LOGIN),
			sex varchar($DB_LENGTH_MAX_LOGIN),
			created DATETIME
			);

			INSERT INTO users(login, grade, mail, parrain, pass, mail_confirm, created, updated)
			VALUES ('batman', 'admin', 'batm@an.joker', 'Robin', '0dfb355e03ffb673d595097cc52aaf011e9494e095089b5639f1d8b2719e8150e4c618c7eb6be328e14522cdc4a25a083dd5c27a63bb7a43099f1a1646b5a64bf0', 'OK', NOW(), NOW());

	");
	$st->execute();
	echo "Database created<br><br>";

}
catch (Exception $e)
{
	try
	{
		$db = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$db->beginTransaction();
		$st = $db->prepare("DROP DATABASE $DB_NAME;");
		$st->execute();
		echo "Database \"$DB_NAME\" deleted. ";
		include "setup.php";
	}
	catch (Exception $e)
	{
		echo "ERROR create Database<br><br>";
		echo $e->getMessage();
		echo "<br><br>";
		var_dump($e);
		echo "<br><br>";
	}
}

?>

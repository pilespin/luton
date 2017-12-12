<?php

function ft_conect_db()
{
	include "config/database.php";

	$db = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	return($db);
}

function ft_request_db($query)
{
	try
	{
		$db = ft_conect_db();

		$db->beginTransaction();
		$st = $db->prepare($query);
		$st->execute();
		return ($st);
	}
	catch (Exception $e)
	{
		return (FALSE);
	}
}

function ft_request_db_without_exec($query)
{
	$db = ft_conect_db();

	$db->beginTransaction();
	$st = $db->prepare($query);
	return ($st);
}

function ft_hash($pass)
{
	return (hash('sha512', hash('whirlpool', $pass)."f6b49smd5")."f0");
}

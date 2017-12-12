<?php

function ft_check_mail($mail)
{
	include "config/database.php";
	$len = strlen($mail);
	if ($len >= $DB_LENGTH_MIN_EMAIL && $len <= $DB_LENGTH_MAX_EMAIL &&
		preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-zA-Z]{2,5}$/", $mail))
		return (TRUE);
	else
		return (FALSE);
}

function ft_check_pass($pass)
{
	include "config/database.php";
	$len = strlen($pass);
	if ($len >= $DB_LENGTH_MIN_PASS && $len <= $DB_LENGTH_MAX_PASS)
		return (TRUE);
	else
		return (FALSE);
}

function ft_check_login($login)
{
	include "config/database.php";
	$len = strlen($login);
	if ($len >= $DB_LENGTH_MIN_LOGIN && $len <= $DB_LENGTH_MAX_LOGIN &&
		preg_match("/^[a-zA-Z0-9]*$/", $login))
		return (TRUE);
	else
		return (FALSE);
}

function ft_check_login_and_pass($login, $pass)
{
	$st = ft_request_db_without_exec("SELECT pass FROM users WHERE login = :login AND pass = :pass;");
	$hash = ft_hash($pass);
	$st->bindParam(':login', $login);
	$st->bindParam(':pass', $hash);
	$st->execute();

	$pass = $st->rowCount();
	if ($pass == 1)
		return (TRUE);
	else
		return (FALSE);
}

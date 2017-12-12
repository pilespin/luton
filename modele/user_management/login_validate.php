<?php

function ft_check_login_and_pass($login, $pass)
{
	$st = ft_request_db_without_exec("SELECT pass FROM users WHERE login = :login AND pass = :pass;");
	$st->bindParam(':login', $login);
	$hash = ft_hash($pass);
	$st->bindParam(':pass', $hash);
	$st->execute();

	$pass = $st->rowCount();
	if ($pass == 1)
		return (TRUE);
	else
		return (FALSE);
}

function ft_get_key_for_reconfirm_mail($login)
{
	$st = ft_request_db_without_exec("SELECT mail_confirm FROM users WHERE login = :login;");
	$st->bindParam(':login', $login);
	$st->execute();
	$res = $st->fetch()[0];
	return ($res);
}

function ft_get_mail_from_login($login)
{
	$st = ft_request_db_without_exec("SELECT mail FROM users WHERE login = :login;");
	$st->bindParam(':login', $login);
	$st->execute();
	if ($st)
		return($st->fetch()[0]);
	else
		return (FALSE);
}
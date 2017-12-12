<?php

function ft_get_number_of_this_login($login)
{
	$st = ft_request_db_without_exec("SELECT pass FROM users WHERE login = :login;");
	$st->bindParam(':login', $login);
	$st->execute();

	if ($st)
		return ($st->rowCount());
	else
		return (FALSE);
}

function ft_get_number_of_this_mail($mail)
{
	$st = ft_request_db_without_exec("SELECT * FROM users WHERE mail = :mail;");
	$st->bindParam(':mail', $mail);
	$st->execute();

	if ($st)
		return ($st->rowCount());
	else
		return (FALSE);
}

function ft_get_number_of_this_key($mail_confirm)
{
	$st = ft_request_db_without_exec("SELECT * FROM users WHERE mail_confirm = :mail_confirm;");
	$st->bindParam(':mail_confirm', $mail_confirm);
	$st->execute();
	
	if ($st)
		return ($st->rowCount());
	else
		return (FALSE);
}

function ft_get_login_from_mail($mail)
{
	$st = ft_request_db_without_exec("SELECT login FROM users WHERE mail = '$mail';");
	$st->bindParam(':mail', $mail);
	$st->execute();
	
	if ($st)
		return($st->fetch()[0]);
	else
		return (FALSE);
}

function ft_get_number_of_this_key_in_pass_confim($pass_confirm)
{
	$st = ft_request_db_without_exec("SELECT * FROM users WHERE pass_confirm = :pass_confirm';");
	$st->bindParam(':pass_confirm', $pass_confirm);
	$st->execute();
	
	if ($st)
		return ($st->rowCount());
	else
		return (FALSE);
}

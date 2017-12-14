<?php

include_once "modele/user_management/lib/lib.php";
include_once "modele/user_management/lib/db_conect.php";
include_once "modele/user_management/lib/db_get.php";

function db_get_allPromo()
{	
	$st = ft_request_db_without_exec("SELECT * FROM promo;");
	$st->execute();
	
	if ($st)
	{
		return ($st->fetchAll());
	}
	else
		return (FALSE);
}
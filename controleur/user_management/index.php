<?php

if (isset($_GET['r']))
	$tmp = $_GET['r'];
else
	$tmp = NULL;

if ($tmp == "login_validate")
	include_once('controleur/user_management/login_validate.php');
else if ($tmp == "register")
	include_once('controleur/user_management/register.php');
else if ($tmp == "lostpass")
	include_once('controleur/user_management/lost_password.php');
else if ($tmp == "confirmlostpass")
	include_once('controleur/user_management/confirm_pass.php');
else if ($tmp == "confirmlostpassvalidate")
	include_once('controleur/user_management/confirm_pass_validate.php');
else if ($tmp == "logout")
	include_once('controleur/user_management/logout.php');
else if ($tmp == "confirm_mail")
	include_once('controleur/user_management/confirm_mail.php');
else if ($tmp == "changemail")
	include_once('controleur/user_management/change_email.php');
else if ($tmp == "changepass")
	include_once('controleur/user_management/change_password.php');

// ob_start();

include_once "modele/user_management/lib/lib.php";

include_once('controleur/user_management/header.php');


include_once('vue/user_management/index.php');

<?php

include_once "modele/user_management/lib/lib.php";

$LOG_FILE = "log";

$str = "";
if (ifset($time_to_page_start))
	$str .= "[$time_to_page_start],	";
if (ifset($_SERVER['REMOTE_ADDR']))
	$str .= "ip [$_SERVER[REMOTE_ADDR]],	";
if (ifset($_SERVER['HTTP_X_FORWARDED_FOR']))
	$str .= "[$_SERVER[HTTP_X_FORWARDED_FOR],	";
if (ifset($_SESSION['login']))
	$str .= "login [$_SESSION[login]],	";
if (ifset($_SERVER['REQUEST_URI']))
	$str .= "uri [$_SERVER[REQUEST_URI]],	";
if (ifset($_SERVER['HTTP_USER_AGENT']))
	$str .= "usr_ag [$_SERVER[HTTP_USER_AGENT]],	";
if (strlen($str) > 1)
	file_put_contents($LOG_FILE , "$str\n", FILE_APPEND);

$content['notif'] = NULL;
$content['error'] = NULL;
$content['warn'] = NULL;

// $language = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
// $language = $language{0}.$language{1};
// if ($language == "fr" || 1==1)
// // if ($language == "fr")
// {
// 	putenv('LC_ALL=fr_FR.utf8');
// 	setlocale(LC_ALL, 'fr_FR.utf8');
// 	bindtextdomain("fr", "./locale");
// 	textdomain("fr");
// }

// print_r($_SESSION);
// echo $_SERVER['HTTP_USER_AGENT'];

$get = ft_protect_post($_GET);

if (isset($get['r']))
	$tmp = $get['r'];
else
	$tmp = NULL;

include_once('controleur/sidebar/index.php');
include_once('controleur/user_management/index.php');
include_once('controleur/shop/index.php');
include_once('controleur/game/index.php');


// if ($tmp == NULL)
	// include_once('vue/template_home.php');
// else
include_once('vue/template_default.php');

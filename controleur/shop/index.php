<?php

include_once "modele/shop/index.php";


if (isset($_GET['r']))
	$tmp = $_GET['r'];
else
	$tmp = NULL;

if ($tmp == "add_promotion")
	include_once('controleur/shop/addpromo.php');
else if ($tmp == "convert_qr")
	include_once('controleur/shop/convertqr.php');
else if ($tmp == "show_converted")
	include_once('controleur/shop/show_converted.php');
else if ($tmp == "get_discount")
	include_once('controleur/shop/get_discount.php');
else if ($tmp == "addpromo_validate")
	include_once('controleur/shop/addpromo_validate.php');
else if ($tmp == "")
	include_once('home.php');

include_once('vue/shop/index.php');

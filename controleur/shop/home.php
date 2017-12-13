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
else
	include_once('home.php');



include_once('vue/shop/index.php');

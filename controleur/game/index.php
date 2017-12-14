<?php

include_once "modele/game/index.php";


if (isset($_GET['r']))
	$tmp = $_GET['r'];
else
	$tmp = NULL;

if ($tmp == "game")
	include_once('controleur/game/home.php');


include_once('vue/game/index.php');


<?php
session_start();

include_once "modele/user_management/lib/lib.php";

$time_to_page_start = get_time();

include_once("controleur/index.php");

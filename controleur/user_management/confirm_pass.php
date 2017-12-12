<?php

include_once "modele/user_management/lib/lib.php";
include_once "modele/user_management/lib/db_conect.php";
include_once "modele/user_management/lib/db_get.php";

$get = ft_protect_post($_GET);

try
{
	if (ft_get_number_of_this_key_in_pass_confim($get['key']) == 1)
	{
    $_SESSION['key'] = $get['key'];
  }
  else
  {
    $content['warn'] .= _("You are already changed your password")."<br>";
  }
}
catch (Exception $e)
{
  $content['error'] .= _("Unknow Error")."<br>";
}

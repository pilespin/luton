<?php
$_SESSION['login'] = "";
session_destroy();
$content['notif'] .= _("Successfully Logout")."<br>";

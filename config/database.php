<?php

$DB_NAME = 'flybnb';
$FOLDER_ROOT = '';

$DB_DSN = "mysql:host=localhost;dbname=$DB_NAME";
$DB_DSN_CREATE = 'mysql:host=localhost';

$DB_USER = 'root';
$DB_PASSWORD = 'superpassword.';

$MAIL = 'registration@flybnb.io';
$MAIL_NAME = 'Claire de Flybnb';

$MAX_FILE_SIZE			= 200000000;

$DB_LENGTH_MAX_HASH		= 255;

$DB_LENGTH_MIN_LOGIN	= 2;
$DB_LENGTH_MAX_LOGIN	= 255;

$DB_LENGTH_MIN_NAME		= 2;
$DB_LENGTH_MAX_NAME		= 120;

$DB_LENGTH_MIN_PASS		= 2;
$DB_LENGTH_MAX_PASS		= 255;

$DB_LENGTH_MIN_EMAIL	= 3;
$DB_LENGTH_MAX_EMAIL	= 255;

?>

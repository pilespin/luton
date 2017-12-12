<?php

function ft_protect_post($array)
{
	$tab = $array;
	foreach ($tab as $key => $value) {
		$tab[$key] = htmlspecialchars($value);
	}
	return ($tab);
}

function get_time()
{
	$tim = microtime();
	$tab = explode(" ", $tim);
	$tmp = str_replace("0.", "", $tab[0]);
	return ("$tab[1].$tmp");
}

function wait_for_at_least($start, $sec)
{
	if (!$sec)
		return (get_time() - $start);
	$time = 0;
	while ($time < $sec)
	{
		usleep(10000);
		$end = get_time();
		$time = $end - $start;
	}
	return $time;
}

function sec_beetwen_two_date($debut, $fin)
{
	$ret = strtotime($fin) - strtotime($debut);
	return ($ret);
}

function add_to_notif($content, $text)
{
	if ($content)
		$ret = "$content<br>$text";
	else
		$ret = "$text";
	return ($ret);
}

function ifset(&$mixed)
{
	return (isset($mixed)) ? $mixed : null;
}

class Date
{
	var $thedate;
	function __construct($date) {
		$this->thedate = $date;
	}
	function getAll() {
		return ($this->thedate);
	}
	function getDays() {
		$ret = explode(" ", $this->thedate);
		return ($ret[0]);
	}
	function getHours() {
		$ret = explode(" ", $this->thedate);
		return ($ret[1]);
	}
	function getYear() {
		$ret = explode("-", $this->getDays());
		return ($ret[0]);
	}
	function getMonth() {
		$ret = explode("-", $this->getDays());
		return ($ret[1]);
	}
	function getDay() {
		$ret = explode("-", $this->getDays());
		return ($ret[2]);
	}
	function getHour() {
		$ret = explode(":", $this->getHours());
		return ($ret[0]);
	}
	function getMin() {
		$ret = explode(":", $this->getHours());
		return ($ret[1]);
	}
	function getSec() {
		$ret = explode(":", $this->getHours());
		return ($ret[2]);
	}
}

function get_current_page()
{
	if (isset($_GET['r']))
		$tmp = $_GET['r'];
	else
		$tmp = NULL;
	$_SESSION['current_page'] = $tmp;
	return ($tmp);
}

function get_login() {
	if (ifset($_SESSION['login'])) {
		return (strtolower($_SESSION['login']));
	}
	return (null);
}

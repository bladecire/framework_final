<?php
	$time=microtime();
	error_reporting(E_ALL);
	ini_set('display_errors','1');
	include 'constants.php';
	require 'sys/helper.php';

	$conf=Registry::getInstance();
	$conf->init();
	if (!file_exists('.deployed')){$conf->deployed='false';}
	Session::init();
	$conf->time;
	Core::init();
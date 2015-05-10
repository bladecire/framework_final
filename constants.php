<?php
	function base($str){if($str=='//'){return '/';}else{return $str;}}
	define('DS',DIRECTORY_SEPARATOR);
	define('ROOT',realpath(dirname(__FILE__)).DS);
	define('APP',ROOT.'app'.DS);
	$app_w=dirname($_SERVER['PHP_SELF']).DS;
    define ('APP_W',base($app_w));

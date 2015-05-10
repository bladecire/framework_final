<?php
	class Core{

		static private $controller;
		static private $action;
		static private $params=array();
		static private $conf;

		static function init(){
			
			self::$conf=Registry::getInstance();
			Request::retrieve();
			self::$controller=Request::getCont();
			self::$action=Request::getAct();
			self::$params=Request::getParam();


			self::router();
		}
		static function router(){
			$route=(self::$controller!="")?self::$controller:'home';
			$action=(self::$action!="")?self::$action:'home';
			if (self::$conf->deployed=='false'){
				$route='install';
			}

			
			$fileroute=strtolower($route).'.php';
			if(is_readable(APP.'controllers'.DS.$fileroute)){
				self::$controller=new $route(self::$params);

				if (is_callable(array(self::$controller,$action))){
					call_user_func(array(self::$controller, $action));
				}else{ 
					echo "Unexistent method!";
				}
			}
			else{
				self::$controller=new Error;
			}
		}
	}
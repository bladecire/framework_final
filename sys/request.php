<?php
	class Request{
		static private $query=array();

		static function retrieve(){
			$array_query=explode('/',$_SERVER['REQUEST_URI']);
			array_shift($array_query);
			if (!is_base()){array_shift($array_query);}
			if (end($array_query)==""){array_pop($array_query);}
			self::$query=$array_query;
		}

		static function getCont(){
			return array_shift(self::$query);
		}

		static function getAct(){
			return array_shift(self::$query);
		}

		static function getParam(){
			if ((count(self::$query))%2==0){return self::$query;}else{echo 'Error, los parametros y los valores deben ser impares';exit;}
		}

	}
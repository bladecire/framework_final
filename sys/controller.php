<?php

	class Controller {
		protected $model;
		protected $view;
		protected $params;
		protected $conf;
		function __construct($params){
			$this->params=$params;
			      // var_dump($this->params);
      			// echo "***************2<br>";

			$this->conf=Registry::getInstance();
		}

		function ajax_set($output){
			ob_clean();
			$resp=json_encode($output);
			echo $resp;
		}
	}


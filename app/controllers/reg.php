<?php

/**
* Controlador reg
*
* Este controlador solo sirve para cargar la vista del formulario de registrar usuario
*/
	class Reg extends Controller{
		
		function __construct(){
			parent::__construct($this->params);
			$this->conf=Registry::getInstance();

			$this->model=new mReg;
			$this->view=new vReg;
		}
		function home(){
						echo "Pagina generadada en ".(microtime() - $this->conf->time)." segundos";

			
			
		}
	}
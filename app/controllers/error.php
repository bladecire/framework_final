<?php
/**
 * Controlador Error
 *
 * Gestiona los errores producidos
 */
	final class Error extends Controller{
		function __construct($params=null){
			parent::__construct($params);
			$this->conf=Registry::getInstance();

			$this->model=new mError;
			$this->view=new vError;
		}
		function home(){
			
			echo "Se ha producido un error";
			
		}
	}
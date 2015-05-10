<?php

/**
 * Controlador Install
 * Se encarga de crear la base de datos.
 */
	final class Install extends Controller{
		
		function __construct($params){
			parent::__construct($params);
			$this->conf=Registry::getInstance();

			$this->model=new mInstall($params);
			$this->view=new vInstall;
		}
		function home(){
			/**
			 * Acción por defecto
			 */
			
		}
		function create(){
			/**
			 * [$dbname Recibe el nombre de la base de datos por POST]
			 * Crea el fichero .deployed el cual es usado para verificar si la base de datos está creada o no.
			 */
			$dbname=$_POST['dbname'];
			if ($this->model->create($dbname)){
				//create file .deployed
				$fp = fopen(ROOT.'.deployed', 'w');
				// and redirects to home
				echo '<meta http-equiv="refresh" content="0; URL='.APP_W.'home/">';
				//header('location: '.APP_W.'home');
			};
			
		}
	}
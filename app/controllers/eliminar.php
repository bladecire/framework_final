<?php
/**
 * Controlador Eliminar
 *
 * Se encarga de borrar el usuario indicado
 */
class Eliminar extends Controller{
	function __construct(){
		parent::__construct($this->params);
		$this->conf=Registry::getInstance();
		$this->model=new mEliminar;
		$this->view=new vEliminar;
	}
	
	function home(){

		/**
		* Se ejecuta por defecto
		*
		* @return Muestra el tiempo de carga
		*/
	
		echo "Pagina generadada en ".(microtime() - $this->conf->time)." segundos";	
	}

	function eliminar(){
		/**
		* Método que se encarga de eliminar usuarios
		*
		* @param $_POST['nusuario'],$_POST['password']
		* @return Elimina de la base de datos el usuario que coincida con los parametros pasados por POST
		*/
		if(isset($_POST['nusuario'])){ 
			$nusuario=filter_input(INPUT_POST, 'nusuario', FILTER_SANITIZE_STRING);
			$password=filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
			$user=$this->model->eliminar($nusuario,$password);
			if ($user==TRUE){
			header('Location:'.APP_W.'eliminar');
			}
			else{
			header('Location:'.APP_W.'error');
			}
		}
	}
}
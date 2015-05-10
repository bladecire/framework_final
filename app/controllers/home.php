<?php

	/**
	* Controlador Home
	* Gestiona todo lo que pasa en el index
	*/
	final class home extends Controller{
		function __construct($params){
			parent::__construct($params);
			$this->conf=Registry::getInstance();
			$this->model=new mHome($params);
			$this->view=new vHome;
		}

		function home(){
			/**
			* Método por defecto. Muestra el tiempo de carga de la página.
			*
			*/

			//we can comprove that we pass the parameters
			// var_dump($this->params);
			// echo "   Action<br>";
			// Coder::code_var($this->params);
			// echo "-------------<br>";
			// //Accedim a valors de configuració
			// Coder::code_var($this->model->get_out());
			echo "Pagina generadada en ".(microtime() - $this->conf->time)." segundos";
		}
		function login(){
			/**
			* Trata los valores pasados por POST para hacer el login
			*
			* @param $_POST['usuario'] $_POST['password']
			* @return Si es válido el acceso devuelve al usuario a la home pero con la sesión iniciada.
			* Si no es válido el acceso lleva al usuario al formulario de registro de usuario.
			*/

			if(isset($_POST['usuario'])){
	         $nusuario=filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
	         $password=filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
	         $user=$this->model->login($nusuario,$password);
	         if ($user== TRUE){
	               header('Location:'.APP_W.'login/home');
	         }
	         else{
	               header('Location:'.APP_W.'reg');
	             }
	  		  }
		}

		function salir(){
			/**
			 * Hace un logout de la sesión.
			 */
			session_destroy();
			header('Location:'.APP_W.'home/home');
		}
	}
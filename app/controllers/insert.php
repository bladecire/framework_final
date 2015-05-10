<?php

/**
* Controlador Insert
*
* Se encarga de los inserts de usuarios
*/

final class insert extends Controller{
	
	function __construct($params){
		parent::__construct($params);
		$this->conf=Registry::getInstance();
		$this->model=new minsert;
		$this->view=new vinsert;
	}

	function home(){
		/**
		 * Método por defecto que muestra el tiempo de carga
		 */
		echo "Pagina generadada en ".(microtime() - $this->conf->time)." segundos";
	}

	function insert(){

		/**
		* Método encargado de hacer el insert del usuario
		*
		* Utiliza la función filter_input de PHP para limpiar las cadenas y una vez tratadas llama al metodo insert del modelo Insert que se encargará de hacer la inserción.
		* 
		* @param Recibe por $_POST los valores: NombreCompania,NombreContacto,DNI,Email,CargoContacto,Direccion,Ciudad,Region,CodPostal,Pais,Telefono,Fax,Usuario,Password,Rol.
		* @return Si ha podido hacer el insert devuelve al usuario a la home, si no, muestra un error.
		*/

		if(isset($_POST['submitted'])){ 

			$NombreCompania = filter_input(INPUT_POST,'NombreCompania',FILTER_SANITIZE_STRING);
			$NombreContacto = filter_input(INPUT_POST,'NombreContacto',FILTER_SANITIZE_STRING);
			$DNI = filter_input(INPUT_POST,'DNI',FILTER_SANITIZE_STRING);
			$Email = filter_input(INPUT_POST,'Email',FILTER_SANITIZE_STRING);
			$CargoContacto = filter_input(INPUT_POST,'CargoContacto',FILTER_SANITIZE_STRING);
			$Direccion = filter_input(INPUT_POST,'Direccion',FILTER_SANITIZE_STRING);
			$Ciudad = filter_input(INPUT_POST,'Ciudad',FILTER_SANITIZE_STRING);
			$Region = filter_input(INPUT_POST,'Region',FILTER_SANITIZE_STRING);
			$CodPostal = filter_input(INPUT_POST,'CodPostal',FILTER_SANITIZE_STRING);
			$Pais = filter_input(INPUT_POST,'Pais',FILTER_SANITIZE_STRING);
			$Telefono = filter_input(INPUT_POST,'Telefono',FILTER_SANITIZE_STRING);
			$Fax = filter_input(INPUT_POST,'Fax',FILTER_SANITIZE_STRING);
			$Usuario = filter_input(INPUT_POST,'Usuario',FILTER_SANITIZE_STRING);
			$Password = filter_input(INPUT_POST,'Password',FILTER_SANITIZE_STRING);
			$Rol = filter_input(INPUT_POST,'Rol',FILTER_SANITIZE_STRING);

			$user=$this->model->insert($NombreCompania,$NombreContacto,$DNI,$Email,$CargoContacto,$Direccion,$Ciudad,$Region,$CodPostal,$Pais,$Telefono,$Fax,$Usuario,$Password,$Rol);

			if ($user==TRUE){
				header('Location:'.APP_W.'insert/home');
			}
			else{
				header('Location:'.APP_W.'error');
			}
		}

	}

}
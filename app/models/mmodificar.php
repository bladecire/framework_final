<?php 

/**
* Modelo mModificar
*
* Este modelo se encarga de comunicarse con la base de datos para modificar usuarios
*/
final class mModificar extends Model{
  // function __construct(){
  //   parent::__construct();
  // }

    
    function __construct($params)
    {
        parent::__construct($params);
        $this->db       = DB::singleton();
        $this->data_out = $params;
    }  

    function get_out()
    {
        return $this->data_out;
    }
    

  function modificar($NombreCompania,$NombreContacto,$DNI,$Email,$CargoContacto,$Direccion,$Ciudad,$Region,$CodPostal,$Pais,$Telefono,$Fax,$Usuario,$Password,$Rol){
    
    /**
     * Este método ejecuta la sentencia update usuario.
     * @param $NombreCompania,$NombreContacto,$DNI,$Email,$CargoContacto,$Direccion,$Ciudad,$Region,$CodPostal,$Pais,$Telefono,$Fax,$Usuario,$Password,$Rol
     * @return Si se ha ejecutado con éxito devuelve TRUE, sino FALSE.
     */

    try{
      $consulta = "SELECT idCliente FROM clientes WHERE dni='$DNI' AND email='$Email'";
      $procesar = $this->db->prepare($consulta);
      $procesar->execute();
      $fila = $procesar->fetch();
      $Cliente = $fila['idCliente'];

      $consulta = "UPDATE userweb SET usuario='$Usuario',password='$Password',rol='$Rol' WHERE idCliente='$Cliente'";
      $procesar = $this->db->prepare($consulta);
      $procesar->execute();


      $sql = "UPDATE clientes SET ";
      $vector = array($NombreCompania,$NombreContacto,$CargoContacto,$Direccion,$Ciudad,$Region,$CodPostal,$Pais,$Telefono,$Fax,$DNI,$Email);          
      $vector2 = array('NombreCompania','NombreContacto','CargoContacto','Direccion','Ciudad','Region','CodPostal','Pais','Telefono','Fax','dni','email');
      $max    = sizeof($vector);
      for ($i = 1; $i <= $max; $i++) {
        if ($i != $max) {
          $sql .=  $vector2[$i - 1] . "="."'";
          $sql .=  $vector[$i - 1] ."'".",";
        } else {
          $sql .=  $vector2[$i - 1] . "='";
          $sql .=  $vector[$i - 1] . "' WHERE idCliente='".$Cliente."';";
        }
      }

      $sentencia2 = $this->db->prepare($sql);
      $sentencia2->execute();

      if($sentencia2->rowCount() == 1){
        return TRUE;
      }
      else {
        return FALSE;
      }
    }catch(PDOException $e){
      echo "Error:".$e->getMessage();
    }
  }
}
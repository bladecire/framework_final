<?php

/**
* Modelo mEliminar
*
* Este modelo se encarga de comunicarse con la base de datos para eliminar usuarios
*/

class mEliminar extends Model{

  function eliminar($nusuario,$password){

    /**
     * Este método ejecuta la sentencia delete.
     * @param $nusuario, $password
     * @return Si se ha ejecutado con éxito devuelve TRUE, sino FALSE.
     */
    try{
      $sql = "DELETE FROM userweb WHERE usuario = ? AND password =?";
      $query=$this->db->prepare($sql);
      $query->bindParam(1,$nusuario);
      $query->bindParam(2,$password);
      $query->execute();

      if($query->rowCount()==1){
        return TRUE;
      }
      else 
      {
        return FALSE;
      }
    }catch(PDOException $e){
      echo "Error:".$e->getMessage();
    }
  }	
}
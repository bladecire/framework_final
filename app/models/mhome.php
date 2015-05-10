<?php

/**
* Modelo mHome
*
* Este modelo se comunica con la base de datos para hacer los inserts de usuarios.
*/

final class mHome extends Model
{
    
    function __construct($params)
    {
        parent::__construct($params);
        $this->db       = DB::singleton();
        // a litle prove in--->out
        $this->data_out = $params;
    }

    function get_out()
    {
        return $this->data_out;
    }
    
    public function rol($nusuario)
    {
        /**
         * Este metodo obtiene el rol del usuario
         */
        try {
            $sql   = "SELECT rol FROM userweb WHERE usuario=? ";
            $query = $this->db->prepare($sql);
            $query->bindParam(1, $nusuario);
            $query->execute(); //fetch per rol

            if ($query->rowCount() == 1) {
                $fetch           = $query->fetchColumn();
                $_SESSION['rol'] = $fetch;
                return TRUE;
            } else {
                $_SESSION['rol'] = "Error";
                return FALSE;
            }
        }
        catch (PDOException $e) {
            echo "Error:" . $e->getMessage();
        }
        
    }
    
    
    function login($nusuario, $password)
    {

        /**
         * Este metodo hace el login
         *
         * @param $_POST : usuario, password
         * @return devuelve true si el login es correcto, false en caso contrario.
         */
        try {
            $sql   = "SELECT * FROM userweb WHERE usuario=? AND password=?";
            $query = $this->db->prepare($sql);
            $query->bindParam(1, $nusuario);
            $query->bindParam(2, $password);
            $query->execute(); //fetch per rol
            if ($query->rowCount() == 1) {
                
                $_SESSION['user']  = $_REQUEST['usuario'];
                $_SESSION['email'] = $_REQUEST['password'];
                $this->rol($nusuario);
                return TRUE;
                
            } else {
                return FALSE;
            }
        }
        catch (PDOException $e) {
            echo "Error:" . $e->getMessage();
        }
    }
    
   
    
}
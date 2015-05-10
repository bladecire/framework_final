<?php

/**
* Modelo Insert
*
* Este modelo se comunica con la base de datos para hacer los inserts de usuarios.
*/

class mInsert extends Model
{
    function __construct(){parent::__construct();}

    function insert($NombreCompania,$NombreContacto,$DNI,$Email,$CargoContacto,$Direccion,$Ciudad,$Region,$CodPostal,$Pais,$Telefono,$Fax,$Usuario,$Password,$Rol)
    {

    /**
     * Este método ejecuta la sentencia insert.
     * @param $NombreCompania,$NombreContacto,$DNI,$Email,$CargoContacto,$Direccion,$Ciudad,$Region,$CodPostal,$Pais,$Telefono,$Fax,$Usuario,$Password,$Rol
     * @return Si se ha ejecutado con éxito devuelve TRUE, sino FALSE.
     */

        try {
            $sql    = "INSERT INTO clientes VALUES (NULL,";
            $vector = array($NombreCompania,$NombreContacto,$CargoContacto,$Direccion,$Ciudad,$Region,$CodPostal,$Pais,$Telefono,$Fax,$DNI,$Email);
            $max    = sizeof($vector);

            for ($i = 1; $i <= $max; $i++) {
                $sql .= "'" . $vector[$i - 1] . "'";
                if ($i != $max) {$sql .= ",";} else {$sql .= ")";}
            }

            $query = $this->db->prepare($sql);
            $query->execute();

            if ($query->rowCount() == 1) {

                try{
                    $sql    = "INSERT INTO userweb VALUES (NULL,";
                    $consulta = "SELECT idCliente FROM clientes WHERE dni='$DNI' AND email='$Email'";
                    $procesar = $this->db->prepare($consulta);
                    $procesar->execute();
                    $fila = $procesar->fetch();
                    $Cliente = $fila['idCliente'];

                    $vector = array($Cliente,$Usuario,$Password,$Rol);
                    $max    = sizeof($vector);

                    for ($i = 1; $i <= $max; $i++) {
                        $sql .= "'" . $vector[$i - 1] . "'";
                        if ($i != $max) {$sql .= ",";} else {$sql .= ")";}
                    }

                    $query = $this->db->prepare($sql);
                    $query->execute();

                    if($query->rowCount()==1){return TRUE;}else{return FALSE;}

                } catch(PDOException $e){
                    echo "Error:" . $e->getMessage();
                }

            } else {return FALSE;}
        }
        catch (PDOException $e) {
            echo "Error:" . $e->getMessage();
        }

    }
}

            // Coder::code($sql);
            // die;

<?php
/**
* @author Pablo Leon
* Clase  Usuarios
*/
require ("../conexion/conexion.php");

class Imagenes extends conexion{
    public function __construct(){
        parent::__construct();
    }

    public function get_elementos(){
            $consulta = 'SELECT * FROM imagenes';
            $sentencia = $this->conexion_db->prepare($consulta);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            $sentencia->closeCursor();
            return $resultado;
    }


//Inserta un contacto
    public function insertarElemento($ruta,$nombre){
        $consulta = $this->conexion_db->prepare("INSERT INTO imagenes (nombre,ruta,visible)
         VALUES(:nombre,:ruta, 1);");

        if ($consulta->execute(array(":nombre"=>$nombre,":ruta" => $ruta)))
            return true;
        return false;
    }

    public function buscarVisibles($pattern){
    $consulta = 'SELECT * FROM imagenes WHERE visible LIKE "'.$pattern.'%"';
    $sentencia = $this->conexion_db->prepare($consulta);
    $sentencia->execute();
    $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    $sentencia->closeCursor();
    return $resultado;
    $this->conexion_db=null;
    }

}
 ?>

<?php
/**
* @author Pablo Leon
* Clase Claves para la gestión de claves de cada usuario
*/
include_once("conexion.php");

class Firmas extends conexion{
    public function __construct(){
        parent::__construct();
    }
    /**
    * Devuelve el total de firmas
    */
    public function get_firmas(){
            $consulta = 'SELECT * FROM clavefirma';
            $sentencia = $this->conexion_db->prepare($consulta);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            $sentencia->closeCursor();
            return $resultado;
    }
    /**
    * Extrae las claves de un usuario
    */
    public function get_firmaUsuario($id){
        $consulta = 'SELECT * from clavefirma WHERE id = :id';
        $sentencia = $this->conexion_db->prepare($consulta);
        $sentencia->execute(array(":id"=>$id));
        $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        $sentencia->closeCursor();
        return $resultado;
    }

    /**
    * Extrae el número almacenado en una fila y columna
    */
    public function get_numero($id){
        $fila = rand(1,8);
        $columna = rand(1,8);
        $consulta = 'SELECT id from clavefirma WHERE idUsuario = :id AND fila = '.$fila.' AND columna = '.$columna;
        $sentencia = $this->conexion_db->prepare($consulta);
        $sentencia->execute(array(":idUsuario"=>$id));
        $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        $sentencia->closeCursor();
        $valores = [$fila,$columna,$resultado];
        return $valores;
    }
    /*
    * Añade nuna nueva secuencia de claves
    */
    public function insertarFirma($idUsuario,$fila,$columna,$numero){
        $consulta = $this->conexion_db->prepare("INSERT INTO clavefirma (id,idUsuario,fila,columna)
         VALUES(:numero, :idUsuario, :fila, :columna);");

        if ($consulta->execute(array(":numero"=>$numero,":idUsuario"=>$idUsuario,
        ":fila" => $fila, ":columna" => $columna)))
            return true;
        return false;
    }

}
 ?>

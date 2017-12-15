<?php
/**
* @author Pablo Leon
* Clase  Usuarios
*/
include_once("conexion.php");

class Documentos extends conexion{
    public function __construct(){
        parent::__construct();
    }
/** Obtiene todos los documentos*/
    public function get_documentos(){
            $consulta = 'SELECT * FROM documentos';
            $sentencia = $this->conexion_db->prepare($consulta);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            $sentencia->closeCursor();
            return $resultado;
    }
    /** Devuelve los documentos pendientes de un usuario*/
    public function get_pendientes($id){
        $consulta = 'SELECT * from documentos WHERE idUsuario= :id ';
        $sentencia = $this->conexion_db->prepare($consulta);
        $sentencia->execute(array(':id'=>$id));
        $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        $sentencia->closeCursor();
        return $resultado;
    }
/* INserta un fichero */
    public function insertarFichero($idUsuario,$descripcion,$fichero,$fechaFirma){
        $consulta = $this->conexion_db->prepare("INSERT INTO documentos (idUsuario,
            descripcion,fichero,estado, fechaFirma )
         VALUES(:idUsuario, :descripcion, :fichero, 'Pendiente', :fechaFirma);");

        if ($consulta->execute(array(":idUsuario"=>$idUsuario,":descripcion"=>$descripcion,
        ":fichero" => $fichero, ":fechaFirma" => $fechaFirma)))
            return true;
        return false;
    }
    /* Valida el fichero de un usuario */
    public function validar($id){
        $consulta = 'UPDATE documentos SET estado = "Firmado" WHERE id = :id';
        $sentencia = $this->conexion_db->prepare($consulta);
        if($sentencia->execute(array(':id'=>$id)))
            return true;
        return false;
    }
}

 ?>

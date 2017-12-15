<?php
/**
* @author Pablo Leon
* Clase  Usuarios
*/
require ("conexion.php");

class Usuarios extends conexion{
    public function __construct(){
        parent::__construct();
    }

    public function get_usuarios(){
            $consulta = 'SELECT * FROM usuarios';
            $sentencia = $this->conexion_db->prepare($consulta);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            $sentencia->closeCursor();
            return $resultado;
    }


    public function insertarUsuario($usuario,$psw){
        $consulta = $this->conexion_db->prepare("INSERT INTO usuarios (nombre, passwd)
         VALUES(:usuario, :psw);");

        if ($consulta->execute(array(":usuario" => $usuario, ":psw" => $psw)))
            return true;
        return false;
    }

    public function get_usuario($key){
        $consulta = 'SELECT * FROM usuarios WHERE perfil LIKE :perfil';
        $sentencia = $this->conexion_db->prepare($consulta);
        $sentencia->execute(array(':perfil'=>$key));
        //volcamos en la variable resultado un array asociativo
        $resultado = $sentencia->fetchAll(PDO::FETCH_NUM);
        $sentencia->closeCursor();
        return $resultado;

    }

    public function buscarUsuario($pattern){
    $consulta = 'SELECT * FROM usuarios WHERE nombre LIKE "'.$pattern.'%"';
    $sentencia = $this->conexion_db->prepare($consulta);
    $sentencia->execute();
    $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    $sentencia->closeCursor();
    return $resultado;
    $this->conexion_db=null;
    }
    public function borrarUsuario($key){
        $consulta = 'DELETE FROM usuarios WHERE id = :id';
        $sentencia = $this->conexion_db->prepare($consulta);
        if($sentencia->execute(array(':id'=>$key)))
        {    $sentencia->closeCursor();
            return true;
        }
        return false;
        //volcamos en la variable resultado un array asociativo


    }
}

 ?>

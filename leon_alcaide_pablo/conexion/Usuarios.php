<?php
/**
* @author Pablo Leon
* Clase  Usuarios
*/
include_once("conexion.php");

class Usuarios extends conexion{
    public function __construct(){
        parent::__construct();
    }
    /** Devuelve el total de usuarios */
    public function get_usuario(){
            $consulta = 'SELECT * FROM usuario';
            $sentencia = $this->conexion_db->prepare($consulta);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            $sentencia->closeCursor();
            return $resultado;
    }
    /**
    * Devuelve los usuarios no validados aún
    */
    public function get_novalidados(){
        $consulta = 'SELECT * from usuario WHERE estado = "bloqueado"';
        $sentencia = $this->conexion_db->prepare($consulta);
        $sentencia->execute();
        $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        $sentencia->closeCursor();
        return $resultado;
    }

    /**
    * Añade un nuevo usuario
    */
    public function insertarUsuario($nombre,$email,$usuario,$password){
        $consulta = $this->conexion_db->prepare("INSERT INTO usuario (nombre, email,usuario,password,estado)
         VALUES(:nombre, :email, :usuario, :password, 'bloqueado');");

        if ($consulta->execute(array(":nombre"=>$nombre,":email"=>$email,":usuario" => $usuario, ":password" => $password)))
            return true;
        return false;
    }

    /* Busca un usuario por su nombre */
    public function get_usuarios($key){
        $consulta = 'SELECT * FROM usuario WHERE nombre LIKE :nombre';
        $sentencia = $this->conexion_db->prepare($consulta);
        $sentencia->execute(array(':nombre'=>$key));
        //volcamos en la variable resultado un array asociativo
        $resultado = $sentencia->fetchAll(PDO::FETCH_NUM);
        $sentencia->closeCursor();
        return $resultado;

    }

    /**  busca un usuario*/
    public function buscarUsuario($pattern){
    $consulta = 'SELECT * FROM usuario WHERE usuario LIKE "'.$pattern.'%"';
    $sentencia = $this->conexion_db->prepare($consulta);
    $sentencia->execute(array(':usuario'=>$pattern));
    $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    $sentencia->closeCursor();
    return $resultado;
    $this->conexion_db=null;
    }

    /** Elimina un usuario
    */
    public function borrarUsuario($key){
        $consulta = 'DELETE FROM usuario WHERE id = :id';
        $sentencia = $this->conexion_db->prepare($consulta);
        if($sentencia->execute(array(':id'=>$key)))
        {    $sentencia->closeCursor();
            return true;
        }
        return false;
        //volcamos en la variable resultado un array asociativo
    }
    /**
    * Valida un usuario
    */
    public function validar($id){
        $consulta = 'UPDATE usuario SET estado = "activo" WHERE id = :id';
        $sentencia = $this->conexion_db->prepare($consulta);
        if($sentencia->execute(array(':id'=>$id)))
            return true;
        return false;
    }
}

 ?>

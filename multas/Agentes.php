<?php
/**
* @author Pablo Leon
* Clase Agentes
*/
require ("conexionAgentes.php");

class Agentes extends conexionAgentes{
    public function __construct(){
        parent::__construct();
    }

    public function get_agentes(){
            $consulta = 'SELECT * FROM agentes';
            $sentencia = $this->conexion_db->prepare($consulta);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            $sentencia->closeCursor();
            return $resultado;
    }


//Inserta un contacto
    public function insertarAgente($usuario,$psw,$nombre){
        $consulta = $this->conexion_db->prepare("INSERT INTO agentes (usuario, psw, nombre,validado)
         VALUES(:usuario, :psw, :nombre, 0);");

        if ($consulta->execute(array(":usuario" => $usuario, ":psw" => $psw, ":nombre" => $nombre,)))
            return true;
        return false;
    }

//Muestra un agente localizado por su id
    public function getAgente($key){
        $consulta = 'SELECT * FROM agentes WHERE id =:id';
        $sentencia = $this->conexion_db->prepare($consulta);
        $sentencia->execute(array(':id'=>$key));
        //volcamos en la variable resultado un array asociativo
        $resultado = $sentencia->fetchAll(PDO::FETCH_NUM);
        $sentencia->closeCursor();
        return $resultado;

    }
//muestra los agentes no validados
    public function getNoValidados(){
        $consulta = 'SELECT * from agentes WHERE validado = 0';
        $sentencia = $this->conexion_db->prepare($consulta);
        $sentencia->execute();
        $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        $sentencia->closeCursor();
        return $resultado;
    }

//busca agentes por nombre
    public function buscarAgente($pattern){
    $consulta = 'SELECT * FROM agentes WHERE nombre LIKE "'.$pattern.'%"';
    $sentencia = $this->conexion_db->prepare($consulta);
    $sentencia->execute();
    $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    $sentencia->closeCursor();
    return $resultado;
    $this->conexion_db=null;
    }
//pasa el estado de validacion de un agente a True
    public function validar($id){
        $consulta = 'UPDATE agentes SET validado = 1 WHERE id = :id';
        $sentencia = $this->conexion_db->prepare($consulta);
        if($sentencia->execute(array(':id'=>$id)))
            return true;
        return false;
    }
}

 ?>

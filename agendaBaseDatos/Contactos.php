<?php
/**
* @author Pablo Leon
* Clase Contactos
*/
require ("Conexion.php");

class Contactos extends Conexion{
    public function __construct(){
        parent::__construct();
    }

    public function get_contactos(){
            $consulta = 'SELECT * FROM contactos';
            $sentencia = $this->conexion_db->prepare($consulta);
            $sentencia->execute();
            //volcamos en la variable resultado un array asociativo
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            $sentencia->closeCursor();

            return $resultado;
    //        $this->conexion_db=null;
    }


//Inserta un contacto
    public function insertarContacto($name,$subname1,$subname2,$phone,$mail){
        $consulta = $this->conexion_db->prepare("INSERT INTO contactos (nombre, apellido1, apellido2, telefono, email)
         VALUES(:nombre, :apellido1, :apellido2, :telefono, :correo);");

        if ($consulta->execute(array(":nombre" => $name, ":apellido1" => $subname1, ":apellido2" => $subname2,
        ":telefono" => $phone, ":correo" => $mail)))
            return true;
        return false;
    }
//Elimina un contacto
    public function eliminarContacto($key){
        $consulta = $this->conexion_db->prepare("DELETE FROM contactos WHERE id =:id ;");
        if($consulta->execute(array(':id'=>$key)))
            return true;
        return false;
    }
//Muestra un contacto localizado por su id
    public function getContacto($key){
        $consulta = 'SELECT * FROM contactos WHERE id =:id';
        $sentencia = $this->conexion_db->prepare($consulta);
        $sentencia->execute(array(':id'=>$key));
        //volcamos en la variable resultado un array asociativo
        $resultado = $sentencia->fetchAll(PDO::FETCH_NUM);
        $sentencia->closeCursor();
        return $resultado;

    }

    public function buscarContactos($pattern){
    $consulta = 'SELECT * FROM contactos WHERE nombre LIKE "'.$pattern.'%"';
    $sentencia = $this->conexion_db->prepare($consulta);
    $sentencia->execute();
    $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    $sentencia->closeCursor();
    return $resultado;
    $this->conexion_db=null;
    }

    public function editarNombre($id, $nombre){
        $consulta = 'UPDATE contactos SET nombre=:nombre where id=:id';
        $sentencia= $this->conexion_db->prepare($consulta);
        if($sentencia->execute(array(':id'=>$id,':nombre'=>$nombre)))
            return true;
        return $nombre;
    }
    public function editarContacto($id,$nombre,$apellido1,$apellido2,$telefono,$mail){
        $consulta = 'UPDATE contactos SET nombre= :nombre, apellido1= :apellido1,
        apellido2= :apellido2, telefono= :telefono, email= :mail WHERE id = :id';
        $sentencia= $this->conexion_db->prepare($consulta);
        if($sentencia->execute(array(':id'=>$id,':nombre'=>$nombre,':apellido1'=>$apellido1,
        ':apellido2'=>$apellido2,':telefono'=>$telefono,':mail'=>$mail)))
            return true;
        return false;
    }
}

 ?>

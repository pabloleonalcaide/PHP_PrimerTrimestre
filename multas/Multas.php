<?php
/**
* @author Pablo Leon
* Clase Multa
*/
require ("conexionAgentes.php");

class Multas extends conexionAgentes{
    public function __construct(){
        parent::__construct();
    }

    public function get_multas(){
            $consulta = 'SELECT * FROM multas';
            $sentencia = $this->conexion_db->prepare($consulta);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            $sentencia->closeCursor();
            return $resultado;
    }


//Inserta un contacto
    public function insertarMulta($idAgente,$matricula,$descripcion,$fecha,$importe){
        $consulta = $this->conexion_db->prepare("INSERT INTO multas (idAgente, matricula,
            descripcion,fecha,importe,estado)VALUES(:idAgente, :matricula, :descripcion,
                :fecha, :importe, 0);");

        if ($consulta->execute(array(":idAgente" =>$idAgente, ":matricula"=>$matricula,
         ":descripcion"=>$descripcion,":fecha"=>$fecha,":importe"=>$importe)))
            return true;
        return false;
    }


//muestra los agentes no validados
    public function getNoPagados(){
        $consulta = 'SELECT * from multas WHERE estado = 0';
        $sentencia = $this->conexion_db->prepare($consulta);
        $sentencia->execute();
        $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        $sentencia->closeCursor();
        return $resultado;
    }



//pasa el estado de validacion de un agente a True
    public function pagar($id){
        $consulta = 'UPDATE multas SET estado = 1 WHERE id = :id';
        $sentencia = $this->conexion_db->prepare($consulta);
        if($sentencia->execute(array(':id'=>$id)))
            return true;
        return false;
    }
    public function mostrarInforme($year){
        $consulta = 'SELECT MONTHNAME(fecha),sum(importe) FROM multas where YEAR(fecha) = :year GROUP BY MONTHNAME(fecha)';
        $sentencia = $this->conexion_db->prepare($consulta);
        $sentencia->execute(array(':year'=>$year));
        $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        $sentencia->closeCursor();
        return $resultado;
    }
    public function importeAnual($year){
        $consulta = 'SELECT sum(importe) FROM multas where YEAR(fecha) = :year';
        $sentencia = $this->conexion_db->prepare($consulta);
        $sentencia->execute(array(':year'=>$year));
        $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        $sentencia->closeCursor();
        return $resultado;
    }

}




 ?>

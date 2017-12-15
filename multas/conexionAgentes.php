<?php
/**
* Clase conexión a tabla agentes
* @author Pablo Leon
*/
require ('config.php');

class conexionAgentes{
    protected $conexion_db;

    public function __construct(){
        try{
            //establecemos la conexión
            $this->conexion_db = new PDO('mysql:host=localhost; dbname=multas','root','serotonina');
            //atributos de conexion --> nos permite lanzar excepciones y reportar errores
            $this->conexion_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //especificamos que esta conexión usara caracteres latinos
            $this->conexion_db->exec("SET CHARACTER SET utf8");
            return $this->conexion_db;
        }catch(Exception $e){
            //en caso de error nos devuelve la línea donde se ha producido
            echo "La linea de error es: ". $e->getLine();
            echo $e->getMessage();
        }
    }
}

 ?>

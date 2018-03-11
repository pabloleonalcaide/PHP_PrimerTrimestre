<?php
require_once "Conexion.php";
class Usuario{
	private static $instancia;
	private $conexionDB;

	private function __construct() {
		try {
			$conexion = new ConnectDB();
			$this->conexionDB = $conexion->getconexionDB();
		} catch (PDOException $e) {
			print "Error!: " . $e->getMessage();
			die();
		}
	}

	public static function singleton() {
		if (!isset(self::$instancia)) {
			$miclase = __CLASS__;
			self::$instancia = new $miclase;
		}
		return self::$instancia;
	}

	//Función que devuelve un usuario
	public function login($usuario, $password) {
		$result = false;
		try {
			$sql = "SELECT `usuario`, `password`, `id` FROM `usuario` WHERE `usuario` = :usuario and `password` = :password";
			$query = $this->conexionDB->prepare($sql);
			$query->bindParam('usuario', $usuario);
			$query->bindParam('password', $password);
			$query->execute();
			$this->conexionDB = null;
			//Comprobamos si existe el usuario
			if ($query->rowCount() == 1) {
				$result = $query->fetchAll(PDO::FETCH_ASSOC);
			}
		} catch (PDOException $e) {
			$e->getMessage();
		}
		return $result;
	}
	//Función que devuelve un usuario
	//Función para insertar un experto
	public function insertarUsuario($usuario, $password, $email) {
		try {
				$sql = 'INSERT INTO `usuario`(`usuario`,`password`, `email`)
				VALUES (:usuario,:password, :email)';
				$query = $this->conexionDB->prepare($sql);
				$query->bindParam('usuario', $usuario);
				$query->bindParam('password', $password);
				$query->bindParam('email', $email);
				$result = $query->execute();

		} catch (PDOException $e) {
			$e->getMessage();
		}

		return $result;
	}
	public function getId($nombre){
		try{
			$sql = 'SELECT `id`  FROM `usuario` WHERE `usuario` =:nombre';
			$query = $this->conexionDB->prepare($sql);
			$query->bindParam('nombre', $nombre);
			$result = $query->execute();
			$result = $query->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			$e->getMessage();
		}
		return $result;
	}
	public function getUsuario($id){
		try{
			$sql = 'SELECT `usuario` FROM `usuario` WHERE `id` =:id';
			$query = $this->conexionDB->prepare($sql);
			$query->bindParam('id', $id);
			$result = $query->execute();
			$result = $query->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			$e->getMessage();
		}
		return $result;
	}
	public function validarUsuario($usuario){
		try{
			$valido = 1;
			$sql = 'UPDATE `usuarios` SET `validado` =:valido WHERE `usuario` =:usuario';
			$query = $this->conexionDB->prepare($sql);
			$query->bindParam('usuario', $usuario);
			$query->bindParam('valido', $valido);
			$result = $query->execute();
		}catch(PDOException $e){
			$e->getMessage();
		}
		return $result;
	}
	public function mostrarNoValidados(){
		try{
			$valido = 0;
			$sql = 'SELECT *  FROM `usuarios` WHERE `validado` =:valido';
			$query = $this->conexionDB->prepare($sql);
			$query->bindParam('valido', $valido);
			$result = $query->execute();
			$result = $query->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			$e->getMessage();
		}
		return $result;
	}
}

?>

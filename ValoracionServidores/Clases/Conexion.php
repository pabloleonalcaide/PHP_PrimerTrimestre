<?php
class ConnectDB
{
	private $_host;
	private $_database;
	private $_user;
	private $_pass;
	private $_port;

	private $conexionDB;

	public function getconexionDB() {
		return $this->conexionDB;
	}

	public function __construct() {
		//Cargamos las variables de conexión
		$this->_host = 'localhost';
		$this->_database = 'valoracion';
		$this->_user = 'root';
		$this->_pass = 'root';

		//Cadena de conexión
		$dsn = 'mysql:host=' . $this->_host . ';'
				. 'dbname=' . $this->_database;

		try {
			$this->conexionDB = new PDO($dsn, $this->_user, $this->_pass,
									array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		} catch (PDOException $e) {
			printf("Conexión fallida: %s\n", $e->getMessage());
			exit();
		}
	}

	public function query($sql, $values=array()) {
		$_result = false;
		if (($_stmt = $this->conexionDB->prepare($sql))) {
			if (preg_match_all('/(:\w+)/', $sql, $_named, PREG_PATTERN_ORDER)) {
				$_named = array_pop($_named);
				foreach ($_named as $_param) {
					$_stmt->bindValue($_param, $values[substr($_param, 1)]);
				}
			}
			try {
				if (!$_stmt->execute()) {
					printf("Error en ejecución de consulta: %s\n", $_stmt->errorInfo());
				}
				$_result = $_stmt->fetchAll(PDO::FETCH_ASSOC);
				$_stmt->closeCursor();
			} catch (PDOException $e) {
				printf("Error en consulta: %s\n", $e->getMessage());
			}
			return $_result;
		}
	}
}

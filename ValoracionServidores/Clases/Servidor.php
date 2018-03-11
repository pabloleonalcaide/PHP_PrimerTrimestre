<?php
require_once "Conexion.php";

class Servidor{
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

public function votarServidor($id_usuario,$id_servidor,$puntuacion){
  try {
    $sql = 'INSERT INTO `votaciones` (`id_usuario`, `id_servidor`, `puntuacion`)
    VALUES (:id_usuario, :id_servidor,:puntuacion)';
    $query = $this->conexionDB->prepare($sql);
    $query->bindParam('id_usuario', $id_usuario);
    $query->bindParam('id_servidor', $id_servidor);
    $query->bindParam('puntuacion', $puntuacion);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

  }catch(PDOException $e) {
      $e->getMessage();
  }
  return $result;
}

public function insertarServidor($idUsuario, $url) {
  $descripcion ="revisar todo";
  try {
    $sql = 'INSERT INTO `servidor` (`url`, `id_usuario`, `descripcion`) VALUES
    ( :url, :idUsuario,:descripcion)';
    $query = $this->conexionDB->prepare($sql);
    $query->bindParam('idUsuario', $idUsuario);
    $query->bindParam('url', $url);
    $query->bindParam('descripcion', $descripcion);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

  }catch(PDOException $e) {
      $e->getMessage();
  }
  return $result;
}

/**
* devuelve la url de un servidor a través de su id
*/
public function getServidor($id) {
try {
$sql = "SELECT url FROM servidor WHERE id = :id";
$query = $this->conexionDB->prepare($sql);
$query->bindParam('id', $id);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
$e->getMessage();
}
return $result;
}
public function getServidores() {
    try {
        $sql = "SELECT * FROM servidor";
        $query = $this->conexionDB->prepare($sql);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        $e->getMessage();
    }
    return $result;
}
public function getServidorUsuario($id_usuario) {
try {
    $sql = "SELECT * FROM `servidor` WHERE `id_usuario` = :id_usuario";
    $query = $this->conexionDB->prepare($sql);
    $query->bindParam('id_usuario', $id_usuario);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $e->getMessage();
}
return $result;
}
/**
* devuelve la id de un servidor a través de su url
*/
public function getId($url) {
try {
$sql = "SELECT id FROM servidor WHERE url = :url";
$query = $this->conexionDB->prepare($sql);
$query->bindParam('url', $url);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
$e->getMessage();
}
return $result;
}

public function getPuntuacionServer($id) {
try {
$sql = "SELECT sum(`puntuacion`) as `total` FROM `votaciones` WHERE `id_servidor` = :id";
$query = $this->conexionDB->prepare($sql);
$query->bindParam('id', $id);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
$e->getMessage();
}
return $result;

}
}
?>

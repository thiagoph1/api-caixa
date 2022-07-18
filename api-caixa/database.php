<?php
date_default_timezone_set('America/Sao_Paulo');

class Database {

  static $servername = "localhost";
	static $dbname = "flutter";
	static $usuario = "root";
	static $senha = "";

  private static $con = null;

  public function __construct()
  {
    die('Iniciação não autorizada');
  }

  public static function conectar() {


  $con = new mysqli(self::$servername, self::$usuario, self::$senha, self::$dbname);

  if ($con->connect_error) {
    // echo "Erro ao Conectar"; //  - For debug
    return null;
  } else {
  // 	echo "Conectado"; //For debug
    return $con;
  }
}
}
?>
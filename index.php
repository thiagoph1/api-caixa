<?php

class Constantes
{
	// dados do Banco de Dados
	static $servername = "localhost";
	static $dbname = "flutter";
	static $usuario = "root";
	static $senha = "";

	//Query para consulta
	static $SQL_SELECT_ALL = "SELECT * FROM dados";

	//Query para inserir
	static $SQL_INSERT = "INSERT INTO dados(distancia, volume) VALUES ()";
}

class Dados
{
	public function conectar()
	{
		$con = new mysqli(Constantes::$servername, Constantes::$usuario, Constantes::$senha, Constantes::$dbname);
		if ($con->connect_error) {
			// echo "Erro ao Conectar"; //  - For debug
			return null;
		} else {
		// 	echo "Conectado"; //For debug
			return $con;
		}
	}

	// Listar do banco de dados
	public function select()
	{
		$con = $this->conectar();
		if ($con != null) {
			$result = $con->query(Constantes::$SQL_SELECT_ALL);
			if ($result->num_rows > 0) {
				$Dados = array();
				while ($row = $result->fetch_array()) {
					array_push($Dados, array(
							"id" => $row['id'], "volume" => $row['volume'],
							"distancia" => $row['distancia'], "data" => $row['data'],
						)
					);
				}
				print(json_encode(array_reverse(
					$Dados
				)));
			} else {
				print(json_encode(array("PHP EXCEÇÃO: Não conseguiu buscar os dados")));
			}
			$con->close();
		} else {
			print(json_encode(array("PHP EXCEÇÃO : Erro ao conectar")));
		}
	}
}
$Dados = new Dados();
$Dados->select();

//end

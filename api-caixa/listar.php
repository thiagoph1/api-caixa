<?php
	require 'database.php';
class Listar{

	//Query para consulta
	static $query = "SELECT * FROM dados";

	// Listar do banco de dados
	function select()
	{
		$con = Database::conectar();
		if ($con != null) {
			$result = $con->query(self::$query);
			if ($result->num_rows > 0) {
				$dados = array();
				while ($row = $result->fetch_array()) {
					array_push($dados, array(
							"id" => $row['id'], "volume" => $row['volume'],
							"distancia" => $row['distancia'], "data" => $row['data'],
						)
					);
				}
				print(json_encode(array_reverse(
					$dados
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

$listar = new Listar();
$listar->select();

//end

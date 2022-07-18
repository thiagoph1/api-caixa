<?php
	require 'database.php';
class Inserir{

 function insert() {
    $distancia = $volume = "";

    $con = Database::conectar();
	if ($con != null) {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $distancia = (float) $_POST['distancia'];
            $volume    = (float) $_POST['volume'];

            $query = "INSERT INTO dados (distancia, volume) VALUES ('$distancia', '$volume')";

                if($con->query($query) == TRUE) {
                    echo "Feita inclusão";
                } else {
                    echo "Erro: " .$query . "<br>" .$con->error;
                }

        } else {
            echo "Nenhum dado com HTTP POST.";
        }
    } else {
        print(json_encode(array("PHP EXCEÇÃO : Erro ao conectar")));
    }
 } 
}

$inserir = new Inserir();
$inserir->insert();

//end

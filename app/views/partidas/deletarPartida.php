<?php
#Arquivo para executar a exclusão de um Personagem

include_once("../../controllers/PartidaController.php");

$idPartida = $_GET["id"];

$partidaCont = new PartidaController();
$partida = $partidaCont->buscarPorId($idPartida);

if($partida != null) {
    //Deletar o planta
    $partidaCont->excluir($partida);

    //Retornar para a página inicial
    header("location: listPartidas.php");

} else { 
    echo "A partida de ID ".$idPartida." não existe.";
    echo "<br>";
    echo "<a href='index.php'>Voltar</a>";
}

?>
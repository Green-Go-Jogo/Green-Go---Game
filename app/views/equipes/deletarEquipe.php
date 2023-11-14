<?php
#Arquivo para executar a exclusão de um Personagem

include_once("../../controllers/EquipeController.php");

$idEquipe = $_GET["id"];

$equipeCont = new EquipeController();
$equipe = $equipeCont->buscarPorId($idEquipe);

if($equipe != null) {

    try {
        $equipeCont->excluir($equipe);
    } catch (PDOException $e) {
        header("Location: ../home/erro.php");
        exit;
    }

    header("location: listEquipes.php");

} else { 
    echo "A equipe de ID ".$idEquipe." não existe.";
    echo "<br>";
    echo "<a href='listEquipes.php'>Voltar</a>";
}

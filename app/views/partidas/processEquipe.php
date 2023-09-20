<?php

include_once("../../controllers/PartidaController.php");

include_once("../../controllers/LoginController.php");
LoginController::manterUsuario();

$partidaCont = new PartidaController();
$partida = $partidaCont->buscarPorId($_GET['idp']);

$jogadores = $partidaCont->contarJogadoresEquipe($_GET['idp'], $_GET['ide']);   
$maxJogadores = $partida->getLimiteJogadores();
$equipeCheia = ($jogadores == $maxJogadores);


if ($equipeCheia) {
    header('location: escolherEquipe.php?idp='.$_GET['idp']);
} else {    
    $error = $partidaCont->salvarUsuarioEquipe($_GET['ide'], $_GET['idp']); 
    if ($error !== null) {    
    echo $error;
    }
    else {
    header("Location: verEquipe.php?ide=". $_GET['ide'] ."&idp=". $_GET['idp']);
    }
}


?>
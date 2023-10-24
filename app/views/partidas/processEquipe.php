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
    $equipeUsuario = $partidaCont->salvarUsuarioEquipe($_GET['ide'], $_GET['idp']); 
    if ($equipeUsuario !== null) {    
    $error = "Você já faz parte de uma equipe em uma partida! Te trouxemos de volta à ela :) <br><br> Se você acredita que isso é um erro, saia da partida ou peça ajuda de um professor/administrador!";
    header("Location: verEquipe.php?ide=". $equipeUsuario->getIdEquipe() ."&idp=". $equipeUsuario->getIdPartida()."&error=".$error);
    var_dump($equipeUsuario);
    }
    else {
    header("Location: verEquipe.php?ide=". $_GET['ide'] ."&idp=". $_GET['idp']);
    }
}


?>
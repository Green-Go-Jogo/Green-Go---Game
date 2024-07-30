<?php
include_once(__DIR__ . "/../../controllers/PartidaController.php");

session_start();

$idPartida = $_GET['idp'];
$idUsuario = $_GET['idu'];

if (isset($_GET['msgReturn'])) {
    $msgReturn = $_GET['msgReturn'];
}

$partidaCont = new PartidaController();
$partida = $partidaCont->sairPartida($idPartida, $idUsuario);

$_SESSION['PARTIDA'] = false;
unset($_SESSION['PLANTAS_LIDAS']);
unset($_SESSION['PONTOS']);

$_SESSION['PLANTAS_LIDAS'] = array();
$_SESSION['PONTOS'] = 0;

header("location: listPartidas.php");

?>

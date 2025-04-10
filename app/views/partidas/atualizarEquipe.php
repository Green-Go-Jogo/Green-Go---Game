<?php
include_once(__DIR__."/../../controllers/PartidaController.php");
include_once(__DIR__."/../../controllers/EquipeController.php");
include_once(__DIR__."/../../controllers/UsuarioController.php");
include_once(__DIR__."/htmlPartida.php");

$idEquipe = $_GET['ide'];
$idPartida = $_GET['idp'];
$idUsuario = $_GET['idu'];

$usuarioCont = new UsuarioController();
$usuarios = $usuarioCont->buscarUsuarios($idEquipe, $idPartida);

$equipeCont = new EquipeController();
$equipe = $equipeCont->buscarPorId($idEquipe);

$partidaCont = new PartidaController();
$partida = $partidaCont->buscarPorId($idPartida);

// Chame a função para desenhar o HTML com os novos dados e retorne somente o conteúdo
$conteudoAtualizado = PartidaHTML::desenhaEquipe($usuarios, $partida, $idEquipe, $idUsuario);
echo $conteudoAtualizado;
?>
<?php
include_once(__DIR__."/../../controllers/PartidaController.php");
include_once(__DIR__."/../../controllers/EquipeController.php");
include_once(__DIR__."/../../controllers/UsuarioController.php");
include_once(__DIR__."/htmlPartida.php");

$idPartida = $_GET['idp'];

$partidaCont = new PartidaController();
$partida = $partidaCont->buscarPorId($idPartida);

// Chame a função para desenhar o HTML com os novos dados e retorne somente o conteúdo
$conteudoAtualizado = PartidaHTML::desenhaPartidaAlunos($partida);
echo $conteudoAtualizado;
?>
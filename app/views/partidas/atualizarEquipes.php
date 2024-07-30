<?php
header('Content-Type: application/json');
include_once(__DIR__."/../../controllers/PartidaController.php");
include_once(__DIR__."/../../controllers/EquipeController.php");
include_once(__DIR__."/../../controllers/UsuarioController.php");

$idPartida = $_GET['idp'];
$idEquipe = $_GET['ide'];

$partidaCont = new PartidaController();
$usuarioCont = new UsuarioController();
$partida = $partidaCont->buscarPorId($idPartida);
foreach ($partida->getEquipes() as $equipe) {
    if($idEquipe == $equipe->getIdEquipe()){
        $usuarios = $usuarioCont->buscarUsuarios($equipe->getIdEquipe(), $partida->getIdPartida());
        echo json_encode(['usuarios' => $usuarios, 'equipe' => $equipe]);
        exit;
    }
}
?>
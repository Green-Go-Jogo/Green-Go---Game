<?php

include_once(__DIR__."/../../controllers/PartidaController.php");
$partidaCont = new PartidaController();

session_start();

if (isset($_POST["userID"])) {
    $userID = $_POST["userID"];
    $partida = $partidaCont->buscarPartidaPorIdUsuario($userID);

    $datafim = $partida->getDataFim();
    $pontuacao = $partida->getPontuacaoEquipe();
    $idPartida = $partida->getIdPartida();

    $isValid = ($datafim && $pontuacao) ? true : false;

if ($isValid) {
    $_SESSION['PARTIDA'] = false;
}

$data = [
    'isValid' => $isValid,
    'idPartida' => $idPartida
];

echo json_encode($data);
} else {
    echo json_encode(false);
}
?>

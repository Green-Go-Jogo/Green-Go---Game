<?php

include_once(__DIR__."/../../controllers/PartidaController.php");
$partidaCont = new PartidaController();

session_start();

if (isset($_POST["userID"])) {
    $userID = $_POST["userID"];
    $partida = $partidaCont->partidaStatus($userID);

    $datafim = $partida->getDataFim();
    $pontuacao = $partida->getPontuacaoEquipe();

    $isValid = ($datafim && $pontuacao) ? true : false;

if ($isValid) {
    $_SESSION['PARTIDA'] = false;
}

echo json_encode($isValid);
} else {
    echo json_encode(false);
}
?>

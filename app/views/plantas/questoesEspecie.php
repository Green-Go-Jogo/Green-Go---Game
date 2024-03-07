<?php
include_once("../../controllers/QuestaoController.php");

$idEspecie = $_POST['idEspecie'];

$questaoCont = new QuestaoController;
$questoes = $questaoCont->listarPorEspecie($idEspecie);

$questoesEspecie = array();

foreach ($questoes as $questao) {
    $grauD = $questao->getGrauDificuldade();
    if ($grauD == "dificil") {
        $cor = "#ff0000";
    } else if ($grauD == "medio") {
        $cor = "#FFD43B";
    } else {
        $cor = "#04ff00";
    }

    $questaoArray = array(
        "idQuestao" => $questao->getIdQuestao(),
        "descricao" => $questao->getDescricaoQuestao(),
        "dificuldade" => $questao->getGrauDificuldade(),
        "cor" => $cor
    );

    $questoesEspecie[] = $questaoArray;
}

echo json_encode($questoesEspecie);

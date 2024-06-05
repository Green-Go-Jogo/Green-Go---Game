<?php
#Arquivo para executar a exclusão de um Personagem

include_once("../../controllers/QuestaoController.php");

$idQuestao = $_GET["idq"];
$idEspecie =  $_GET["ide"];

$questaoCont = new QuestaoController();
$questao = $questaoCont->buscarPorId($idQuestao);

if($questao != null) {
    //Deletar a questao
    $questaoCont->excluir($questao);

    //Retornar para a página inicial
    header("location: ../quiz/listPergunta.php?ide=".$idEspecie);

} else { 
    echo "A Questão de ID ".$idQuestao." não existe.";
    echo "<br>";
    echo "<a href='index.php'>Voltar</a>";
}

?>
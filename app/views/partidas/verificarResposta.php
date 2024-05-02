<?php
include_once("../../controllers/PartidaController.php");

$partidaCont = new PartidaController();

foreach ($_POST as $key => $value) {
    // Verifica se o nome do campo começa com "question"
    if (substr($key, 0, 9) === 'question=') {
        // Separa o ID da questão e o número da alternativa
        $parts = explode('alt=', $value);
        $idQuestao = substr($parts[0], 9); // Obtém o ID da questão
        $idAlternativa = $parts[1]; // Obtém o número da alternativa selecionada    

        $partidaCont->checarRespostaQuiz($idQuestao, $idAlternativa);
    }
}

?>
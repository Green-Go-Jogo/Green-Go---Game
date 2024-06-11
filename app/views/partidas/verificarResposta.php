<?php
include_once("../../controllers/PartidaController.php");

$partidaCont = new PartidaController();
$idUsuario = $_POST['idUsuario'];
$idPlanta = $_POST['idPlanta'];
if(isset($_POST['arrayQuestoes'])){
 $arrayQuestoes = $_POST['arrayQuestoes'];
} else {
    $arrayQuestoes = [];
}
// Verifica se a chave 'alternativas' está presente nos dados recebidos via POST
if (isset($_POST['alternativas'])) {
    // Acessa a array de valores de alternativas diretamente
    $alternativasSelecionadas = $_POST['alternativas'];

    // Cria uma array para armazenar as respostas de cada alternativa
    $respostas = array();

    // Itera sobre os valores de alternativas selecionadas
    foreach ($alternativasSelecionadas as $alternativa) {
        // Separa o ID da questão e o número da alternativa
        $parts = explode('alt=', $alternativa);
        $idQuestao = substr($parts[0], 9); // Obtém o ID da questão
        $idAlternativa = $parts[1]; // Obtém o número da alternativa selecionada    

        // Checa a resposta da questão e armazena o resultado na array de respostas
        $resposta = $partidaCont->checarRespostaQuiz($idQuestao, $idAlternativa, $idUsuario, $arrayQuestoes, $idPlanta);
        $respostas[$idQuestao] = $resposta;
    }

    // Cria a resposta JSON
    $respostaJSON = array(
        'isValid' => true,
        'respostas' => $respostas,
        'user' => $idUsuario
    );

    // Retorna a resposta JSON
    echo json_encode($respostaJSON);
} else {
    // Retorna uma resposta de erro se 'alternativas' não estiver presente
    echo json_encode(array('isValid' => false, 'mensagem' => 'Nenhuma alternativa selecionada.'));
}

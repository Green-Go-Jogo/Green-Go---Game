<?php
#Arquivo para executar a inclusão de um personagem
include_once(__DIR__ . "/../../models/QuestaoModel.php");
include_once(__DIR__ . "/../../models/UsuarioModel.php");
include_once(__DIR__ . "/../../controllers/QuestaoController.php");

//Capturar os valores vindos do formulário
$descricao = $_POST['descricao'];
$imagem = $_FILES['imagem'];
if (isset($_POST['imagemAtual'])) {
    $imagemAtual = $_POST['imagemAtual'];
} else {
    $imagemAtual = null;
};
if (isset($_POST['grauDificuldade'])) {
    $grauD = $_POST['grauDificuldade'];
} else {
    $grauD = null;
};
$alternativas = array();
for ($i = 1; $i < 5; $i++) {
    $alternativas[$i] = $_POST['alternativa' . $i];
}
if (isset($_POST['alternativa_correta'])) {
    $alternativaCorreta = $_POST['alternativa_correta'];
} else {
    $alternativaCorreta = null;
};
$idQuestao = $_POST['id_questao'];
$idsAlternativas = $_POST['ids_alternativas'];
$idsArray = array_merge([null], explode(" ", $idsAlternativas));
$idEspecie = $_POST['id_especie'];

//Validar dados
$errors = array();

if (empty($descricao)) {
    $errors['descricao'] = "O campo Descrição é obrigatório";
}

if (empty($grauD)) {
    $errors['grau_dificuldade'] = "O campo Grau de Dificuldade é obrigatório";
}

if (empty($alternativas[1]) || empty($alternativas[2]) || empty($alternativas[3]) || empty($alternativas[4])) {
    $errors['alternativas'] = "Todos os campos de alternativa devem ser preenchidos!";
}

if (empty($alternativaCorreta)) {
    $errors['alternativa_correta'] = "O campo Pontuação é obrigatório!";
}


if (!empty($errors)) {
    $idEspecieQuestaoValidacao = $idEspecie;
    $idPlantaQuestaoValidacao = $idQuestao;
    require_once("editarPergunta.php");
    exit;
}


//Criar o objeto questao
$questaoCont = new QuestaoController();
$questao = new Questao();


if ($imagem['error'] === UPLOAD_ERR_NO_FILE) {
    $questao->setImagemQuestao($imagemAtual);
} else {
    //Tratar a imagem
    $extensao = pathinfo($imagem['name'], PATHINFO_EXTENSION);
    $nome_imagem = md5(uniqid($imagem['name'])) . "." . $extensao;
    $caminho_imagem = "../../public/questoes/" . $nome_imagem;
    move_uploaded_file($imagem["tmp_name"], $caminho_imagem);

    $questao->setImagemQuestao($caminho_imagem);
}
$questao->setDescricaoQuestao($descricao);
$questao->setAlternativaCerta($alternativaCorreta);
$questao->setGrauDificuldade($grauD);
$questao->setAlternativas($alternativas);
$questao->setIdQuestao($idQuestao);
$questao->setIdsArray($idsArray);

// $usuario = new Usuario($id_usuario);
// $questao->setUsuario($usuario);

//Chamar o controler para salvar o questao
$questaoCont->atualizar($questao);

//Redireciona para o início
header("location: listPergunta.php?ide=".$idEspecie);

?>
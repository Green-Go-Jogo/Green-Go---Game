<?php
#Arquivo para executar a inclusão de um personagem
include_once(__DIR__."/../../models/QuestaoModel.php");
include_once(__DIR__."/../../models/UsuarioModel.php");
include_once(__DIR__."/../../controllers/QuestaoController.php");

//Capturar os valores vindos do formulário
$descricao = $_POST['descricao'];
$grauD = $_POST['grauDificuldade'];
$imagem = $_FILES['imagem'];
$alternativas = array();
for ($i = 1; $i < 5; $i++) {
$alternativas[$i] = $_POST['alternativa'.$i];
}
$alternativaCorreta = $_POST['alternativa_correta'];
$idEspecie = $_POST['id_especie'];

//Tratar a imagem
$extensao = pathinfo($imagem['name'], PATHINFO_EXTENSION);
$nome_imagem = md5(uniqid($imagem['name'])).".".$extensao;
$caminho_imagem = "../../public/questoes/" . $nome_imagem;
move_uploaded_file($imagem["tmp_name"], $caminho_imagem);

//Validar dados
// $errors = array();

// if (empty($id_zona)) {
//   $errors['zona_planta'] = "O campo Zona é obrigatório";
// } 

// if (empty($id_zona)) {
//   $errors['zona_planta'] = "O campo Zona é obrigatório";
// } 

// if (empty($id_especie)) {
//   $errors['especie_planta'] = "O campo Espécie é obrigatório";
// } 

// if (empty($pontuacao)) {
//   $errors['Pontuacao'] = "O campo Pontuação é obrigatório!";
// } elseif (!preg_match('/^\d{2}$/', $pontuacao)) {
//   $errors['Pontuacao'] = "O campo Pontuação deve conter 2 ou menos dígitos!";
// }


// if (!empty($errors)) {
//     require_once("adicionarPlanta.php");
//     exit;
//   }


//Criar o objeto questao


$questao = new Questao();
$questao->setDescricaoQuestao($descricao);
$questao->setAlternativaCerta($alternativaCorreta);
$questao->setGrauDificuldade($grauD);
$questao->setImagemQuestao($caminho_imagem);
$questao->setAlternativas($alternativas);
$questao->setIdEspecie($idEspecie);


// $usuario = new Usuario($id_usuario);
// $questao->setUsuario($usuario);

//Chamar o controler para salvar o questao
$questaoCont = new QuestaoController();
$questaoCont->salvar($questao);

//Redireciona para o início
header("location: listEspecies.php");

?>
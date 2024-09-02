<?php
#Arquivo para executar a inclusão de uma espécie
require __DIR__."/../../api/phpqrcode/qrlib.php";
include_once(__DIR__ . "/../../models/EspecieModel.php");
include_once(__DIR__ . "/../../controllers/EspecieController.php");

//Capturar os valores vindos do formulário
$nomePopular = $_POST["Nome_Popular"];
$nomeCientifico = $_POST['Nome_Cientifico'];
$autoria = $_POST['Autoria_Foto'];
$fontes = $_POST['Fontes'];
$descricao = $_POST['Descricao'];
$id_usuario = $_POST['id_usuario'];
$frutifera = isset($_POST['frutifera']) && !empty($_POST['frutifera']) ? $_POST['frutifera'] : 0;
$comestivel = isset($_POST['comestivel']) && !empty($_POST['comestivel']) ? $_POST['comestivel'] : 0;
// $raridade = isset($_POST['raridade']) && !empty($_POST['raridade']) ? $_POST['raridade'] : 0;
$medicinal = isset($_POST['medicinal']) && !empty($_POST['medicinal']) ? $_POST['medicinal'] : 0;
$toxidade = isset($_POST['toxidade']) && !empty($_POST['toxidade']) ? $_POST['toxidade'] : 0;
$exotica = isset($_POST['exotica']) && !empty($_POST['exotica']) ? $_POST['exotica'] : 0;
$endemica = isset($_POST['endemica']) && !empty($_POST['endemica']) ? $_POST['endemica'] : 0;
$nativa = isset($_POST['nativa']) && !empty($_POST['nativa']) ? $_POST['nativa'] : 0;
$panc = isset($_POST['panc']) && !empty($_POST['panc']) ? $_POST['panc'] : 0;
$ornamental = isset($_POST['ornamental']) && !empty($_POST['ornamental']) ? $_POST['ornamental'] : 0;
$imagem = $_FILES['imagem'];

//Validar dados
$errors = array();

if (empty($nomePopular)) {
  $errors['Nome_Popular'] = "O campo Nome Popular é obrigatório.";
}

if (empty($nomeCientifico)) {
  $errors['Nome_Cientifico'] = "O campo Nome Científico é obrigatório.";
}

// if (empty($autoria)) {
//   $errors['Autoria_Foto'] = "O campo Autoria da Foto é obrigatório.";
// }

// if (empty($fontes)) {
//   $errors['Fontes'] = "O campo Fontes é obrigatório.";
// }

if (empty($imagem['name'])) {
  $errors['Imagem'] = "O campo Imagem é obrigatório.";
}
if (empty($descricao)) {
  $errors['Descricao'] = "O campo Descrição é obrigatório.";
}

if (!empty($errors)) {
  require_once("adicionarEspecie.php");
  exit;
}

//Criar o objeto espécie
$extensao = pathinfo($imagem['name'], PATHINFO_EXTENSION);
$nome_imagem = md5(uniqid($imagem['name'])) . "." . $extensao;
$caminho_imagem = "../../public/especies/" . $nome_imagem;
move_uploaded_file($imagem["tmp_name"], $caminho_imagem);


$especie = new Especie();
$especie->setNomePopular($nomePopular);
$especie->setNomeCientifico($nomeCientifico);
$especie->setDescricao($descricao);
$especie->setFontes($fontes);
$especie->setUsuario($id_usuario);
$especie->setImagemEspecie($caminho_imagem);
$especie->setAutoriaImagem($autoria);
$especie->setFrutifera($frutifera);
$especie->setComestivel($comestivel);
// $especie->setRaridade($raridade);
$especie->setMedicinal($medicinal);
$especie->setToxidade($toxidade);
$especie->setExotica($exotica);
$especie->setOrnamental($ornamental);
$especie->setPanc($panc);
$especie->setEndemica($endemica);
$especie->setNativa($nativa);

//Chamar o controler para salvar a espécie
$especieCont = new EspecieController();
$especieCont->salvar($especie);

//Redireciona para o início
header("location: listEspecies.php");

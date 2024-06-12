<?php
#Arquivo para executar a inclusão de um personagem
require __DIR__ . "/../../api/phpqrcode/qrlib.php";
include_once(__DIR__ . "/../../models/PlantaModel.php");
include_once(__DIR__ . "/../../models/ZonaModel.php");
include_once(__DIR__ . "/../../models/UsuarioModel.php");
include_once(__DIR__ . "/../../controllers/PlantaController.php");

//Capturar os valores vindos do formulário
$id_planta = $_POST["id_planta"];
$nomeSocial = $_POST["Nome_Social"];
$Cod_Numerico = $_POST['Cod_Numerico'];
$pontuacaoPlanta = $_POST['Pontuacao'];
$historia = $_POST['Historia'];
$imagem = $_FILES['imagem'];
$imagemAtual = $_POST['imagemAtual'];
$id_zona = $_POST['zona_planta'];
$id_especie = $_POST['especie_planta'];
$id_usuario = $_POST['id_usuario'];
$idQuestoes = array();
$pontuacoes = array();
$questoes = array();
$errors = array();

foreach ($_POST as $name => $value) {
  if (strpos($name, 'checkbox_') === 0) {
    $index = substr($name, 9); // Obtém o índice a partir do nome do checkbox
    $idQuestao = $value;
    
    // Encontra o nome correspondente do input de pontuação
    $pontuacaoKey = 'questaop_' . $index;

    // Verifica se o input de pontuação existe no POST
    if (isset($_POST[$pontuacaoKey]) && !empty($_POST[$pontuacaoKey])) {
        $pontuacoes[] = $_POST[$pontuacaoKey];
        $questoes[$idQuestao] = $_POST[$pontuacaoKey]; //Cria array associativo com id e a pontuação da questão
    } else {
        $errors['questao_pontuacao'] = "Quando uma questão é selecionada sua pontuação deve ser preenchida!"; // Caso a pontuação não esteja definida, enviar erro
    }
  } 
}

if (empty($id_zona)) {
  $errors['zona_planta'] = "O campo Zona é obrigatório";
}

if (empty($id_especie)) {
  $errors['especie_planta'] = "O campo Espécie é obrigatório";
}

if (empty($pontuacaoPlanta)) {
  $errors['Pontuacao'] = "O campo Pontuação é obrigatório!";
} elseif (!preg_match('/^\d{2}$/', $pontuacaoPlanta)) {
  $errors['Pontuacao'] = "O campo Pontuação deve conter 2 ou menos dígitos!";
}

if (!empty($errors)) {
  $idEditarPlanta = $id_planta;
  require_once("editarPlanta.php");
  exit;
}

//Criar o objeto planta
$plantaCont = new PlantaController();
$planta = new Planta();

if ($imagem['error'] === UPLOAD_ERR_NO_FILE) {
  $planta->setImagemPlanta($imagemAtual);
} else {
  $plantaCont->apagarImagem($id_planta);
  // Um arquivo foi enviado, você pode processá-lo aqui
  $extensao = pathinfo($imagem['name'], PATHINFO_EXTENSION);
  $nome_imagem = md5(uniqid($imagem['name'])) . "." . $extensao;
  $caminho_imagem = "../../../../private/plantas/" . $nome_imagem;
  move_uploaded_file($imagem["tmp_name"], $caminho_imagem);

  $planta->setImagemPlanta($caminho_imagem);
}

$planta->setIdPlanta($id_planta);
$planta->setNomeSocial($nomeSocial);
$planta->setCodNumerico($Cod_Numerico);
$planta->setPontos($pontuacaoPlanta);
$planta->setPlantaHistoria($historia);

$zona = new Zona($id_zona);
$planta->setZona($zona);

$especie = new Especie($id_especie);
$planta->setEspecie($especie);

$usuario = new Usuario($id_usuario);
$planta->setUsuario($usuario);

//Chamar o controler para salvar o planta
$plantaCont = new PlantaController();
$plantaCont->atualizar($planta, $questoes);

//Redireciona para o início
header("location: listPlantas.php");

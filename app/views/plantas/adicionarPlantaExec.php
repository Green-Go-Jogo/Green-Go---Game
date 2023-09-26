<?php
#Arquivo para executar a inclusão de um personagem
require __DIR__."/../../api/phpqrcode/qrlib.php";
include_once(__DIR__."/../../models/PlantaModel.php");
include_once(__DIR__."/../../models/ZonaModel.php");
include_once(__DIR__."/../../models/UsuarioModel.php");
include_once(__DIR__."/../../controllers/PlantaController.php");

//Capturar os valores vindos do formulário
if (isset($_POST["Nome_Social"])) {
  $nomeSocial = $_POST["Nome_Social"];
} 
else {
  $nomeSocial = null;
};
$Cod_Numerico = $_POST['Cod_Numerico'];
$pontuacao = $_POST['Pontuacao'];
$historia = $_POST['Historia'];
$imagem = $_FILES['imagem'];
$id_zona = $_POST['zona_planta'];
$id_especie = $_POST['especie_planta'];
$id_usuario = $_POST['id_usuario'];

//Tratar a imagem
$extensao = pathinfo($imagem['name'], PATHINFO_EXTENSION);
$nome_imagem = md5(uniqid($imagem['name'])).".".$extensao;
$caminho_imagem = "../../public/plantas/" . $nome_imagem;
move_uploaded_file($imagem["tmp_name"], $caminho_imagem);

//Validar dados
$errors = array();

if (empty($id_zona)) {
  $errors['zona_planta'] = "O campo Zona é obrigatório";
} 

if (empty($id_zona)) {
  $errors['zona_planta'] = "O campo Zona é obrigatório";
} 

if (empty($id_especie)) {
  $errors['especie_planta'] = "O campo Espécie é obrigatório";
} 

if (empty($pontuacao)) {
  $errors['Pontuacao'] = "O campo Pontuação é obrigatório!";
} elseif (!preg_match('/^\d{2}$/', $pontuacao)) {
  $errors['Pontuacao'] = "O campo Pontuação deve conter 2 ou menos dígitos!";
}


if (!empty($errors)) {
    require_once("adicionarPlanta.php");
    exit;
  }


//Criar o objeto planta


$planta = new Planta();
$planta->setNomeSocial($nomeSocial);
$planta->setCodNumerico($Cod_Numerico);
$planta->setPontos($pontuacao);
$planta->setPlantaHistoria($historia);
$planta->setImagemPlanta($caminho_imagem);

$zona = new Zona($id_zona);
$planta->setZona($zona);

$especie = new Especie($id_especie);
$planta->setEspecie($especie);

$usuario = new Usuario($id_usuario);
$planta->setUsuario($usuario);

//Chamar o controler para salvar o planta
$plantaCont = new PlantaController();
$plantaCont->salvar($planta);

//Redireciona para o início
header("location: listPlantas.php");

?>
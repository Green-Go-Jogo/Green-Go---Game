<?php
#Arquivo para executar a inclusão de um personagem

include_once(__DIR__."/../../models/planta.php");
include_once(__DIR__."/../../models/zona.php");
include_once(__DIR__."/../../controllers/planta_controller.php");

//Capturar os valores vindos do formulário
$id = $_POST["id_planta"];
$nomeSocial = $_POST["Nome_Social"];
$Cod_Numerico = $_POST['Cod_Numerico'];
$pontuacao = $_POST['Pontuacao'];
$historia = $_POST['Historia'];
$imagem = $_FILES['imagem'];

$extensao = pathinfo($imagem['name'], PATHINFO_EXTENSION);
$nome_imagem = md5(uniqid($imagem['name'])).".".$extensao;
$caminho_imagem = "../../public/plantas/" . $nome_imagem;
move_uploaded_file($imagem["tmp_name"], $caminho_imagem);

$id_zona = $_POST['zona_planta'];

//Criar o objeto personagem
$planta = new Planta();
$planta->setIdPlanta($id);
$planta->setNomeSocial($nomeSocial);
$planta->setCodNumerico($Cod_Numerico);
$planta->setImagemPlanta($caminho_imagem);
$planta->setPontos($pontuacao);
$planta->setPlantaHistoria($historia);

$zona = new Zona($id_zona);
$planta->setZona($zona);

//Chamar o controler para salvar o planta
$plantaCont = new PlantaController();
$plantaCont->atualizar($planta);

//Redireciona para o início
header("location: listPlantas.php");

?>
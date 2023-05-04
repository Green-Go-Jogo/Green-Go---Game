<?php
#Arquivo para executar a inclusão de um personagem

include_once(__DIR__."/../../models/EspecieModel.php");
include_once(__DIR__."/../../controllers/EspecieController.php");

//Capturar os valores vindos do formulário
$nomePopular = $_POST["Nome_Social"];
$nomeCientifico = $_POST['Cod_Numerico'];
$descricao = $_POST['Pontuacao'];
$frutifera = $_POST['Historia'];
$comestivel = $_POST['Pontuacao'];
$raridade = $_POST['Historia'];
$medicinal = $_POST['Pontuacao'];
$toxidade = $_POST['Historia'];
$exotica = $_POST['Pontuacao'];
$imagem = $_FILES['imagem'];

$extensao = pathinfo($imagem['name'], PATHINFO_EXTENSION);
$nome_imagem = md5(uniqid($imagem['name'])).".".$extensao;
$caminho_imagem = "../../public/especies/" . $nome_imagem;
move_uploaded_file($imagem["tmp_name"], $caminho_imagem);

//Criar o objeto personagem
$especie = new Especie();
$especie->setIdEspecie($);
$especie->setNomePopular($);
$especie->setNomeCientifico($);
$especie->setDescricao($);
$especie->setImagemEspecie($);
$especie->setFrutifera($);
$especie->setComestivel($);
$especie->setRaridade($);
$especie->setMedicinal($);
$especie->setToxidade($);
$especie->setExotica($);

//Chamar o controler para salvar o planta
$especieCont = new EspecieController();
$especieCont->salvar($especie);

//Redireciona para o início
header("location: listEspecies.php");

?>
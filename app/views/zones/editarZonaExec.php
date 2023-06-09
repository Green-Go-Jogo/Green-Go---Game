<?php
#Arquivo para executar a inclusão de uma zona

include_once(__DIR__."/../../models/ZonaModel.php");
include_once(__DIR__."/../../controllers/ZonaController.php");

//Capturar os valores vindos do formulário
$nomeZona = $_POST["Nome_Zona"];
$id = $_POST["id_zona"];

$errors = array();

if (empty($nomeZona)) {
    $errors['Nome_Zona'] = "O campo Nome Zona é obrigatório.";
  } elseif (!preg_match('/^[a-zA-Z0-9\s]+$/', $nomeZona)) {
    $errors['Nome_Zona'] = "O campo Nome Zona contém caracteres especiais.";
  }
  elseif (strlen($nomeZona) < 4) {
    $errors['Nome_Zona'] = "O campo Nome Zona deve conter pelo menos 4 caracteres.";
  }

  if (!empty($errors)) {
    $idEditarZona = $id; require_once ("editarZona.php");
    exit;
}


//Criar o objeto zona
$zona = new Zona();
$zona->setIdZona($id);
$zona->setNomeZona($nomeZona);


//Chamar o controler para salvar a zona
$zonaCont = new ZonaController();
$zonaCont->atualizar($zona);

//Redireciona para o início
header("location: listZonas.php");

?>
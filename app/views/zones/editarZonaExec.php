<?php
#Arquivo para executar a inclusão de uma zona

include_once(__DIR__."/../../models/ZonaModel.php");
include_once(__DIR__."/../../controllers/ZonaController.php");

//Capturar os valores vindos do formulário
$nomeZona = $_POST["Nome_Zona"];
$id = $_POST["id_zona"];
$id_usuario = $_POST['id_usuario'];

$errors = array();

if (empty($nomeZona)) {
    $errors['Nome_Zona'] = "O campo Nome Zona é obrigatório.";
  }
  elseif (strlen($nomeZona) < 3) {
    $errors['Nome_Zona'] = "O campo Nome Zona deve conter pelo menos 3 caracteres.";
  }

  if (!empty($errors)) {
    $idEditarZona = $id; require_once ("editarZona.php");
    exit;
}


//Criar o objeto zona
$zona = new Zona();
$zona->setIdZona($id);
$zona->setNomeZona($nomeZona);
$zona->setUsuario($id_usuario);


//Chamar o controler para salvar a zona
$zonaCont = new ZonaController();
$zonaCont->atualizar($zona);

//Redireciona para o início
header("location: listZonas.php");

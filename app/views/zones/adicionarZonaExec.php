<?php
#Arquivo para executar a inclusão de uma zona

include_once(__DIR__."/../../models/ZonaModel.php");
include_once(__DIR__."/../../controllers/ZonaController.php");

//Capturar os valores vindos do formulário
$nomeZona = $_POST["Nome_Zona"];
$id_usuario = $_POST['id_usuario'];

$errors = array();

if (empty($nomeZona)) {
    $errors['Nome_Zona'] = "O campo Nome Zona é obrigatório.";
  }
  elseif (strlen($nomeZona) < 3) {
    $errors['Nome_Zona'] = "O campo Nome Zona deve conter pelo menos 3 caracteres.";
  }

  if (!empty($errors)) {
    require_once("adicionarZona.php");
    exit;
  }

//Criar o objeto zona
$zona = new Zona();
$zona->setNomeZona($nomeZona);
$zona->setUsuario($id_usuario);


//Chamar o controler para salvar a zona
$zonaCont = new ZonaController();
$zonaCont->salvar($zona);

//Redireciona para o início
header("location: listZonas.php");

<?php

include_once(__DIR__."/../../models/UsuarioModel.php");
include_once(__DIR__."/../../controllers/UsuarioController.php");
$usuarioCont = new UsuarioController();

$idUsuario = $_POST['id_usuario'];
$nomeUsuario = $_POST["field_nome"];
$login = $_POST['field_login'];
$email = $_POST['field_email'];
$senha = $_POST['field_password'];
$genero = $_POST['field_genero'];
$escolaridade = $_POST['field_escolaridade'];

$errors = array();

if (empty($nomeUsuario)) {
  $errors['nomeUsuario'] = "O campo Nome Completo é obrigatório";
} 

if (empty($login)) {
  $errors['login'] = "O campo Nome de Usuário é obrigatório";
} 

if (empty($email)) {
  $errors['email'] = "O campo E-mail é obrigatório";
} 

if (empty($genero) || $genero == null) {
  $errors['genero'] = "O campo Gênero é obrigatório!";
} 

if (empty($escolaridade) || $escolaridade == null) {
  $errors['escolaridade'] = "O campo Nível de Escolaridade é obrigatório!";
}

if (!empty($errors)) {
    require_once("editarUsuario.php");
    exit;
  }

$usuario = new Usuario();
$usuario->setIdUsuario($idUsuario);
$usuario->setNomeUsuario($nomeUsuario);
$usuario->setLogin($login);
$usuario->setEmail($email);
$usuario->setGenero($genero);
$usuario->setEscolaridade($escolaridade);

$usuarioCont->atualizar($usuario);

header("location: perfil.php");
?>
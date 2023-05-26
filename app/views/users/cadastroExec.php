<?php

include_once(__DIR__."/../../models/UserModel.php");
include_once(__DIR__."/../../controllers/UserController.php");

$nomeUsuario = $_POST["field_nome"];
$email = $_POST['field_email'];
$senha = $_POST['field_password'];
$genero = $_POST['field_genero'];
$escolaridade = $_POST['field_escolaridade'];
$tipoUsuario = $_POST['aluno'];

$usuario = new Usuario();
$usuario->setNomeUsuario($nomeUsuario);
$usuario->setEmail($email);
$usuario->setSenha($senha);
$usuario->setGenero($genero);
$usuario->setEscolaridade($escolaridade);
$usuario->setTipoUsuario($tipoUsuario);

$usuarioCont = new UserController();
$usuarioCont->salvar($usuario);

header("location: login.php");
?>
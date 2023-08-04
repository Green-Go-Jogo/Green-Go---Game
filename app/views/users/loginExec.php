<?php

include_once(__DIR__."/../../controllers/UsuarioController.php");
include_once(__DIR__."/../../models/UsuarioModel.php");


$email = $_POST['email'];
$senha = $_POST['senha'];

$usuario = new Usuario;
$usuario->setLogin($email);
$usuario->setSenha($senha);

$usuarioCont = new UsuarioController;
$usuarioCont->logar($usuario);

?>


<?php

include_once(__DIR__."/../../models/UsuarioModel.php");
include_once(__DIR__."/../../controllers/UsuarioController.php");

$idUsuario = $_POST['idUsuario'];
$tipoUsuario = $_POST['novoTipoUsuario'];

$usuario = new Usuario();

$usuario->setIdUsuario($idUsuario);
$usuario->setTipoUsuario($tipoUsuario);

$usuarioCont = new UsuarioController();
$usuarioCont->atualizarAcesso($usuario);
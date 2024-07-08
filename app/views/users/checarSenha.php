<?php 
include_once(__DIR__."/../../controllers/UsuarioController.php");

$usuarioCont = new UsuarioController();
$senha = $_POST['senha'];
$idUsuario = $_POST['idUsuario'];

if($usuarioCont->checarSenhaPorIdUsuario($idUsuario, $senha)) {
    echo 'valid';
} else {
    echo 'invalid';
}
<?php
include_once(__DIR__ . "/../../controllers/UsuarioController.php");

$idUsuario = $_POST['idUsuario'];

// Excluir a conta do usuário
$usuarioController = new UsuarioController();
if ($usuarioController->excluir($idUsuario)) {
    echo 'deleted';
} else {
    echo 'error';
}

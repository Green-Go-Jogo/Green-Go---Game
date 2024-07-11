<?php
include_once(__DIR__ . "/../../controllers/UsuarioController.php");

$idUsuario = $_POST['idUsuario'];
$senhaNova = $_POST['senhaNova'];

$senhaNovaHash = password_hash($senhaNova, PASSWORD_DEFAULT);
// Excluir a conta do usuário
$usuarioController = new UsuarioController();
if ($usuarioController->alterarSenha($idUsuario, $senhaNovaHash)) {
    echo 'updated';
} else {
    echo 'error';
}

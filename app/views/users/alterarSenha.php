<?php
include_once(__DIR__ . "/../../controllers/UsuarioController.php");

$senhaNova = $_POST['senhaNova'];

$senhaNovaHash = password_hash($senhaNova, PASSWORD_DEFAULT);
// Excluir a conta do usuário
$usuarioController = new UsuarioController();

if (isset($_POST['idUsuario'])) {
    $idUsuario = $_POST['idUsuario'];
    if ($usuarioController->alterarSenhaPorId($idUsuario, $senhaNovaHash)) {
        echo 'updated';
    } else {
        echo 'error';
    }
}
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    if ($usuarioController->alterarSenhaPorEmail($email, $senhaNovaHash)) {
        echo 'updated';
    } else {
        echo 'error';
    }
}



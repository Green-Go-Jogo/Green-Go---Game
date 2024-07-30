<?php
include_once(__DIR__ . "/../../controllers/UsuarioController.php");
$idUsuario = (isset($_POST['idUsuario'])) ? $_POST['idUsuario'] : (isset($_GET['idUsuario']) ? $_GET['idUsuario'] : 'error');

if($idUsuario == 'error'){
    echo 'error';
}

// Excluir a conta do usuário
$usuarioController = new UsuarioController();
if ($usuarioController->excluir($idUsuario)) {
    echo 'deleted';
    if(isset($_POST['autoDelete'])){
        $usuarioController->sair();
    }
    else {
        header("location: listUsuarios.php");
    }
} else {
    echo 'error';
}

<?php

include_once("../../controllers/UsuarioController.php");

header('Content-Type: application/json');

$emailUsuario = $_POST['email'];
$codigo = $_POST['codigo'];

$usuarioCont = new UsuarioController();
$codigoValidado = $usuarioCont->checarCodigo($emailUsuario, $codigo);
if($codigoValidado){
    echo json_encode(array('status' => 'true'));
} else {
    echo json_encode(array('status' => 'false'));
}
?>
<?php

include_once("../../controllers/PartidaController.php");

include_once("../../controllers/LoginController.php");
LoginController::manterUsuario();

$partidaCont = new PartidaController();
$error = $partidaCont->salvarUsuarioEquipe($_GET['ide'], $_GET['idp']); // Salvar o valor retornado pela função

if ($error !== null) {
    header("Location: escolherEquipe.php?msg=".$error);
}
else {
header("Location: verEquipe.php?ide=". $_GET['ide'] ."&idp=". $_GET['idp']);
}
?>
<?php

include_once("../../controllers/LoginController.php");

$loginCont = new LoginController;
$partidaId = $_POST['partidaId'];
$password = $_POST['password'];

$result = $loginCont->entrarPartida($partidaId, $password); // Chama a função para verificar a senha

if ($result) {
  header("Location: escolherEquipe.php?idp=" . $partidaId );
} else {
  $msg = "Senha inválida!";
    header("Location: listPartidas.php?msg=".$msg);
}
?>

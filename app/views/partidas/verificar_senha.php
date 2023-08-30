<?php

include_once("../../controllers/LoginController.php");

$loginCont = new LoginController;
$partidaId = $_POST['partidaId'];
$password = $_POST['password'];


$result = $loginCont->entrarPartida($partidaId, $password); // Chama a função para verificar a senha

if ($result) {
  header("Location: escolherEquipe.php?id=" . $partidaId);
} else {
    header("Location: listPartidas.php");
}
?>

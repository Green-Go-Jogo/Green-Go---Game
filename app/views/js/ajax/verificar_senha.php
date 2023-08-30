<?php

// include_once("../../controllers/LoginController.php");

// $loginCont = new LoginController;

// $loginCont->entrarPartida($partidaId);

$partidaId = $_POST['partidaId'];
$password = $_POST['password'];

if ($password === "123") {
  
  echo "sucess";

} else {
  echo 'error';
}
?>

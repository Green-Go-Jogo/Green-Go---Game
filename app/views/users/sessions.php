<?php
session_start();

if(isset($_SESSION['ID']) && $_SESSION['TIPO'] == 2){
    $nomeADM = $_SESSION['NOME']; 
    $idADM = $_SESSION['ID'];
}
else if(isset($_SESSION['ALUNO'])){
    header("location: users/login.php");
}
else if (!isset($_SESSION['ADM']) && !isset($_SESSION['ALUNO'])) {
    header("Location: users/login.php");
    exit;
}

?>


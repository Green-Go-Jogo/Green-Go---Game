<?php

session_start();

if(isset($_SESSION['ADM'])){
    $nomeADM = $_SESSION['ADM'];
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


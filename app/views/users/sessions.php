<?php

session_start();

if(isset($_SESSION['adm'])){
    $nomeADM = $_SESSION['adm'];
    $idADM = $_SESSION['id'];
} 
else if(isset($_SESSION['normal'])){
    header("location: users/login.php");
}
else if (!isset($_SESSION['adm']) && !isset($_SESSION['normal'])) {
    header("Location: users/login.php");
    exit;
}

?>
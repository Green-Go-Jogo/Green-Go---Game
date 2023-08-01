<!DOCTYPE html>
<html lang="pt-br">

<?php 

session_start();

if(isset($_SESSION['adm'])){
    $nomeADM = $_SESSION['adm'];
} 
else if(isset($_SESSION['normal'])){
    header("location: users/login.php");
}
else if (!isset($_SESSION['adm']) && !isset($_SESSION['normal'])) {
    header("Location: users/login.php");
    exit;
}
?>


<head>
    <?php include_once("../bootstrap/header.php");?>
    <link rel="stylesheet" href="css/index.css">

</head> 


    <style>


#titulo {
    font-size: 400%;
    margin-left: 26%;
    text-align: center !important;
    color: #338a5f;
    font-family: Poppins;
}

#projeto {
    font-size: 340%;
    border-radius: 5px;
    color: #FFFFFF; 
    margin-left: 43%;
    background-color: #f0b6bc;
    border-style: dashed;
    border-color: #f58c95;
    font-family: Poppins-semibold;
}

#partida {
    font-size: 340%;
    margin-left: 18%;
    border-radius: 5px;
    color: #FFFFFF; 
    background-color: #04574d;
    padding-top: 1%;
    padding-bottom: 1%;
    padding-left: 10%;
    padding-right: 10%;
    border-style: double;
    border-color: #338a5f;
    font-family: Poppins-semibold;
}

</style>

<body>

<br>

<a id="titulo"> PORTAL DO PROFESSOR </a> <br><br>

<div class="w-100">
    
<ul class="pagination pagination-lg justify-content-center flex-wrap flex-column flex-md-row">
    <li class="container" onclick="ativar(this)"> <a href="../views/projetoADM.php" id="projeto"> <img src="../views/img/logo.png" style="width: 30px; margin-right: 5px;">Projeto</a></li> <br>
    <li class="container" onclick="ativar(this)"> <a href="../views/zones/listZonas.php" id="projeto"> <img src="../views/img/logo.png" style="width: 30px; margin-right: 5px;">Zonas</a></li> <br>
    <li class="container" onclick="ativar(this)"> <a href="../views/especies/listEspecies.php" id="projeto"> <img src="../views/img/logo.png" style="width: 30px; margin-right: 5px;">Espécies</a></li> <br>
    <li class="container" onclick="ativar(this)"> <a href="../views/plantas/listPlantas.php" id="projeto"> <img src="../views/img/logo.png" style="width: 30px; margin-right: 5px;">Plantas</a></li> <br>
    <li class="container" onclick="ativar(this)"> <a href="../views/equipes/listEquipes.php" id="projeto"> <img src="../views/img/logo.png" style="width: 30px; margin-right: 5px;">Equipes</a></li> <br>
    <li class="container" onclick="ativar(this)"> <a href="../views/users/perfil.php" id="projeto"> <img src="../views/img/logo.png" style="width: 30px; margin-right: 5px;">Perfil</a></li>
</ul> <br><br>

<ul class="pagination pagination-lg justify-content-center flex-wrap flex-column flex-md-row">
<li class="container" onclick="ativar(this)"> <a href="../views/partidas/adicionarPartida.php" id="partida">Cadastrar Partida</a></li>
</ul> <br><br>

</body>

</html>
<!DOCTYPE html>
<html lang="pt-br">
<?php include_once("../../controllers/LoginController.php");
LoginController::manterUsuario();
LoginController::verificarAcesso([2,3]);
?>


<head>
    <?php include_once("../../bootstrap/header.php");?>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../csscheer/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

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
    <li class="container" onclick="ativar(this)"> <a href="../home/projetoADM.php" id="projeto"> <img src="../../img/logo.png" style="width: 30px; margin-right: 5px;">Projeto</a></li> <br>
    <li class="container" onclick="ativar(this)"> <a href="../zones/listZonas.php" id="projeto"> <img src="../../img/logo.png" style="width: 30px; margin-right: 5px;">Zonas</a></li> <br>
    <li class="container" onclick="ativar(this)"> <a href="../especies/listEspecies.php" id="projeto"> <img src="../../img/logo.png" style="width: 30px; margin-right: 5px;">Espécies</a></li> <br>
    <li class="container" onclick="ativar(this)"> <a href="../plantas/listPlantas.php" id="projeto"> <img src="../../img/logo.png" style="width: 30px; margin-right: 5px;">Plantas</a></li> <br>
    <li class="container" onclick="ativar(this)"> <a href="../equipes/listEquipes.php" id="projeto"> <img src="../../img/logo.png" style="width: 30px; margin-right: 5px;">Equipes</a></li> <br>
    <li class="container" onclick="ativar(this)"> <a href="../users/perfil.php" id="projeto"> <img src="../../img/logo.png" style="width: 30px; margin-right: 5px;">Perfil</a></li>
</ul> <br><br>

<ul class="pagination pagination-lg justify-content-center flex-wrap flex-column flex-md-row">
<li class="container" onclick="ativar(this)"> <a href="../partidas/adicionarPartida.php" id="partida">Cadastrar Partida</a></li>
</ul> 
<?php include_once("../../bootstrap/footer.php");?>

</body>

</html>
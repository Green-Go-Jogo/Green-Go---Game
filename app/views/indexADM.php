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
    <link rel="stylesheet" href="css/cabecalho.css">

</head> 


    <style>

#titulo {
    font-size: 400%;
    margin-left: 25.5%;
    text-align: center !important;
    color: #338a5f;
    font-family: Poppins;
}

#projeto {
    font-size: 340%;
    margin-left: 17%;
    border-radius: 5px;
    color: #FFFFFF; 
    background-color: #f0b6bc;
    padding-top: 1%;
    padding-bottom: 1%;
    padding-left: 4%;
    padding-right: 4%;
    border-style: dashed;
    border-color: #f58c95;
    font-family: Poppins-semibold;
}

#zona {
    font-size: 340%;
    margin-left: 1.5%;
    margin-right: 1.5%;
    border-radius: 5px;
    color: #FFFFFF; 
    background-color: #f0b6bc;
    padding-top: 1%;
    padding-bottom: 1%;
    padding-left: 3.5%;
    padding-right: 3.5%;
    border-style: dashed;
    border-color: #f58c95;
    font-family: Poppins-semibold;
}

#especie {
    font-size: 340%;

    border-radius: 5px;
    color: #FFFFFF; 
    background-color: #f0b6bc;
    padding-top: 1%;
    padding-bottom: 1%;
    padding-left: 2.9%;
    padding-right: 2.9%;
    border-style: dashed;
    border-color: #f58c95;
    font-family: Poppins-semibold;
}

#planta {
    font-size: 340%;
    margin-left: 17%;
    border-radius: 5px;
    color: #FFFFFF; 
    background-color: #f0b6bc;
    padding-top: 1%;
    padding-bottom: 1%;
    padding-left: 3.9%;
    padding-right: 3%;
    border-style: dashed;
    border-color: #f58c95;
    font-family: Poppins-semibold;
}

#equipe {
    font-size: 340%;
    margin-left: 1.5%;
    margin-right: 1.5%;
    border-radius: 5px;
    color: #FFFFFF; 
    background-color: #f0b6bc;
    padding-top: 1%;
    padding-bottom: 1%;
    padding-left: 2%;
    padding-right: 2%;
    border-style: dashed;
    border-color: #f58c95;
    font-family: Poppins-semibold;
}

#conta {
    font-size: 340%;

    border-radius: 5px;
    color: #FFFFFF; 
    background-color: #f0b6bc;
    padding-top: 1%;
    padding-bottom: 1%;
    padding-left: 6.3%;
    padding-right: 6.3%;
    border-style: dashed;
    border-color: #f58c95;
    font-family: Poppins-semibold;
}

#partida {
    font-size: 340%;
    margin-left: 24%;
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

<a id="titulo"> PORTAL DO PROFESSOR </a> <br><br><br><br>

<a href="../views/projetoADM.php" id="projeto">Projeto</a>
<a href="../views/zones/listZonas.php" id="zona">Zonas</a>
<a href="../views/especies/listEspecies.php" id="especie">Espécies</a> <br><br><br>
<a href="../views/plantas/listPlantas.php" id="planta">Plantas</a>
<a href="../views/equipes/listEquipes.php" id="equipe">Equipes</a>
<a href="../views/users/perfil.php" id="conta">Perfil</a> <br><br><br><br><br>
<a href="INSERIR CAMINHO DA PARTIDA" id="partida">Cadastrar Partida</a> <br><br><br><br>

</body>

<div class="container-fluid" id="rodape">
            
            </div>
</html>
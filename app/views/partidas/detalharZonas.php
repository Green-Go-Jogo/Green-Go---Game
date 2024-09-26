<?php

include_once("../../controllers/LoginController.php");
LoginController::manterUsuario();
LoginController::verificarAcesso([1, 2, 3]);
include_once("../../controllers/ZonaController.php");
include_once("../../controllers/PartidaController.php");
include_once("../../controllers/PlantaController.php");

if (!isset($_SESSION['TIPO'])) {
    $tipo = null;
} else {
    $tipo = $_SESSION['TIPO'];
}
if (!isset($_GET['idu'])) {
    $ide = null;
} else {
    $idu = $_GET['idu'];
}
if (!isset($_GET['idp'])) {
    $idp = null;
} else {
    $idp = $_GET['idp'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Zonas da Partida</title>

    <?php include_once("../../bootstrap/header.php"); ?>
    <link rel="stylesheet" href="../csscheer/detalharZona.css">


</head>
<style>

</style>

<body>
    <nav>

        <?php LoginController::navBar($_SESSION['TIPO']); ?>
        <br>

    </nav>


    <div>

    <h1 class="text-center primeirotextoreg"><b>DETALHAMENTOS DAS ZONAS</b></h1>

    </div>
    <br>
    <div class="container text-center"><br>

    <h1 class='msgClique'>Clique no ícone para ver seu progresso na Zona!</h1>
    <br>
        <div class="col-md-12">
        <?php
        $partidaCont = new PartidaController();
        $plantaCont = new PlantaController();
        $zonas = $partidaCont->listarZonasPorPartida($idp);
        // var_dump($zonas);

        foreach($zonas as $zona){
            $idsPlantasZona = $plantaCont->pegarArrayIdsZona($zona->getIdZona());
            $plantasLidas = $_SESSION['PLANTAS_LIDAS'];
            $plantasNaoEncontradas = array_diff($idsPlantasZona, $plantasLidas);
            $totalPlantas = count($idsPlantasZona);
            $totalPlantasEncontradas =  ($totalPlantas - count($plantasNaoEncontradas));
            $totalPlantasEncontradasComZero = str_pad($totalPlantasEncontradas, 2, "0", STR_PAD_LEFT);
            $totalPlantasComZero = str_pad($totalPlantas, 2, "0", STR_PAD_LEFT);
            
            echo "<div class='card'>";
            echo "<div class='card-body'>";
            echo "<div class='fundo'></div>";
            echo "<br><h1 class='plantasEncontradas'>" .  $totalPlantasEncontradasComZero. "/".  $totalPlantasComZero . " <i class='fa-solid fa-seedling' style='color: #04574d;'></i></h1>";
            echo "<a href='detalharPlantas.php?idz=".$zona->getIdZona()."&idu=".$idu."&idp=".$idp."'><img src='../../public/mapa.png' id='zona'></img><a>";
            echo "<h1 class='nomeZona'>". $zona->getNomeZona() . "</h1><br>";
            echo "</div>";
            echo "</div><br>";
            
            
        }
        ?>
        </div>
    </div>
</body>

<?php include_once("../../bootstrap/footer.php"); ?>

</html>
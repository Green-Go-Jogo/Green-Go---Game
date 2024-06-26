<!DOCTYPE html>
<?php
include_once("../../controllers/LoginController.php");
LoginController::manterUsuario();
include_once("../../controllers/ZonaController.php");
include_once("./htmlZona.php");

$idZona = $_GET["id"];

$zonaCont = new ZonaController();
$zona = $zonaCont->buscarPorId($idZona);
$plantas = $zonaCont->buscarPlantasZona($idZona);
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $zona->getNomeZona(); ?></title>
    <?php include_once("../../bootstrap/header.php"); ?>
</head>

<style>

#nome {
    color: #C05367;
    text-decoration: underline dotted;
    font-family: Poppins-Medium;
    font-size: 20px;
}

#primeirotextoreg {
    color: #078071;
    margin-left: 11px;
    margin-top: 35px;
    font-size: 45px;
}

#nomePlanta {
    position: relative;
    color: #04574d;
    font-family: Poppins;
    font-size: 30px;
    top: 100px;
}

#codplanta {
    position: relative;
    color: #7EC4BB;
    text-decoration: underline dotted;
    top: 101px;
}

#pontuacaoplanta {
    position: relative;
    color: #f58c95;
    top: 101px;
}

#atualização {
    position: relative;
    top: 75px; 
}

#nomezinho {
    position: relative;
    top: 85px; 
}

#zonaplanta {
    position: relative;
    color: #338a5f;
    top: 85px;
}


</style>

<body>
    <nav>

        <?php include_once("../../bootstrap/navADM.php"); ?>

    </nav>
    <h1 class="text-center" id="primeirotextoreg"> <?php echo $zona->getNomeZona(); ?></h1>
    <div>
        <?php ZonaHTML::desenhaPlantas($plantas)?>
    </div>
</body>

<?php include_once("../../bootstrap/footer.php"); ?>

</html>
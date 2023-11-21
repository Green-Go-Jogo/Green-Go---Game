<!DOCTYPE html>
<?php
include_once("../../controllers/LoginController.php");
LoginController::manterUsuario();
include_once("../../controllers/ZonaController.php");
include_once("./htmlZona.php");

$idZona = $_GET["id"];

$zonaCont = new ZonaController();
$plantas = $zonaCont->buscarPlantasZona($idZona);
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <?php include_once("../../bootstrap/header.php"); ?>
</head>

<body>
    <nav>

        <?php include_once("../../bootstrap/navADM.php"); ?>

    </nav>

    <div>
        <?php ZonaHTML::desenhaPlantas($plantas)?>
    </div>
</body>

<?php include_once("../../bootstrap/footer.php"); ?>

</html>
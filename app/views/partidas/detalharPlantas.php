<!DOCTYPE html>
<?php
include_once("../../controllers/LoginController.php");
LoginController::manterUsuario();
LoginController::verificarAcesso([1, 2, 3]);
include_once("../../controllers/ZonaController.php");
include_once("../../controllers/PartidaController.php");
include_once("./htmlPartida.php");

$idZona = $_GET["idz"];
$idUsuario = $_GET["idu"];
$idPartida = $_GET["idp"];

$zonaCont = new ZonaController();
$partidaCont = new PartidaController();
$zona = $zonaCont->buscarPorId($idZona);
$plantas = $zonaCont->buscarPlantasZona($idZona);

$arrayQuestoes = $partidaCont->listarQuestoesRespondidas($idPartida, $idUsuario);
$questoesAssociativas = [];
$arrayTemp = explode("|", trim($arrayQuestoes)); // Remover espaços em branco ao redor

$questoesAssociativas = [];
$arrayTemp = explode("|", trim($arrayQuestoes)); // Remover espaços em branco ao redor

foreach ($arrayTemp as $item) {
    $item = trim($item); // Remover espaços em branco do item atual
    
    // Verificar se o item não está vazio antes de processá-lo
    if (!empty($item)) {
        $partes = array_map('trim', explode("=>", $item));
        
        // Verificar se temos exatamente duas partes e que o primeiro elemento não é vazio
        if (count($partes) === 2 && !empty($partes[0])) {
            list($id, $status) = $partes;
            $questoesAssociativas[(int)$id] = ($status === '1');
        }
    }
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $zona->getNomeZona(); ?></title>
    <?php include_once("../../bootstrap/header.php"); ?>
    <link rel="stylesheet" href="../csscheer/detalharPlanta.css">
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

    <?php LoginController::navBar($_SESSION['TIPO']); ?>

    </nav>
    <h1 class="text-center" id="primeirotextoreg"> <?php echo $zona->getNomeZona(); ?></h1>
    <div class="container text-center"><br>
    <div class="col-md-12 text-center">
    <div>
        <?php PartidaHTML::desenhaPlantasEncontradas($plantas, $_SESSION['PLANTAS_LIDAS'], $questoesAssociativas)?>
    </div>
    </div>
    </div>
</body>

<?php include_once("../../bootstrap/footer.php"); ?>

</html>
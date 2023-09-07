<?php
 include_once("../../controllers/PlantaController.php");
 include_once("../../controllers/ZonaController.php");
 include_once("../../controllers/PartidaController.php");
 include_once("../../controllers/EspecieController.php");
 include_once("../zones/htmlZonaForm.php");
 include_once("../especies/htmlEspecie.php");

 include_once("../../controllers/LoginController.php");

    LoginController::manterUsuario();
?>

<?php include_once("../../controllers/ZonaController.php");




 $fromQR = isset($_GET['qrcode']) && $_GET['qrcode'] == true;
 $cod = isset($_GET['cod']) ? $_GET['cod'] : null;
 $ide = isset($_GET['ide']) ? $_GET['ide'] : null;
 $idp = isset($_GET['idp']) ? $_GET['idp'] : null;

 if ($fromQR) {
     if ($_SESSION['PARTIDA']) {
    $partidaCont = new PartidaController();
    $partida = $partidaCont->checarQRCode($_SESSION['PARTIDA'], $idp, $_SESSION['PLANTAS_LIDAS'], $_SESSION['ID']);}
    else {};
    var_dump($_SESSION['PLANTAS_LIDAS']); echo "<br>" . $_SESSION['PONTOS'];

}

 if ($ide !== null) {
 $especieCont = new EspecieController();
 $especie = $especieCont->buscarPorId($ide);
 }

 if ($idp !== null) {
    $plantaCont = new PlantaController();
    $planta = $plantaCont->buscarPorId($idp);
}

 if ($cod !== null) {
    $plantaCont = new PlantaController();
    $planta = $plantaCont->buscarPorCodigo($cod);
}

if ($ide == 24 && $cod == 1206) {
    $ide = 25;
    $cod = 1206;

    $plantaCont = new PlantaController();
    $planta = $plantaCont->buscarPorCodigo($cod);

    $especieCont = new EspecieController();
    $especie = $especieCont->buscarPorId($ide);
    }
   

 $frutifera = $especie->getFrutifera();
 if ($frutifera == 1) { 
     $frut = "<br>"."Frutífera";
 } else { 
     $frut = "";
 };

 $exotica = $especie->getExotica();
 if ($exotica == 1) { 
     $exot = "<br>"."Exótica";
 } else { 
     $exot = "";
 };

 $raridade = $especie->getRaridade();
 if ($raridade == 1) { 
     $rara = "<br>"."Rara";
 } else { 
     $rara = "";
 };

 $toxidade = $especie->getToxidade();
 if ($toxidade == 1) { 
     $tox = "<br>"."Tóxica";
 } else { 
     $tox = "";
 };

 $medicinal = $especie->getMedicinal();
 if ($medicinal == 1) { 
     $med = "<br>"."Medicinal";
 } else { 
     $med = "";
 };

 $comestivel = $especie->getComestivel();
 if ($comestivel == 1) { 
     $come = "<br>"."Comestível";
 } else { 
     $come = "";
 };
 
 if($planta == null) {
    echo "Planta não encontrado!<br>";
    echo "<a href='listPlantas.php'>Voltar</a>";
    exit;
 }
 
?>

<!DOCTYPE html>
<html lang="pt-br">

        <title>
            <?= $planta->getNomeSocial() ?>
        </title>

<head>
    <?php include_once("../../bootstrap/header.php");?>
    <link rel="stylesheet" href="../csscheer/verplanta.css">

</head> 
<style>

.img-responsive {
    width: 130px;
}


body {
    overflow-x: hidden !important;
}

    html, body {
        height: 100%;
    }

    body {
        display: flex;
        flex-direction: column;
        margin: 0;
        padding: 0;
    }

    main {
        flex: 1;
    }
</style>

<nav>

<?php 
if (!isset($_SESSION['TIPO'])) {
    $tipo = 0;
} else {
    $tipo = $_SESSION['TIPO'];
}

LoginController::navBar($tipo);?>

</nav>

    <body>

    <div class="container">

<div class="titulo">
    <div class="row">
        <h1 class="nome text-center" id="nomePlanta">
            <?= $planta->getNomeSocial() ?>
        </h1> </div> <br>

        <h1 class="nome" id="nomeUm">
            <a> Nome Popular: </a> <a style="color: #C05367; font-family: Poppins;"> <?= $especie->getNomePopular() ?> </a>
        </h1>

        <h1 class="nome" id="nomeDois">
            <a> Nome Científico: </a> <i style="color: #C05367; font-family: Poppins;"> <?= $especie->getNomeCientifico() ?></i>
        </h1> </div>

        <div class="container">
        <p class="codigo text-right" id="codigoPlanta">
            Código: <?= $planta->getCodNumerico() ?>
        </p> </div> </div>


<div class="container text-center" id="imagem1Planta">
        <img id="imagemPlanta" src="<?php echo $planta->getImagemPlanta(); ?>"/>
     <br> <br>
     </div>
     <div class="container">
<div> 

<div class=" text-center">
    <p class="descricao text-center" id="pontos">
    Pontos: <?=$planta->getPontos(); ?>
    </p>
    
    <p class=" descricao" id="atributos">
        <?php echo $tox; ?>
        <?php echo $med; ?>
        <?php echo $come; ?>
        <?php echo $exot; ?>
        <?php echo $frut; ?>
        <?php echo $rara; ?>
    </p> </div>

    <br>
    <br>
    <w id="nomespecie"> História da Espécie: </w>
    <h1 class="descricao" id="historiaespecie">
        <?= $especie->getDescricao() ?>
    </h1> <br><br>

    <w id="nomespecie"> História da Planta: </w>
    <h1 class="descricao" id="historiaplanta">
    <?= $planta->getPlantaHistoria() ?>
</h1> <br><br>

<div class="text-center">
<img id="mapa" src="../../public/mapa.png"> 
<w id="zonaencontrada">
<?= $planta->getNomeSocial() ?>
 encontrado na 
<?= $planta->getZona() ?>!
</w> </div>
    
</div>


            <br>
        </div>
        <script src="../bootstrap/bootstrap.min.js"></script>
        
<?php include_once("../../bootstrap/footer.php");?>
</body>
<script>
        $(document).ready(function () {
            $.ajax({
                type: "POST",
                url: "verificar_usuario.php",
                dataType: "json",
                data: {
                    userID: <?php echo $_SESSION["ID"]; ?> // Envie o ID do usuário
                },
                success: function (response) {
                    if (response === true) {
                        // Redirecionar para a página X se a resposta for verdadeira
                        window.location.href = "../partidas/rankPartida.php";
                    } else {
                        // A resposta foi false, pode fazer algo diferente aqui, se necessário
                        console.log("Usuário não válido");
                    }
                },
                error: function () {
                    console.log("Erro ao processar a requisição AJAX");
                }
            });
        });
    </script>
</html>
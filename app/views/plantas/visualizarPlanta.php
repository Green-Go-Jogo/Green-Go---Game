<!DOCTYPE html>
<html lang="en">


<?php
 include_once("../../controllers/PlantaController.php");
 include_once("../../controllers/ZonaController.php");
 include_once("../../controllers/EspecieController.php");
 include_once("../zones/htmlZonaForm.php");
 include_once("../especies/htmlEspecie.php");
 
 $ide = $_GET['ide'];
 $idp = $_GET['idp'];

 $especieCont = new EspecieController();
 $especie = $especieCont->buscarPorId($ide);

 $plantaCont = new PlantaController();
 $planta = $plantaCont->buscarPorId($idp);

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
                $tox = "<br>"."Toxíca";
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


    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            <?= $planta->getNomeSocial() ?>
        </title>

       <?php include_once("../../bootstrap/header.php");?>
       <link rel="stylesheet" href="../css/planta.css">
    </head>

    <nav>
    <?php include_once("../../bootstrap/nav.php");?>
    </nav>

    <body>

    <div class="container">

<div class="titulo">
    <div class="row justify-content-between">
        <h2 class="nome">
            <?= $planta->getNomeSocial() ?>
        </h2>

        <span class="cod align-self-center" href="./EspecieController.php?action=loadFormNew">
            <?= $planta->getCodNumerico() ?>
        </span>
    </div>
</div>

<div class="img-responsive">
        <img src="<?php echo $planta->getImagemPlanta(); ?>"/>
    </div>

<div>
    <p class="descricao">
        <?=$planta->getPlantaHistoria(); ?>
    </p>

    <p class="descricao">
        <?php echo $tox; ?>
   
        <?php echo $med; ?>
   
        <?php echo $come; ?>
   
        <?php echo $exot; ?>
   
        <?php echo $frut; ?>

        <?php echo $rara; ?>
    </p>

    <div class="caixa">
        <a href="">
            Espécie
            <?= $planta->getEspecie() ?>
        </a>
    </div>

    <div class="caixa">
        <a href="">
           <?= $planta->getZona() ?>
        </a>
    </div>

    <div class="qrcode">
        
    </div>
</div>
            <div class="row justify-content-start botoes">
                <!--A PARTIR DAQUI, QUANDO CLICADO PARA VER DETALHES (VALE PARA TODOS OS USUARIOS!!)
                <div class="col-auto min-content">
                    <a class="qrcode" href=".">
                        QR CODE
                    </a>
                </div>-->
            </div>

            <br><br>
        </div>
    </body>

</html>
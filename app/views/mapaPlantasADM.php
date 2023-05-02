<?php session_start(); ?>
<?php if (isset($_SESSION['msg_erro'])): ?>
    <span>
        <?= $_SESSION['msg_erro'] ?>
    </span>
<?php endif ?>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//include_once __DIR__ . "/../helpers/mensagem.php";
//$caminho = __DIR__ . "/../helpers/mensagem.php";
//print_r($caminho); 
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <?php include_once("../bootstrap/header.php");?>

</head>


<nav>

    <?php include_once("../bootstrap/navADM.php");?>

</nav>

<body id="fundoindex">
    <main>
        <div class="container">
            <div class="row justify-content-md-center">
                <div id="about-area">

                    <div class="row">
                        <div class="col" id="textoindex">

                            <div class="img-responsive">
                                <a href="..\controllers\EspecieController.php?action=EspeciesMapa"><img src="../public/mapa.svg" class="img-fluid" alt="mapa ifpr"
                                        id="mapa-da-home">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CASO O FILTRO ESTEJA APLICADO, PODE ADICIONAR O checked NO CLASS DO BOTAO -->
            <div class="row">
                <div class="col" id="botoesmapa">
                    <a class="btn btn-primary" id="todosbotao"
                        href="..\controllers\EspecieControllerADM.php?action=EspeciesMapa">
                        Todos
                    </a>

                    <a class="btn btn-primary" id="botaozona"
                        href="..\controllers\PlantaControllerADM.php?action=verZona&idZona=1">
                        Zona 1
                    </a>

                    <a class="btn btn-primary" id="botaozona"
                        href="..\controllers\PlantaControllerADM.php?action=verZona&idZona=2">
                        Zona 2
                    </a>

                    <a class="btn btn-primary" id="botaozona"
                        href="..\controllers\PlantaControllerADM.php?action=verZona&idZona=3">
                        Zona 3
                    </a>

                    <a class="btn btn-primary" id="botaozona"
                        href="..\controllers\PlantaControllerADM.php?action=verZona&idZona=4">
                        Zona 4
                    </a>

                    <a class="btn btn-primary" id="botaozona"
                        href="..\controllers\PlantaControllerADM.php?action=verZona&idZona=5">
                        Zona 5
                    </a>

                    <a class="btn btn-primary" id="botaozona" 
                        href="..\controllers\PlantaControllerADM.php?action=verZona&idZona=6">
                        Zona 6
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col" id="linhasecundaria">
                    <a class="btn btn-primary" id="botoesfileira2" 
                        href="..\controllers\EspecieControllerADM.php?action=verFrutifera">
                        Frutiferas
                    </a>

                    <a class="btn btn-primary" id="botoesfileira2"
                        href="..\controllers\EspecieControllerADM.php?action=verExotica">
                        Exóticas
                    </a>

                    <a class="btn btn-primary" id="botoesfileira2"
                        href="..\controllers\EspecieControllerADM.php?action=verMedicinal">
                        Medicinais
                    </a>

                    <a class="btn btn-primary" id="botoesfileira2"
                        href="..\controllers\EspecieControllerADM.php?action=verToxidade">
                        Tóxicas</a>

                    <a class="btn btn-primary" id="botoesfileira2"
                        href="..\controllers\EspecieControllerADM.php?action=verRaridade">
                        Raras
                    </a>

                    <a class="btn btn-primary" id="botoesfileira2"
                        href="..\controllers\EspecieControllerADM.php?action=verComestivel">
                        Comestíveis
                    </a>

                    <div class="w-100"></div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="col">
                <div class="row">

                    <!--PHP FOREACH AQUI-->
                    <?php foreach ($data['plantas'] as $planta): ?>
                    <a href="./PlantaControllerADM.php?action=verPlanta&idPlanta=<?= $planta['idPlanta'] ?>">
                    <div class="quadrado">
                        <div class="ind align-items-center justify-content-center">
                        <?= $planta['nomeSocial'] ?>
                        </div>

                        <div class="cod align-items-center justify-content-center">
                        <?= $planta['codNumerico'] ?>
                        </div>
                    </div>
                    <?php endforeach;?>

                </div>
            </div>
        </div>
        <br><br>

    </main>
</body>
</hmtl>
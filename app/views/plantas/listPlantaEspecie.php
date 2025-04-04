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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indivíduos na Espécie</title>

    <!--FAVICON-->
    <link rel="icon" href="../public/favicon.svg">
    <!-- Fonte -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;700&display=swap" rel="stylesheet">
    <!--BOOTSTRAP-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../views/css/listPlanta.css">

    <!--scripts-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
    <!-- Progress bar -->
    <script src="js/progressbar.min.js"></script>
    <!-- Parallax -->
    <script src="https://cdn.jsdelivr.net/parallax.js/1.4.2/parallax.min.js"></script>
    <?php include_once("../../bootstrap/header.php");?>
    <link rel="stylesheet" href="css/index.css">

</head>


<nav>

    <?php include_once("../../bootstrap/navJog.php");?>

</nav>

<body>
    <div class="container">

        <div class="row justify-content-between">
            <h2 class="titulo">
                Indivíduos na < NOME DA ESPECIE >
            </h2>

            <a class="mais align-self-center" href="./PlantaController.php?action=loadFormNew">
                <img class="mais " src="../public/mais.svg">
            </a>
        </div>

        <!--CASO NAO TENHA NENHUMA NO BD MOSTRAR ISSO-->

        <!--
        <div class="row justify-content-between align-content-start">
            <div class="col justify-content-start">
                <p id="nenhuma">
                    Puts, nenhuma planta por enquanto!
                    <br>
                    <span class="adicione">Adicione no ícone de mais +</span>
                </p>
            </div>
            <div class="col justify-content-end">
                <img class="align-content-end img-flecha" src="../public/flecha.svg">
            </div>
        </div>
        -->

        <div class="row justify-content-evenly align-content-start">
            <?php foreach ($data['plantas'] as $planta): ?>
                <a href="./PlantaController.php?action=verPlanta&idPlanta=<?= $planta['idPlanta'] ?>">
                    <div class="col- planta">
                        <div class="row">
                            <div class="col-sm">
                                <h3 class="nome-soc">
                                    <?= $planta['nomeSocialial'] ?>
                                </h3>

                                <h3 class="codigo">
                                    <?= $planta['codNumerico'] ?>
                                </h3>

                                <p>
                                    ID PLANTA
                                    <?= $planta['idPlanta'] ?><br>

                                    ID ESPECIE
                                    <?= $planta['idEspecie'] ?><br>

                                    <a href="./PlantaController.php?action=verZona&idZona=<?= $planta['idZona'] ?>">
                                        ID ZONA <?= $planta['idZona'] ?>
                                    </a>
                                </p>

                                <div class="row justify-content-start" style="display: -webkit-box;">
                                    <!--EDITAR-->
                                    <div class="col-auto">
                                        <a class="editar"
                                            href="./PlantaController.php?action=edit&idPlanta=<?= $planta['idPlanta'] ?>">Editar</a>
                                    </div>

                                    <!--EXCLUIR-->
                                    <div class="col-auto">
                                        <a class="excluir"
                                            href="./PlantaController.php?action=deletePlantaById&id=<?= $planta['idPlanta'] ?>">Excluir</a>
                                    </div>
                                </div>

                                <div class="row justify-content-evenly" style="display: -webkit-box;">
                                    <!--QR CODE-->
                                    <div class="col-7">
                                        <a class="qrcode"
                                            href="./PlantaController.php?action=edit&idPlanta=<?= $planta['idPlanta'] ?>">QR CODE</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
    </div>

    <br>
    <br>
</body>

</html>
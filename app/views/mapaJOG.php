<?php session_start(); ?>
<?php if (isset($_SESSION['msg_erro'])): ?>
    <span>
        <?= $_SESSION['msg_erro'] ?>
    </span>
<?php endif ?>


<!DOCTYPE html>
<html lang="pt-br">

<head>

    <?php include_once("../bootstrap/header.php");?>

</head> 


<nav> 

    <?php include_once("../bootstrap/navJog.php");?>
    
</nav>

<body id="fundoindex">
    <main>
        <div class="container">
            <div class="row justify-content-md-center">
                <div id="about-area">

                    <div class="row">
                        <div class="col" id="textoindex">

                            <div class="img-responsive">
                                <a href="..\controllers\EspecieControllerJOG.php?action=EspeciesMapa"><img src="../public/mapa.svg" class="img-fluid" alt="mapa ifpr"
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
                        href="..\controllers\EspecieControllerJOG.php?action=EspeciesMapa">
                        Todos
                    </a>

                    <a class="btn btn-primary" id="botaozona"
                        href="..\controllers\PlantaControllerJOG.php?action=verZona&idZona=1">
                        Zona 1
                    </a>

                    <a class="btn btn-primary" id="botaozona"
                        href="..\controllers\PlantaControllerJOG.php?action=verZona&idZona=2">
                        Zona 2
                    </a>

                    <a class="btn btn-primary" id="botaozona"
                        href="..\controllers\PlantaControllerJOG.php?action=verZona&idZona=3">
                        Zona 3
                    </a>

                    <a class="btn btn-primary" id="botaozona"
                        href="..\controllers\PlantaControllerJOG.php?action=verZona&idZona=4">
                        Zona 4
                    </a>

                    <a class="btn btn-primary" id="botaozona"
                        href="..\controllers\PlantaControllerJOG.php?action=verZona&idZona=5">
                        Zona 5
                    </a>

                    <a class="btn btn-primary" id="botaozona"
                        href="..\controllers\PlantaControllerJOG.php?action=verZona&idZona=6">
                        Zona 6
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col" id="linhasecundaria">
                    <a class="btn btn-primary" id="botoesfileira2"
                        href="..\controllers\EspecieControllerJOG.php?action=verFrutifera">
                        Frutiferas
                    </a>

                    <a class="btn btn-primary" id="botoesfileira2"
                        href="..\controllers\EspecieControllerJOG.php?action=verExotica">
                        Exóticas
                    </a>

                    <a class="btn btn-primary" id="botoesfileira2"
                        href="..\controllers\EspecieControllerJOG.php?action=verMedicinal">
                        Medicinais
                    </a>

                    <a class="btn btn-primary" id="botoesfileira2"
                        href="..\controllers\EspecieControllerJOG.php?action=verToxidade">
                        Tóxicas</a>

                    <a class="btn btn-primary" id="botoesfileira2"
                        href="..\controllers\EspecieControllerJOG.php?action=verRaridade">
                        Raras
                    </a>

                    <a class="btn btn-primary" id="botoesfileira2"
                        href="..\controllers\EspecieControllerJOG.php?action=verComestivel">
                        Comestíveis
                    </a>

                    <div class="w-100"></div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="col">
                <div class="row">
                    <?php foreach ($data['especies'] as $especie): ?>
                        <a href="./EspecieControllerJOG.php?action=verEspecie&idEspecie=<?= $especie['idEspecie'] ?>">
                            <!--CHAMAR O ATRIBUTO DA IMAGEM, QUANDO ESTIVER PRONTA. CASO NAO ESTEJA, EXCLUIR O STYLE-->
                            <div class="quadrado"
                                style="background-image:url('<?= $especie['imagem'] ?>');">
                                <div class="nome align-items-center justify-content-center">
                                    <?= $especie['nomePop'] ?>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
        <br><br>

    </main>
</body>
</hmtl>
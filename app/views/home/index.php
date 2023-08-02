<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php include_once("../../bootstrap/header.php");?>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../csscheer/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* Adicione estilos personalizados aqui, se necessário */
        body {
            overflow-x: hidden;
        }
        @media (max-width: 50%) {

            .row.justify-content-md-left {
                justify-content: center;
                align-items: center;
            }

            .quadrado p {
                text-align: center !important;
            }


            h1 {
                font-size: 24px;
            }


            #imagem-celular {
                width: 80%;
                height: auto;
            }

        }
    </style>
</head>

<body>

<?php include_once("../../bootstrap/nav.php") ?>

    <div class="container">
        <div class="row justify-content-md-left">
            <div id="about-area" class="col-md-6">
                <div class="row">
                    <div class="col" id="textoindex">
                        <h1><br><br>Aprenda <br> com trilhas <br> ecológicas! </h1>
                        <div class="row">
                            <div class="col">
                                <!--<a class="btn btn-secondary jogar" href="index.php">JOGAR</a>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <img src="../../public/mapa 1.svg" class="img-fluid" alt="logo-index"
                        id="mapa-da-home"></a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col quadrado">
                <img src="../../public/projeto.svg" alt="" id="imagenscaixas">
                <p>Projeto de extensão <br> desenvolvido por estudantes do IFPR</p>
            </div>
            <div class="col quadrado">
                <img src="../../public/metodologias.svg" alt="" id="imagenscaixas">
                <p>Educação ambiental <br> através de metodologias ativas</p>
            </div>
           <div class="col quadrado">
                <img src="../../public/codigo.svg" alt="" id="imagenscaixas">
                <p>Plataforma web <br> com código aberto e muito amor</p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-md-left">
            <div class="col">
                <img class="img-fluid" src="../../public/Group 52.svg" alt="celular-greengo" id="imagem-celular">
            </div>
        </div>
    </div>
    <?php include_once("../../bootstrap/footer.php");?>
    <!-- Importe os scripts do Bootstrap no final do body -->
    <script src="../../bootstrap/bootstrap.min.js"></script>
</body>

</html>
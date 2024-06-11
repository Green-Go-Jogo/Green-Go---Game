<?php
include_once("../../controllers/LoginController.php");
LoginController::manterUsuario();
LoginController::verificarAcesso([2, 3]);
include_once(__DIR__ . "/../../connection/Connection.php");
include_once(__DIR__ . "/../../controllers/PlantaController.php");
include_once(__DIR__ . "/htmlPlanta.php");
include_once(__DIR__ . "/../../controllers/EspecieController.php");
include_once(__DIR__ . "/../../models/EspecieModel.php");
include_once(__DIR__ . "/htmlEspecie.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>Plantas</title>
    <?php include_once("../../bootstrap/header.php"); ?>

    <style>
        #imgNull {
            width: 20% !important;
        }

        @media (max-width: 767px) {
            #imgNull {
                width: 40% !important;
            }
        }

        .left,
        .right {
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
            /* Ajuste conforme necessário */
        }

        .bottom {
            display: flex;
            justify-content: space-around;
            /* Distribui os logos uniformemente */
            margin-top: 20px;
            /* Ajuste conforme necessário */
        }
    </style>


</head>

<nav>

    <?php include_once("../../bootstrap/navADM.php"); ?>
    <br>

</nav>

<body>

    <a>
        <h1 class="text-center primeirotextoreg">PLANTAS</h1>
    </a>
    </div><br><br><br>

    <div class="container text-right">
        <div class="container text-left" id="filtroParent">
            <label id="labelBuscar"> Buscar Planta: </label> <br>
            <input type="text" name="buscar" id="buscar" oninput="saveBusca()">
            <br>
            <button id="filtroButton" class="btn" onclick="openFiltros()"> Abrir Filtros </button>
            <br> <br>

        </div>
        <div>
            <?php
            if (isset($_SESSION['filtrado'])) {
                if ($_SESSION['filtrado'] != null) {
                    $plantas = $_SESSION['filtrado'];
                }
            } else {
                $plantaCont = new PlantaController();
                $plantas = $plantaCont->listar();
            }
            if (isset($plantas) != null) {
                PlantaHTML::desenhaPlanta($plantas);
            } else {
                echo "<p>Nenhuma planta encontrada!</p>";
            }
            ?>
        </div>
        <input type="hidden" id="tipoUsuarioLogado" value="<?php echo $_SESSION['TIPO'] ?>">
        <input type="hidden" id="nomeUsuarioLogado" value="<?php echo $_SESSION['NOME'] ?>">
    </div>
    <?php include_once("../../bootstrap/footer.php"); ?>
    <script>
        function prepararImpressao(nomeSocial, nomePopular, nomeCientifico, codNumerico, qrCodeImagem) {

            if (nomeSocial) {
                // Define os valores no modal
                document.getElementById('conteudoParaImpressao').innerHTML = `
        <div class="container">
                <div class="left">
                    <p style="font-size: 25px; margin-top: 30px">Nome Social: </p><p class="conteudo" style="font-size: 25px; margin-top: -30px"><b>${nomeSocial}<br><span style="font-size: 15px">(${nomePopular})<span></b></p>
                    <p style="font-size: 25px; margin-top: 40px">Nome Científico: </p><p class="conteudo" style="font-size: 25px; margin-top: -30px"><i><b>${nomeCientifico}</b></i></p>
                </div>
                <div class="right">
                    <img src="${qrCodeImagem}" alt="QR Code">
                    <p class="conteudo" style="font-size: 25px; margin-top: -10px"><b>${codNumerico}</b></p>
                </div>
                <div class="bottom">
                    <img style="width: 20%; display: none" src="../../public/unila-logo.png" alt="Logo 1">
                    <img style="width: 20%; display: none" src="../../public/if-impressao-logo.png" alt="Logo 2">
                    <img style="width: 20%; display: none" src="../../public/greengoimpressao-logo.png" alt="Logo 3">
                </div>
            </div>
        `;

            } else {

                document.getElementById('conteudoParaImpressao').innerHTML = `
            <div class="container">
                <div class="left">
                    <p style="font-size: 25px; margin-top: 5px">Nome Popular: </p><p class="conteudo" style="font-size: 25px;  margin-top: -30px"><b>${nomePopular}</b></p>
                    <p style="font-size: 25px; margin-top: 40px">Nome Científico: </p><p class="conteudo" style="font-size: 25px; margin-top: -30px"><i><b>${nomeCientifico}</b></i></p>
                </div>
                <div class="right">
                    <img src="${qrCodeImagem}" alt="QR Code">
                    <p class="conteudo" style="font-size: 25px;"><b>${codNumerico}</b></p>
                </div>
                <div class="bottom">
                    <img style="width: 20%; display: none" src="../../public/unila-logo.png" alt="Logo 1">
                    <img style="width: 20%; display: none" src="../../public/if-impressao-logo.png" alt="Logo 2">
                    <img style="width: 20%; display: none" src="../../public/greengoimpressao-logo.png" alt="Logo 3">
                </div>
            </div>
        `;
            }
        }

        function abrirTelaDeImpressao() {
            const conteudoParaImpressao = document.getElementById('conteudoParaImpressao').innerHTML;
            const janela = window.open('', '', 'width=800,height=800');
            janela.document.write('<html><head>');

            // Define o estilo das divs
            janela.document.write(`
    <style>
        @font-face {
            font-family: "Poppins-regular";
            src: url("../fontes/Poppins-Regular.ttf");
        }
        @media print {
            body {
                font-family: "Poppins-regular";
                margin: 0;
            }
            .container {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
                align-items: center;
                width: 100%;
                height: 100%;
                page-break-after: always;
            }
            .left, .right {
                flex: 1 1 45%;
                text-align: center;
                margin-top: 0;
            }
            .left p {
                font-size: 20px;
                margin-top: 0; 
            }
            .bottom {
                display: flex;
                justify-content: space-around;
                align-items: center;
                flex: 1 1 100%;
                text-align: center;
                margin-top: 0;
            }
            .bottom img {
                max-width: 100%;
                max-height: 100%;
                width: auto;
                height: auto;
                margin: 10px;
                display: block !important;
            }
            .right img {
                margin-top: 30px;
                max-width: 100%;
                max-height: 100%;
                width: 70%;
                height: auto;
            }
            .right p {
                letter-spacing: 4px;
                margin-top: -10px;
            }
        }
    </style>
            `);
            // Adiciona estilos para ocultar elementos indesejados na impressão
            janela.document.write('<style>@page { size: auto;  margin: 0mm; } @media print {.no-print { display: none; }}</style>');

            janela.document.write('</head><body>');
            janela.document.write(conteudoParaImpressao);

            janela.document.write('</body></html>');
            janela.document.close();
            janela.focus();

            setTimeout(() => {
                janela.print();
                janela.close();
            }, 1000);

            $('#alertaModal').modal('show');

            const monitorarJanela = setInterval(() => {
            if (janela.closed) {
                // Fecha o modal quando a janela de impressão é fechada
                $('#alertaModal').modal('hide');
                clearInterval(monitorarJanela); // Para de monitorar a janela
            }
        }, 500) 
        }
    </script>

    <script src="../js/ajax/plantaFilter.js"> </script>

</body>

</html>
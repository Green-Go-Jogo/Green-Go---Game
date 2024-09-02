<?php
include_once(__DIR__ . "/../../connection/Connection.php");
include_once(__DIR__ . "/../../controllers/EspecieController.php");
include_once(__DIR__ . "/htmlEspecie.php");
?>
<?php include_once("../../controllers/LoginController.php");
LoginController::manterUsuario();
LoginController::verificarAcesso([2, 3]);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Espécies</title>
    <?php include_once("../../bootstrap/header.php"); ?>


</head>

<style>
    .btn:hover {
        color: #f58c95;
        transform: scale(1.05);
        text-decoration: none;
    }

    body {
        background-color: #ebf0f1;
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

<body>
    <nav>

        <?php include_once("../../bootstrap/navADM.php"); ?>
        <br>

    </nav>

    <h1 class="text-center primeirotextoreg">ESPÉCIES</h1>

    <div style="margin: 40px 10px 0px 10px;">


    </div>
    </div><br><br><br>


    <?php
    $especieCont = new EspecieController();
    $especies = $especieCont->listar();

    EspecieHTML::desenhaEspecie($especies);
    ?>
    </div>

    </div>
    <?php include_once("../../bootstrap/footer.php"); ?>
</body>
<script>
    function prepararImpressao(nomePopular, nomeCientifico, qrCodeImagem) {



        document.getElementById('conteudoParaImpressao').innerHTML = `
            <div class="container">
                <div class="left text-center">
                    <p style="font-size: 25px; margin-top: 5px">Nome Popular: </p><p class="conteudo" style="font-size: 25px;  margin-top: -30px"><b>${nomePopular}</b></p>
                    <p style="font-size: 25px; margin-top: 40px">Nome Científico: </p><p class="conteudo" style="font-size: 25px; margin-top: -30px"><i><b>${nomeCientifico}</b></i></p>
                </div>
                <div class="right">
                    <img src="${qrCodeImagem}" alt="QR Code">
                </div>
                <div class="bottom">
                    <img style="width: 25%; display: none" src="../../public/unila-logo.png" alt="Logo 1">
                    <img style="width: 25%; display: none" src="../../public/if-impressao-logo.png" alt="Logo 2">
                    <img style="width: 25%; display: none" src="../../public/greengoimpressao-logo.png" alt="Logo 3">
                </div>
            </div>
        `;

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
                margin: 5px;
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

</html>
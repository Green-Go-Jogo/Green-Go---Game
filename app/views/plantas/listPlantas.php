<?php
include_once(__DIR__."/../../connection/Connection.php");
include_once(__DIR__."/../../controllers/PlantaController.php");
include_once(__DIR__."/htmlPlanta.php");
?>
<?php include_once("../../controllers/LoginController.php");
LoginController::manterUsuario();
LoginController::verificarAcesso([2, 3]);
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <title>Plantas</title>
    <?php include_once("../../bootstrap/header.php");?>

    <style>
    

    </style>


</head>

<nav>

    <?php include_once("../../bootstrap/navADM.php");?>
    <br>

</nav>

<body>
    
<a>
  <h1 class="text-center primeirotextoreg">PLANTAS</h1> </a>
</div><br><br><br>
        

        <?php
            $plantaCont = new PlantaController();
            $plantas = $plantaCont->listar(); 
            
            PlantaHTML::desenhaPlanta($plantas);
        ?>
        </div>  

</div>
<?php include_once("../../bootstrap/footer.php");?>
<script>
    function prepararImpressao(nomeSocial, nomePopular, nomeCientifico, codNumerico, qrCodeImagem) {
    if (nomeSocial) {
        // Define os valores no modal
        document.getElementById('conteudoParaImpressao').innerHTML = `
        <div class="container">
                <div class="left">
                    <p style="font-size: 20px; margin-top: 65px;">Nome Social: </p><p class="conteudo" style="font-size: 30px; margin-top: -20px"><b>${nomeSocial}<br><span style="font-size: 15px">(${nomePopular})<span></b></p>
                    <p style="font-size: 20px;">Nome Científico: </p><p class="conteudo" style="font-size: 30px; margin-top: -20px"><i><b>${nomeCientifico}</b></i></p>
                    <p style="font-size: 20px;">Código Numérico: </p><p class="conteudo" style="font-size: 45px; margin-top: -20px"><b>${codNumerico}</b></p>
                </div>
                <div class="right">
                    <img src="${qrCodeImagem}" alt="QR Code">
                </div>
            </div>
        `;
    } else {

        document.getElementById('conteudoParaImpressao').innerHTML = `
            <div class="container">
                <div class="left">
                    <p style="font-size: 20px; margin-top: 75px">Nome Popular: </p><p class="conteudo" style="font-size: 30px;  margin-top: -20px"><b>${nomePopular}</b></p>
                    <p style="font-size: 20px;">Nome Científico: </p><p class="conteudo" style="font-size: 30px; margin-top: -20px"><i><b>${nomeCientifico}</b></i></p>
                    <p style="font-size: 20px;">Código Numérico: </p><p class="conteudo" style="font-size: 45px; margin-top: -20px"><b>${codNumerico}</b></p>
                </div>
                <div class="right">
                    <img src="${qrCodeImagem}" alt="QR Code">
                </div>
            </div>
        `;
    }
}

    function abrirTelaDeImpressao() {
    const conteudoParaImpressao = document.getElementById('conteudoParaImpressao').innerHTML;

    const janela = window.open('', '', 'width=800,height=800');
    janela.document.write('<html><head>');
    janela.document.write('<style> @font-face {font-family: "Poppins-regular"; src: url("../fontes/Poppins-Regular.ttf");} @media print{body{font-family:"Poppins-regular";margin:0}.container{display:flex;justify-content:space-between;align-items:center;width:100%;height:100%;page-break-after:always}.left,.right{flex:1;text-align:center;margin-top:0}img{max-width:100%;max-height:100%;width:auto;height:auto}}</style>');
    
    // Adiciona estilos para ocultar elementos indesejados na impressão
    janela.document.write('<style>@page { size: auto;  margin: 0mm; } @media print {.no-print { display: none; }}</style>');
    
    janela.document.write('</head><body>');
    janela.document.write(conteudoParaImpressao);
    
    janela.document.write('</body></html>');
    janela.document.close();

    setTimeout(() => {
        janela.print();
        janela.close();
    }, 1000);
}
</script>


</body>

</html>


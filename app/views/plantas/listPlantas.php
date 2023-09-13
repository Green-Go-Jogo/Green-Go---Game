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
    

        a.editar:hover {
            color: #ebf0f1 !important;
            background-color: #04574d; }

        a.editar{
            color: #ebf0f1 !important;
            background-color: #338a5f; }

        a.excluir:hover {
            color: var(--branco);
            background-color: #f0b6bc ;
            border-radius: 5px; }

            body {
        background-color: #ebf0f1;
    }
    </style>


</head>

<nav>

    <?php include_once("../../bootstrap/navADM.php");?>
    <br>

</nav>

<body>
    
<a>
  <h1 class="text-center primeirotextoreg">PLANTAS</h1> </a>

    <!-- <a class="btn incluir" href="adicionarPlanta.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="90" height="60" fill="#20A494" viewBox="0 0 16 16">
        <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zM8.5 6v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 1 0z"/>
        </svg>
    </a> -->
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
    function prepararImpressao(nomePlanta, codNumerico, qrCodeImagem) {
        // Define os valores no modal
        document.getElementById('conteudoParaImpressao').innerHTML = `
        
            </style>
            <p style="font-size: 30px; font-family: Poppins-regular;">Nome da Planta: ${nomePlanta}</p>
            <p style="font-size: 30px; font-family: Poppins-regular;">Código Numérico: ${codNumerico}</p>
            <img src="${qrCodeImagem}" alt="QR Code">
        `;
    }

    function abrirTelaDeImpressao() {
    const conteudoParaImpressao = document.getElementById('conteudoParaImpressao').innerHTML;

    const janela = window.open('', '', 'width=800,height=800');
    janela.document.write('<html><head>');
    janela.document.write('<style> @font-face {font-family: "Poppins-regular"; src: url("../fontes/Poppins-Regular.ttf");}</style>');
    
    // Adiciona estilos para ocultar elementos indesejados na impressão
    janela.document.write('<style>@page { size: auto;  margin: 0mm; } @media print {.no-print { display: none; }}</style>');
    
    janela.document.write('</head><body>');
    janela.document.write(conteudoParaImpressao);
    
    // Adiciona uma classe CSS "no-print" nos elementos que você deseja ocultar na impressão
    janela.document.write('<div class="no-print">Informações indesejadas</div>');
    
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


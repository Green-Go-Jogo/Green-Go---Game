<?php
include_once(__DIR__."/../../controllers/PartidaController.php");
include_once(__DIR__."/../../controllers/ZonaController.php");
include_once(__DIR__."/../../controllers/EquipeController.php");
include_once(__DIR__."/htmlPartida.php");

$partidaCont = new PartidaController();

if (isset($_GET['idp'])) {
    $id = $_GET['idp'];
} else {
    echo "ID não encontrado na URL.";
}

$partida = $partidaCont->buscarPorId($_GET['idp']); 


?>

<?php include_once("../../controllers/LoginController.php");
LoginController::manterUsuario();
LoginController::verificarAcesso([1]);
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>Escolha uma Equipe</title>
    <?php include_once("../../bootstrap/header.php");?>


</head>



    <style>
    .btn:hover {
        color:#f58c95;
        transform: scale(1.05);
        text-decoration: none;
    }

    body {
        background-color: #ebf0f1;
    }
    .zonaP {
    float: right; /* Alinha a div à direita */
    /* Você pode adicionar mais estilos conforme necessário */
}

.custom-container {
    display: flex;
}

.custom-div {
    padding: 10px;
    position: relative; /* Habilita o posicionamento relativo */
    top: -50px; /* Ajuste conforme necessário para posicionar acima da tabela */
    left: 1200px; /* Ajuste conforme necessário para posicionar à direita */
    /* Você pode ajustar top, right, bottom, left conforme necessário */
}
    </style>

</head>
<body>



    <br>
    <br>
  <h1 class="text-center primeirotextoreg">ESCOLHA UMA EQUIPE</h1>
  

</div>
</div>

        <?php 
            PartidaHTML::desenhaJogadorEquipe($partida);
        ?>

</div>
<br>
<br>
<br>
<br>
<br>
</body>
</html>
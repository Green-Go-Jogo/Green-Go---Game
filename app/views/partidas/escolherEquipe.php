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
        
    body {
        background-color: #ebf0f1;
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

    .row.row-cols-4 {
    display: flex;
    flex-wrap: wrap;
}

.col-md-4 {
    flex-basis: calc(25% - 20px);
    margin-bottom: 20px;
    padding: 10px; 
}


@media (max-width: 767px) {
    .col-md-4 {
        flex-basis: calc(50% - 20px);
    }

    .container.text-center {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
    }

    .row.row-cols-4 {
        justify-content: center;
    }
}


@media (min-width: 768px) and (max-width: 1280px) {
    .col-md-4 {
        flex-basis: calc(50% - 20px);
    }
}

    </style>

</head>
<body>

<?php LoginController::navBar($_SESSION['TIPO']);?>


    <br>
    <br>
  <h1 class="text-center primeirotextoreg">ESCOLHA UMA EQUIPE!</h1>
  

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

<?php include_once("../../bootstrap/footer.php");?>
</body>
</html>
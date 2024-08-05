<?php
include_once("../../controllers/LoginController.php");
LoginController::manterUsuario();
LoginController::verificarAcesso([1, 2, 3]);
include_once(__DIR__ . "/../../controllers/PartidaController.php");
include_once(__DIR__ . "/../../controllers/EquipeController.php");
include_once(__DIR__ . "/../../controllers/UsuarioController.php");
include_once(__DIR__ . "/htmlPartida.php");
?>
<?php

$idPartida = $_GET['id'];
if (isset($_GET['msgReturn'])) {
    $msgReturn = $_GET['msgReturn'];
}

$partidaCont = new PartidaController();
$partida = $partidaCont->buscarPorId($idPartida);

if ($_SESSION['PARTIDA'] == false) {
    unset($_SESSION['PLANTAS_LIDAS']);
    unset($_SESSION['PONTOS_PLANTAS']);
    unset($_SESSION['PONTOS_QUESTOES']);
    unset($_SESSION['QUESTOES_RESPONDIDAS']);

    $_SESSION['PLANTAS_LIDAS'] = array();
    $_SESSION['QUESTOES_RESPONDIDAS'] = array();
    $_SESSION['PONTOS_PLANTAS'] = 0;
    $_SESSION['PONTOS_QUESTOES'] = 0;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Ranking</title>
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
</style>

</head>

<body>
    <nav>

        <?php LoginController::navBar($_SESSION['TIPO']);
        echo "<br>";
        echo "<p class='text-center' id='msg'><b>";
        if (isset($msgReturn)) {
            echo $msgReturn;
        }
        echo "<b></p>"; ?>
        <br>

    </nav>


    <div id="conteudo">
        <?php
        PartidaHTML::desenhaRanking($partida);
        ?>
    </div>


    </div>

    <!-- Formulário de pesquisa -->
    <!-- <div class="text-center" style="color: #C05367;"><a style="color: #C05367;" href="https://docs.google.com/forms/d/e/1FAIpQLSeDybrCyrFW4LFDQYvd5aLoFJFDEpB2bza7e840gRXLv03Ipw/viewform">Acesse o nosso formulário de pesquisa!</a></div> -->
    <br>
    <br>



    <?php include_once("../../bootstrap/footer.php"); ?>
</body>

</html>
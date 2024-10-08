<?php
include_once("../../controllers/LoginController.php");
LoginController::manterUsuario();
LoginController::verificarAcesso([1, 2, 3]);
include_once(__DIR__ . "/../../controllers/PartidaController.php");
include_once(__DIR__ . "/htmlPartida.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Partidas</title>

    <?php include_once("../../bootstrap/header.php"); ?>
    <link rel="stylesheet" href="../csscheer/verpartida.css">


</head>

<body>
    <nav>

        <?php LoginController::navBar($_SESSION['TIPO']); ?>
        <br>

    </nav>

    <h1 class="text-center primeirotextoreg">PARTIDAS</h1>
    <br><br><br>
    <div class="text-center" style="max-width: 200px;">
        <?php
        if (isset($_GET['msg'])) {
            $msg = $_GET['msg'];
            echo '<div class="alert alert-warning align-center">' . htmlspecialchars($msg) . '</div>';
        }
        ?>
    </div>
    <div id='partidas'>
        <?php
        $partidaCont = new PartidaController();
        $partidasNaoIniciada = $partidaCont->listarPorPartidaNaoIniciada();
        $partidasEmAndamento = $partidaCont->listarPorPartidaIniciada();
        $partidasFinalizadas = $partidaCont->listarPorPartidaFinalizada();
        
        PartidaHTML::desenhaPartidaNaoIniciada($partidasNaoIniciada);
        PartidaHTML::desenhaPartidaEmAndamento($partidasEmAndamento);
        PartidaHTML::desenhaPartidaFinalizada($partidasFinalizadas);
        ?>
    </div>


    </div>
    <br>
    <br>
    <br>
    <br>
    <br>


    <?php include_once("../../bootstrap/footer.php"); ?>
</body>

<script>
    $(document).ready(function() {
        $('.entrar-btn').click(function() {
            var partidaId = $(this).data('partida-id');
            $('#partida-id').val(partidaId);
        });
    });

    function mostrarInfo(zonas, equipes) {
        console.log('Zonas:', zonas);
        console.log('Equipes:', equipes);


        document.getElementById('informacoes').innerHTML = `
    <div class="container">
        <h1 style="font-size: 20px;">Zonas: </h1>
            ${zonas.map(zona => `<span>${zona.NomeZona}</span><br>`).join('')}
            <br>
            <h1 style="font-size: 20px;">Equipes: </h1>
            ${equipes.map(equipe => `<span>${equipe.NomeEquipe}</span><br>`).join('')}
    </div>`;
    }
</script>

</html>
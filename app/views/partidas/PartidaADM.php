<?php
include_once(__DIR__."/../../controllers/PartidaController.php");
include_once(__DIR__."/../../controllers/ZonaController.php");
include_once(__DIR__."/../../controllers/EquipeController.php");
include_once(__DIR__."/htmlPartida.php");

$partidaCont = new PartidaController();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    echo "ID não encontrado na URL.";
}

$partida = $partidaCont->buscarPorId($_GET['id']); 

$tempo = $partida->getTempoPartida(); 

?>
<?php include_once("../../controllers/LoginController.php");
LoginController::manterUsuario();
LoginController::verificarAcesso([2, 3]);
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>Dashboard Partida</title>
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
<nav>

<?php include_once("../../bootstrap/navADM.php");?>
<br>

</nav>


    
  <h1 class="text-center primeirotextoreg">PARTIDAS</h1>
  <br><br><br>
  <?php echo "<a href='editarPartida.php?id=".$id."' class='btn btn-primary editar'>Editar</a>";?>
  <br><br>
  <button id="startButton" onclick="startTimer(<?php echo $tempo; ?>)">Iniciar Timer</button>
    <div id="timer"></div>


        <?php 
            PartidaHTML::desenhaPartidaZona($partida);
        ?>

</div>
</div>

        <?php 
            PartidaHTML::desenhaPartidaEquipe($partida);
        ?>

</div>
<br>
<br>
<br>
<br>
<br>
<?php include_once("../../bootstrap/footer.php");?>
</body>

<script>
      
     
        var timerStarted = false;
        var timerPaused = false;
        var startTime = 0;
        var endTime = 0;
        var url = window.location.href;
        var partidaId = url.split('?id=')[1]; // Obtém a parte após o '?id=' na URL


        function startTimer(duration) {
            if (!timerStarted) {
            startTime = Math.floor(Date.now() / 1000);
            endTime = startTime + (duration * 60);
            timerStarted = true;
            timerPaused = false;

            saveTime(partidaId, 'startTime', startTime); // Envie o tempo de início ao iniciar
            updateTimer();
            } else {
            timerPaused = !timerPaused;

            if (timerPaused) {
                saveTime(partidaId, 'endTime', Math.floor(Date.now() / 1000)); // Envie o tempo de término ao pausar
            } else {
                saveTime(partidaId, 'startTime', startTime); // Envie o tempo de início ao reiniciar
            }
        }

            updateButtonState();
        }

        function updateButtonState() {
            var button = document.getElementById("startButton");
            if (timerPaused) {
                button.innerHTML = "Continuar";
            } else {
                button.innerHTML = "Pausar";
            }

            button.disabled = timerPaused;
        }

        function updateTimer() {
            var now = Math.floor(Date.now() / 1000);
            var remainingTime = endTime - now;

            if (remainingTime <= 0) {
                saveTime(partidaId, 'endTime', Math.floor(Date.now() / 1000)); // Envie o tempo de término ao pausar
                document.getElementById("timer").innerHTML = "Tempo expirado!";
            } else {
                var minutes = Math.floor(remainingTime / 60);
                var seconds = remainingTime % 60;

                document.getElementById("timer").innerHTML = "Tempo restante: " + minutes + " minutos e " + seconds + " segundos";

                if (!timerPaused) {
                    setTimeout(updateTimer, 1000);
                }
            }
        }

        function saveTime(partidaId, timeType, timestamp) {
            $.ajax({
                type: "POST",
                url: "save_time.php",
                data: { timeType: timeType, timestamp: timestamp, partidaId: partidaId },
                success: function(response) {
                    console.log("Tempo salvo com sucesso: " + timeType + " - " + timestamp + " - " + partidaId);
                },
                error: function(error) {
                    console.log("Erro ao salvar tempo: " + error);
                }
            });
        }
    </script>
</html>
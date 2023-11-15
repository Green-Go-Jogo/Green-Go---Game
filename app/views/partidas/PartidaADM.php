<?php
include_once("../../controllers/LoginController.php");
$loginCont = new LoginController();
LoginController::manterUsuario();
LoginController::verificarAcesso([2, 3]);
include_once(__DIR__."/../../controllers/PartidaController.php");
include_once(__DIR__."/../../controllers/ZonaController.php");
include_once(__DIR__."/../../controllers/EquipeController.php");
include_once(__DIR__."/htmlPartida.php");

$partidaCont = new PartidaController();

if (isset($_GET['id'])) {
    $idPartida = $_GET['id'];
} else {
    echo "ID não encontrado na URL.";
}

$partida = $partidaCont->buscarPorId($idPartida); 

$tempo = $partida->getTempoPartida(); 

$loginCont->checarAdmPartida($idPartida, $_SESSION['ID']);
?>


<!DOCTYPE html>
<html lang="en">
<head>

    <title>Dashboard Partida</title>
    <?php include_once("../../bootstrap/header.php");?>
    <link rel="stylesheet" href="../csscheer/admpartida.css">


</head>



    <style>
    </style>

</head>
<body>
<nav>

<?php include_once("../../bootstrap/navADM.php");?>
<br>

</nav>


    
  <h1 class="text-center primeirotextoreg">SALA DE CONTROLE</h1>
  
  <div class="text-center">

  <button class="btn timer" onclick="startTimer()"> <i class="fa-regular fa-circle-play" id="play"> </i> </button>
  
  <button class="btn timer"> <i class="fa-regular fa-circle-pause" id="pause"> </i> </button>

  <a class="text-center" id="timer"><?php echo $tempo.":00"; ?> </a> <br>

  <a class="stop" id="encerrar"> Encerrar a partida? </a> </div> </div>

  <br><br>
  <div class="text-center">
  <?php echo "<a href='editarPartida.php?id=".$idPartida."' class='btn btn-primary editar text-center' id='editaradm'>Editar</a>";?>
  <br><br>

    </div>

        <?php 
            PartidaHTML::desenhaPartidaEquipe($partida);
        ?>
        

</div>
</div> <br>

        <?php            
            PartidaHTML::desenhaPartidaZona($partida);
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

                document.getElementById("timer").innerHTML = minutes + ":" + seconds;

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
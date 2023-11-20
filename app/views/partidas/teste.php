<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include_once("../../controllers/PartidaController.php");
  $partidaCont = new PartidaController();
  $partida = $partidaCont->buscarPorId(120);
  $durationFromPHP = $partida->getTempoPartida();
  $dataInicio = $partida->getDataInicio();
  $dataFim = $partida->getDataFim();

  echo $dataFim;
  echo $durationFromPHP;
  echo $dataInicio;

  ?>


<?php include_once("../../bootstrap/header.php");?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Coming Soon Counter</title>
  <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
  <meta name="robots" content="noindex, follow">
  <style>
    /* Adicione estilos CSS conforme necessário */
  </style>
</head>

<body>
  <div class="bg-img1 overlay1 size1 flex-w flex-c-m p-t-55 p-b-55 p-l-15 p-r-15" style="background-image: url('images/bg01.jpg');">
    <div class="wsize1">
      <p class="txt-center p-b-23">
        <i class="zmdi zmdi-card-giftcard cl0 fs-60"></i>
      </p>
      <h3 class="l1-txt1 txt-center p-b-22">Coming Soon / Maintenance Mode Counter</h3>

      <!-- Adicione um botão para iniciar a contagem regressiva -->
      <button id="startCountdown" class="btn iniciar">Start Countdown</button>

      <p class="txt-center m2-txt1 p-b-67" id="countdownMessage"></p>

      <span id="minutes">aa</span>
      <span>:</span>
      <span id="seconds">aa</span>
    </div>
  </div>

  <script>
    var duration = <?php echo $durationFromPHP; ?>;
    var dataInicio = new Date('<?php echo $dataInicio; ?>');
    var dataFim = new Date('<?php echo $dataFim; ?>');
    var countdownInterval;
    var partidaId = 120; //url.split('?id=')[1];

    if (!isNaN(dataFim) && dataFim !== null) {
      document.getElementById("startCountdown").classList.remove("encerrar");
      document.getElementById("startCountdown").classList.remove("iniciar");
      document.getElementById("startCountdown").classList.add("desativado");
    } else if (dataInicio && (dataInicio.getTime() + duration * 60 * 1000 - new Date().getTime()) > 0) {
      console.log(dataInicio)
      var isCountdownRunning = true;
      startCountdown(duration, dataInicio, isCountdownRunning);
    } else {
      console.log("Condições não atendidas para iniciar automaticamente.");
    }

    function startCountdown(duracao, dataInicio, timerBool) {
      var tempoAtual = new Date().getTime();
      var targetDate = dataInicio.getTime() + duracao * 60 * 1000;
      isCountdownRunning = timerBool;

      document.getElementById("startCountdown").classList.remove("iniciar");
      document.getElementById("startCountdown").classList.add("encerrar");
      document.getElementById("countdownMessage").innerHTML = "Countdown in progress...";

      var encerrarButton = document.getElementsByClassName("encerrar")[0];
      if (encerrarButton) {
        encerrarButton.addEventListener("click", function() {
          saveTime(partidaId, 'endTime', Math.floor(Date.now() / 1000));
          stopCountdown();
        });
      }

      countdownInterval = setInterval(function() {
        if (isCountdownRunning) {
          console.log("chegou!")
          var now = new Date().getTime();
          var distance = targetDate - now;
          var minutes = Math.floor(distance / (1000 * 60));
          var seconds = Math.floor((distance % (1000 * 60)) / 1000);

          document.getElementById("minutes").innerHTML = minutes;
          document.getElementById("seconds").innerHTML = seconds;

          if (distance < 0) {
            clearInterval(countdownInterval);
            document.getElementById("minutes").innerHTML = document.getElementById("seconds").innerHTML = "EXPIRED";
          }
        }
      }, 1000);
    }

    function stopCountdown() {
      isCountdownRunning = false;
    }

    var iniciarButton = document.getElementsByClassName("iniciar")[0];
      if (iniciarButton) {
        iniciarButton.addEventListener("click", function() {
          var duration = <?php echo $durationFromPHP; ?>;
          var dataAtual = Date.now();
          var dataInicio = new Date(dataAtual);
          var isCountdownRunning = true;

          console.log(dataInicio);
          console.log(duration)
          saveTime(partidaId, 'startTime', Math.floor(Date.now() / 1000));
          startCountdown(duration, dataInicio, isCountdownRunning);
        });
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

</body>

</html>
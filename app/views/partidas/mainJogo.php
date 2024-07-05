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

$idEquipe = $_GET['ide'];

$idPartida = $_GET['idp'];

$usuarioCont = new UsuarioController();
$usuarios = $usuarioCont->buscarUsuarios($idEquipe, $idPartida);


$equipeCont = new EquipeController();
$equipe = $equipeCont->buscarPorId($idEquipe);


$partidaCont = new PartidaController();
$partida = $partidaCont->buscarPorId($idPartida);

$partida = $partidaCont->buscarPorId($_GET['idp']);
if($partida === null) {
  $_SESSION['PARTIDA'] == false;
  echo "<p class='text-center'>A partida não existe mais! <a style='color: #C05367' href='../home/indexJOG.php'>Clique aqui</a> para a retornar à página inicial!</p>";
  exit;
}
$dataInicio = $partida->getDataInicio();
$dataFim = $partida->getDataFim();
$tempo = $partida->getTempoPartida();


?>


<!DOCTYPE html>
<html lang="en">

<head>

  <title>Jogue!</title>
  <?php include_once("../../bootstrap/header.php"); ?>
  <link rel="stylesheet" href="../csscheer/jogo.css">
  <script src="../../api/html5-qrcode-master/minified/html5-qrcode.min.js"></script>


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
    position: relative;
    /* Habilita o posicionamento relativo */
    top: -50px;
    /* Ajuste conforme necessário para posicionar acima da tabela */
    left: 1200px;
    /* Ajuste conforme necessário para posicionar à direita */
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

  .input-container {
    display: flex;
    justify-content: space-between;
    width: 400px;
  }

  .input-box {
    background-color: #f0b6bc;
    width: 80px;
    height: 80px;
    border: 2px solid #ccc;
    border-color: #c05367;
    text-align: center;
    font-family: Poppins-regular;
    font-size: 24px;
    display: flex;
    align-items: center;
    /* Centralizar verticalmente */
    justify-content: center;
    /* Centralizar horizontalmente */
  }

  #reader {
    width: 100%;
    height: 100%;
  }

  #result {
    text-align: center;
    font-size: 1.5rem;
  }
</style>

</head>

<body>

  <?php LoginController::navBar($_SESSION['TIPO']); ?>

  <br>


  <img src="../../public/divjogo.jpg" id="divjogo"> </img>
  <div class="text-center" id="timercor">
    <img src="../../public/botaotimer.png" id="botaotimer"> </img>
    <div class="circulo" id="timer">
      <span id="minutes" ><?php echo $tempo; ?></span>
      <span >:</span>
      <span id="seconds" >00</span>
    </div>
  </div>

  <br><br>


  <h1 class="text-center" id="encontrartitulo">Encontrou </h1>
  <h1 class="text-center" id="encontrartitulo2">uma planta?</h1>

  <div class="d-flex justify-content-center">
    <div class="input-container">
      <div class="input-box" contenteditable="plaintext-only" id="box1"></div>
      <div class="input-box" contenteditable="plaintext-only" id="box2"></div>
      <div class="input-box" contenteditable="plaintext-only" id="box3"></div>
      <div class="input-box" contenteditable="plaintext-only" id="box4"></div>
    </div>

  </div>
  <br>
  <div class="d-flex justify-content-center">
    <button class="btn submitButton" id="submitButton">Achei uma planta!</button>
    <br>

  </div>

  <div class="text-center">
    <p id="result" style="color:#C05367"></p>
  </div>


  <div class="text-center" id="botoes">

    <a class="btn" href="zona.php">
      <img src="../../public/botaozona.png" id="zona"> </img></a>

    <button type="button" class="btn camerazinha" id="camerazinha" data-toggle="modal" data-target="#qrScannerModal">
      <img src="../../public/botaocamera.png" id="camera"> </img> </button>

    <?php echo "<a class='btn' href='verEquipe.php?ide=" . $idEquipe . '&idp=' . $idPartida . "'>
        <img src='../../public/botaoequipe.png' id='equipe'> </img> </a> " ?>

  </div>

  <!-- MODAL DA CAMERA -->
  <div class="modal fade" id="qrScannerModal" tabindex="-1" role="dialog" aria-labelledby="qrScannerModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="qrScannerModalLabel">Leitor de QR Code</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div id="reader"></div>
          <div id="result"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>
  <br>
  <br>
  <br>
  <br>
  <br>
  <?php include_once("../../bootstrap/footer.php"); ?>
</body>


<!-- CAMERA DO QRCODE -->
<script src="https://cdn.jsdelivr.net/npm/jsqr/dist/jsQR.min.js"></script>
<script src="../js/camera.js"></script>

<!-- INPUT DE CÓDIGO -->
<script>
  const resultDiv = $("#result");

  $(".input-box").on("input", function(event) {
    const inputText = $(this).text();
    const index = $(this).index();

    // Verificar se o texto foi apagado e mover o foco para o campo anterior
    if (inputText === "") {
      if (index > 0) {
        $(".input-box").eq(index - 1).focus();
        $(".input-box").eq(index - 1).text("");
      }
    }

    // Limitar o texto a 1 caractere
    if (inputText.length > 1) {
      $(this).text(inputText[0]);
    }

    // Mover o foco para o próximo campo se houver texto
    if (index < $(".input-box").length - 1 && inputText !== "") {
      $(".input-box").eq(index + 1).focus();
    }
  });

  $(".input-box").on("keydown", function(event) {
    if (event.key === "Backspace" && $(this).text() === "") {
      const index = $(this).index();
      if (index > 0) {
        $(".input-box").eq(index - 1).focus();
        $(".input-box").eq(index - 1).text("");
        event.preventDefault(); // Impedir que o navegador aja como um botão "Backspace" normal
      }
    }
  });

  $("#submitButton").on("click", function() {
    const cod = $(".input-box").map(function() {
      return $(this).text();
    }).get().join("");

    validateCode(cod);
  });

  function validateCode(cod) {
    $.ajax({
      type: "POST",
      url: "../plantas/codigoPlantaExec.php",
      data: {
        cod: cod
      },
      dataType: "json", // Espera uma resposta JSON
      success: function(userResponse) {
        if (userResponse.isValid === true) {
          window.location.href = "../plantas/visualizarPlanta.php?idp=" + userResponse.idPlanta + "&ide=" + userResponse.idEspecie + "&code=true";
        } else {
          resultDiv.text("Esse código não pertence a uma planta!");
        }
      },
      error: function() {
        resultDiv.text("Erro na solicitação.");
      }
    });
  }
</script>

<!-- TIMER -->
<script>
  var duration = <?php echo $tempo; ?>;
  var dataInicio = new Date('<?php echo $dataInicio; ?>');
  var dataFim = new Date('<?php echo $dataFim; ?>');
  var countdownInterval;
  var url = window.location.href;
  var partidaId = url.split('?idp=')[1];

  if (!isNaN(dataFim) && dataFim !== null) {
    document.getElementById("startCountdown").classList.remove("encerrar");
    document.getElementById("startCountdown").classList.remove("iniciar");
    document.getElementById("startCountdown").classList.add("desativado");
    document.getElementById("minutes").innerHTML = "00";
    document.getElementById("seconds").innerHTML = "00";
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

    countdownInterval = setInterval(function() {
      if (isCountdownRunning) {
        var now = new Date().getTime();
        var distance = targetDate - now;
        var minutes = Math.floor(distance / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById("minutes").innerHTML = minutes;
        document.getElementById("seconds").innerHTML = seconds;

        if (distance < 0) {
          clearInterval(countdownInterval);
          document.getElementById("minutes").innerHTML = document.getElementById("seconds").innerHTML = "00";
          saveTime(partidaId, 'endTime', Math.floor(Date.now() / 1000));
        }
      }
    }, 1000);
  }

  function stopCountdown() {
    isCountdownRunning = false;
  }
</script>

<script>
    function atualizarDados() {
        // Verifique se a variável de sessão PARTIDA é verdadeira
        var partidaAtiva = <?php echo ($_SESSION['PARTIDA'] ? 'true' : 'false'); ?>;

        if (partidaAtiva === true) {
            // A variável de sessão PARTIDA é verdadeira
            $.ajax({
                type: "POST",
                url: "rankingExec.php",
                dataType: "json",
                data: {
                    userID: <?php echo $_SESSION["ID"]; ?> // Envie o ID do usuário
                },
                success: function(userResponse) {
                    if (userResponse.isValid === true) {
                        // Redirecionar para a página se a resposta for verdadeira
                        window.location.href = "../partidas/rankPartida.php?id=" + userResponse.idPartida;
                    } else {

                    }
                },
                error: function() {
                    console.log("O Rank ainda não foi definido!");
                }
            });
        } else {
            // A variável de sessão PARTIDA não é verdadeira
            console.log("Partida não está ativa");
        }
    };

    atualizarDados();

    // Usar setInterval para chamar a função a cada x milissegundos.
    setInterval(atualizarDados, 15000); // Atualizar a cada segundo (1000 ms).
</script>
</html>
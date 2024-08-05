<?php
include_once("../../controllers/LoginController.php");
$loginCont = new LoginController();
LoginController::manterUsuario();
LoginController::verificarAcesso([2, 3]);
include_once(__DIR__ . "/../../controllers/PartidaController.php");
include_once(__DIR__ . "/../../controllers/ZonaController.php");
include_once(__DIR__ . "/../../controllers/EquipeController.php");
include_once(__DIR__ . "/htmlPartida.php");

$partidaCont = new PartidaController();

if (isset($_GET['id'])) {
    $idPartida = $_GET['id'];
} else {
    echo "ID não encontrado na URL.";
}

$partida = $partidaCont->buscarPorId($idPartida);
if ($partida === null) {
    echo "<p class='text-center'>A partida não existe mais! <a style='color: #C05367' href='../home/indexADM.php'>Clique aqui</a> para a retornar à página inicial!</p>";
    exit;
}
$dataInicio = $partida->getDataInicio();
$dataFim = $partida->getDataFim();
$tempo = $partida->getTempoPartida();

$loginCont->checarAdmPartida($idPartida, $_SESSION['ID']);
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <title>Dashboard Partida</title>
    <?php include_once("../../bootstrap/header.php"); ?>
    <link rel="stylesheet" href="../csscheer/admpartida.css">


</head>



<style>
</style>

</head>

<body>
    <nav>

        <?php include_once("../../bootstrap/navADM.php"); ?>
        <br>

    </nav>



    <h1 class="text-center primeirotextoreg">SALA DE CONTROLE</h1>

    <div class="text-center">
        <div>
            <button id="startCountdown" class="btn timer iniciar"> <i class="fa-regular fa-circle-play" id="play"> </i> </button>

            <!-- <button class="btn timer"> <i class="fa-regular fa-circle-pause" id="pause"> </i> </button> -->

            <span id="minutes" class="timer-text"><?php echo $tempo; ?></span>
            <span class="timer-text">:</span>
            <span id="seconds" class="timer-text">00</span>
            <div id="statusDiv">
                <br>
                <a class="stop" id="encerrar">Aguardando a partida ser iniciada!</a>
            </div>
        </div>

        <br><br>
        <div class="text-center">
            <?php echo "<a href='editarPartida.php?id=" . $idPartida . "' class='btn btn-primary editar text-center' id='editaradm'>Editar</a>"; ?>
            <br><br>
        </div>
        <div id="equipes">
            <?php
            PartidaHTML::desenhaPartidaEquipe($partida);
            ?>
        </div>

    </div>
    </div> <br>

    <?php
    PartidaHTML::desenhaPartidaZona($partida);
    ?>

    <div id="conteudo">
        <?php
        PartidaHTML::desenhaPartidaAlunos($partida);
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
    function atualizarDados() {
        // Fazer uma requisição AJAX para atualizar os dados
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Atualizar o conteúdo da div com os novos dados
                document.getElementById("conteudo").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "atualizarAlunos.php?idp=<?php echo $idPartida; ?>", true);
        xhttp.send();
    }

    // Chamar a função para atualizar os dados inicialmente ao carregar a página.
    atualizarDados();

    // Usar setInterval para chamar a função a cada x milissegundos.
    setInterval(atualizarDados, 12000); // Atualizar a cada segundo (1000 ms).
</script>
<script>
    function atualizarDadosEquipes(idEquipe) {
        document.getElementById('informacoes').innerHTML = "";
        // Fazer uma requisição AJAX para atualizar os dados
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                
                var data = JSON.parse(this.responseText);
                mostrarInfo(data);
            }
        };
        xhttp.open("GET", "atualizarEquipes.php?idp=<?php echo $idPartida; ?>&ide="+ idEquipe+"", true);
        xhttp.send();
    }
</script>

<script>
    var duration = <?php echo $tempo; ?>;
    var dataInicio = new Date('<?php echo $dataInicio; ?>');
    var dataFim = new Date('<?php echo $dataFim; ?>');
    var countdownInterval;
    var url = window.location.href;
    var partidaId = url.split('?id=')[1];

    if (!isNaN(dataFim) && dataFim !== null) {
        document.getElementById("startCountdown").classList.remove("iniciar");
        document.getElementById("startCountdown").setAttribute('disabled', true)
        document.getElementById("editaradm").setAttribute('href', "#");
        document.getElementById("editaradm").innerHTML = "Não é mais possível editar a partida!";
        document.getElementById("startCountdown").classList.add("desativado");
        document.getElementById("minutes").innerHTML = "00";
        document.getElementById("seconds").innerHTML = "00";
        document.getElementById("encerrar").innerHTML = "Partida Encerrada!";
    } else if (dataInicio && (dataInicio.getTime() + duration * 60 * 1000 - new Date().getTime()) > 0) {
        console.log(dataInicio)
        var isCountdownRunning = true;
        startCountdown(duration, dataInicio, isCountdownRunning);
    } else {}

    function startCountdown(duracao, dataInicio, timerBool) {
        var tempoAtual = new Date().getTime();
        var targetDate = dataInicio.getTime() + duracao * 60 * 1000;
        isCountdownRunning = timerBool;

        document.getElementById("startCountdown").classList.remove("iniciar");
        document.getElementById("editaradm").setAttribute('href', "#");
        document.getElementById("editaradm").innerHTML = "Não é mais possível editar a partida!";
        document.getElementById("startCountdown").setAttribute('disabled', true)
        document.getElementById("encerrar").innerHTML = "Clique aqui para encerrar a partida!";
        document.getElementById("encerrar").classList.add("encerrar");
        // document.getElementById("countdownMessage").innerHTML = "Countdown in progress...";

        var encerrarButton = document.getElementsByClassName("encerrar")[0];
        if (encerrarButton) {
            encerrarButton.addEventListener("click", function() {
                // Adiciona um pop-up de confirmação
                var confirmar = confirm("Tem certeza que deseja encerrar a partida?");

                // Se o usuário clicar em "OK", execute a ação
                if (confirmar) {
                    saveTime(partidaId, 'endTime', Math.floor(Date.now() / 1000));
                    document.getElementById("encerrar").innerHTML = "Partida Encerrada!";
                    document.getElementById("encerrar").classList.remove("encerrar");
                    document.getElementById("encerrar").remove();
                    document.getElementById("statusDiv").innerHTML = '<br><a class="stop" id="encerrar">Partida Encerrada!</a>';
                    encerrarButton == null;
                    stopCountdown();
                }
            });
        }

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

    var iniciarButton = document.getElementsByClassName("iniciar")[0];
    if (iniciarButton) {
        iniciarButton.addEventListener("click", function() {
            // Remova o ouvinte de eventos após o primeiro clique
            iniciarButton.removeEventListener("click", arguments.callee);

            var duration = <?php echo $tempo; ?>;
            var dataAtual = Date.now();
            var dataInicio = new Date(dataAtual);
            var isCountdownRunning = true;

            console.log(dataInicio);
            console.log(duration);
            saveTime(partidaId, 'startTime', Math.floor(Date.now() / 1000));
            startCountdown(duration, dataInicio, isCountdownRunning);
        });
    }

    function saveTime(partidaId, timeType, timestamp) {
        $.ajax({
            type: "POST",
            url: "save_time.php",
            data: {
                timeType: timeType,
                timestamp: timestamp,
                partidaId: partidaId
            },
            success: function(response) {
                console.log("Tempo salvo com sucesso: " + timeType + " - " + timestamp + " - " + partidaId);
            },
            error: function(error) {
                console.log("Erro ao salvar tempo: " + error);
            }
        });
    }
</script>
<script>
    function mostrarInfo(data) {
        const { usuarios, equipe } = data;
        document.getElementById('informacoes').innerHTML = `
    <div class="container">
        <h1 style="font-size: 20px;">Equipe - ${equipe.NomeEquipe}<br></h1>
        <br>
        <h1 style="font-size: 20px;">Usuários: </h1>
        <div class='table-responsive'>
        <table class='table'>
            <thead>
                <tr>
                    <th class='text-center' scope='col' id='nomeadm'>Nome</th>
                    <th class='text-center' scope='col' id='nomeadm'>Login</th>
                    <th class='text-center' scope='col' id='nomeadm'>Email</th>
                </tr>
            </thead>
            <tbody>
                ${usuarios.map(usuarios => `
                    <tr>
                        <td class='text-center' id='nomeequipeadm' data-label="Nome">${usuarios.nomeUsuario}</td>
                        <td class='text-center' id='nomeequipeadm' data-label="Login">${usuarios.login}</td>
                        <td class='text-center' id='nomeequipeadm' data-label="Email">${usuarios.email}</td>
                    </tr>
                `).join('')}
            </tbody>
        </table>
        </div>
    </div>`;
    }
</script>

</html>
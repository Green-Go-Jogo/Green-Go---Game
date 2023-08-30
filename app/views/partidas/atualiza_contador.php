<!DOCTYPE html>

<?php
include_once(__DIR__."/../../connection/Connection.php");

$conn = conectar_db();
// Buscar o valor em minutos do banco de dados
$query = "SELECT tempoPartida FROM partida WHERE idPartida = 32"; // Supondo que o timer de interesse tenha ID 1
$stmt = $conn->query($query);
$minutesToAdd = $stmt->fetchColumn();


?>

<!DOCTYPE html>
<html>
<head>
    <title>Timer</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        
        var timerStarted = false;
        var timerPaused = false;
        var startTime = 0;
        var endTime = 0;

        function startTimer(duration) {
            if (!timerStarted) {
            startTime = Math.floor(Date.now() / 1000);
            endTime = startTime + (duration * 60);
            timerStarted = true;
            timerPaused = false;

            saveTime('startTime', startTime); // Envie o tempo de início ao iniciar
            updateTimer();
            } else {
            timerPaused = !timerPaused;

            if (timerPaused) {
                saveTime('endTime', Math.floor(Date.now() / 1000)); // Envie o tempo de término ao pausar
            } else {
                saveTime('startTime', startTime); // Envie o tempo de início ao reiniciar
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

        function saveTime(timeType, timestamp) {
            $.ajax({
                type: "POST",
                url: "save_time.php",
                data: { timeType: timeType, timestamp: timestamp },
                success: function(response) {
                    console.log("Tempo salvo com sucesso: " + timeType + " - " + timestamp);
                },
                error: function(error) {
                    console.log("Erro ao salvar tempo: " + error);
                }
            });
        }
    </script>
</head>
<body>
    <button id="startButton" onclick="startTimer(<?php echo $minutesToAdd; ?>)">Iniciar Timer</button>
    <div id="timer"></div>
</body>
</html>





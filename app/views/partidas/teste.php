<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leitura de QR Code</title>
</head>
<body>
    <h1>Leitura de QR Code</h1>
    <button id="startButton">Abrir Câmera</button>
    <video id="video" style="display:none;"></video>

    <script>
        // Seleciona o botão e o elemento de vídeo
        const startButton = document.getElementById('startButton');
        const video = document.getElementById('video');

        // Verifica se o navegador suporta a API getUserMedia
        if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
            // Adiciona um evento de clique ao botão
            startButton.addEventListener('click', function () {
                // Solicita permissão para acessar a câmera
                navigator.mediaDevices.getUserMedia({ video: true })
                    .then(function (stream) {
                        // Define o vídeo para exibir o feed da câmera
                        video.srcObject = stream;
                        video.play();
                    })
                    .catch(function (error) {
                        console.error('Erro ao acessar a câmera: ', error);
                    });
            });
        } else {
            console.error('O navegador não suporta a API getUserMedia.');
        }
    </script>
</body>
</html>

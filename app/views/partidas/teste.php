<!DOCTYPE html>
<html>
<head>
    <title>Camera Access</title>
</head>
<body>
    <button id="startCamera">Abrir Câmera</button>
    <video id="cameraFeed" autoplay style="display: none;"></video>

    <script>
        // Event listener para o botão
        document.getElementById('startCamera').addEventListener('click', function() {
            // Verifique se o navegador suporta a API WebRTC
            if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                // Acesso à câmera traseira
                navigator.mediaDevices.getUserMedia({ video: { facingMode: 'environment' } })
                .then(function(stream) {
                    // Exiba o feed da câmera em um elemento de vídeo
                    var video = document.getElementById('cameraFeed');
                    video.style.display = 'block';
                    video.srcObject = stream;
                })
                .catch(function(error) {
                    console.error('Erro ao acessar a câmera:', error);
                });
            } else {
                alert('Seu navegador não suporta a API WebRTC.');
            }
        });
    </script>
</body>
</html>

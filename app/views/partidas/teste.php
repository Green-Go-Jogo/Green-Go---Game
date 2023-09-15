<!DOCTYPE html>
<html>
<head>
    <title>Leitor de QR Code</title>
</head>
<body>
    <video id="cameraFeed" autoplay style="display: none;"></video>
    <canvas id="qrCanvas" style="display: none;"></canvas>

    <script src="https://cdn.jsdelivr.net/npm/jsqr@2.0.2/dist/jsQR.js"></script>
    <script>
        const video = document.getElementById('cameraFeed');
        const canvas = document.getElementById('qrCanvas');
        const ctx = canvas.getContext('2d');

        // Inicialize a câmera
        navigator.mediaDevices.getUserMedia({ video: { facingMode: 'environment' } })
            .then(function(stream) {
                video.style.display = 'block';
                video.srcObject = stream;
            })
            .catch(function(error) {
                console.error('Erro ao acessar a câmera:', error);
            });

        // Função para verificar o QR code
        function checkQRCode() {
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            ctx.drawImage(video, 0, 0, canvas.width, canvas.height);

            const imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
            const code = jsQR(imageData.data, imageData.width, imageData.height, {
                inversionAttempts: 'dontInvert',
            });

            if (code) {
                alert('QR Code detectado: ' + code.data);
            }

            requestAnimationFrame(checkQRCode);
        }

        // Iniciar a verificação do QR code
        video.onloadedmetadata = function() {
            canvas.style.display = 'block';
            checkQRCode();
        };
    </script>
</body>
</html>

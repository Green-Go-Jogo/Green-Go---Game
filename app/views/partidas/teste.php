<!DOCTYPE html>
<html>
<head>
    <title>Leitor de QR Code</title>
</head>
<body>
    <video id="scanner" autoplay></video>
    <button id="startCamera">Abrir Câmera</button>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/instascan/2.0.0/instascan.min.js"></script>
    <script>
        const scanner = new Instascan.Scanner({ video: document.getElementById('scanner') });

        // Event listener para o botão "Abrir Câmera"
        document.getElementById('startCamera').addEventListener('click', function() {
            Instascan.Camera.getCameras()
                .then(function(cameras) {
                    if (cameras.length > 0) {
                        scanner.start(cameras[0]); // Use a primeira câmera encontrada
                    } else {
                        alert('Nenhuma câmera encontrada.');
                    }
                })
                .catch(function(error) {
                    console.error('Erro ao acessar a câmera:', error);
                });
        });

        // Event listener para a leitura de QR codes
        scanner.addListener('scan', function(content) {
            alert('QR Code detectado: ' + content);
            window.location.href = content; // Redirecionar para o site do QR code
        });
    </script>
</body>
</html>

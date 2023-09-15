<!DOCTYPE html>
<html>
<head>
    <title>Leitor de QR Code</title>
</head>
<body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jsqr@1.1.1/dist/jsQR.js"></script>

<div id="my_camera" style="width: 320px; height: 240px;"></div>
<div id="my_result"></div>

<script language="JavaScript">
    Webcam.set('constraints', {
        facingMode: "environment"
    });
    Webcam.attach('#my_camera');

    function checkForQRCode() {
        Webcam.snap(function (data_uri) {
            var img = new Image();
            img.src = data_uri;
            img.onload = function () {
                var canvas = document.createElement('canvas');
                canvas.width = img.width;
                canvas.height = img.height;
                var ctx = canvas.getContext('2d');
                ctx.drawImage(img, 0, 0, img.width, img.height);

                // Lê o QR code usando o jsQR
                var code = jsQR(ctx.getImageData(0, 0, img.width, img.height), img.width, img.height);

                if (code) {
                    // Exibe o resultado do QR code
                    document.getElementById('my_result').textContent = 'Conteúdo do QR code: ' + code.data;
                } else {
                    // Não foi encontrado um QR code
                    document.getElementById('my_result').textContent = 'Aponte a câmera para um QR code.';
                }

                // Continua verificando em um loop
                requestAnimationFrame(checkForQRCode);
            };
        });
    }

    // Iniciar a verificação ao carregar a página
    checkForQRCode();
</script>
</body>
</html>

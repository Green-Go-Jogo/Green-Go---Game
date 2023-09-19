<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Scanner de QR Code com Bootstrap Modal</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
  <h1 class="mt-4 ml-4">Scanner de QR Code</h1>

  <button class="btn btn-primary ml-4" data-toggle="modal" data-target="#qrScannerModal">Abrir Scanner</button>

  <div class="modal fade" id="qrScannerModal" tabindex="-1" role="dialog" aria-labelledby="qrScannerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="qrScannerModalLabel">Scanner de QR Code</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <video id="video" width="100%" height="100%" autoplay></video>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jsqr/dist/jsQR.min.js"></script>
  <script>
    let videoElement;

    async function startCamera() {
      try {
        const stream = await navigator.mediaDevices.getUserMedia({ video: { facingMode: 'environment' } });
        videoElement = document.getElementById('video');
        videoElement.srcObject = stream;
        videoElement.play();
      } catch (error) {
        console.error('Error accessing camera:', error);
      }
    }

    function scanQRCode() {
      const canvasElement = document.createElement('canvas');
      const context = canvasElement.getContext('2d');

      canvasElement.width = videoElement.videoWidth;
      canvasElement.height = videoElement.videoHeight;
      context.drawImage(videoElement, 0, 0, canvasElement.width, canvasElement.height);

      const imageData = context.getImageData(0, 0, canvasElement.width, canvasElement.height);
      const code = jsQR(imageData.data, imageData.width, imageData.height);

      if (code) {
        console.log('QR Code scanned:', code.data);
        window.location.href = code.data;  // Redireciona para a URL lida no QR code
        $('#qrScannerModal').modal('hide');  // Fecha o modal após o redirecionamento
      }
    }

    // Inicializa o scanner quando o modal é mostrado
    $('#qrScannerModal').on('shown.bs.modal', function () {
      startCamera();
      setInterval(scanQRCode, 1000);  // Escaneia a cada segundo
    });

    // Limpa o stream da câmera quando o modal é fechado
    $('#qrScannerModal').on('hidden.bs.modal', function () {
      if (videoElement && videoElement.srcObject) {
        const stream = videoElement.srcObject;
        const tracks = stream.getTracks();
        tracks.forEach(track => track.stop());
        videoElement.srcObject = null;
      }
    });
  </script>
</body>
</html>

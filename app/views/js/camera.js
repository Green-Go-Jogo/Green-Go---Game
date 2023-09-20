let videoElement;

    async function startCamera() {
      try {
        const stream = await navigator.mediaDevices.getUserMedia({ video: {facingMode: 'environment'} });
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
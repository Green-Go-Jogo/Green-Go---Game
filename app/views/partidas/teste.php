<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Scanner de QR Code</title>
</head>
<body>
  <h1>Scanner de QR Code</h1>
  <video id="video" width="400" height="300" autoplay></video>
  <script src="https://cdn.jsdelivr.net/npm/jsqr/dist/jsQR.min.js"></script>
  <script>
    async function startCamera() {
      try {
        const stream = await navigator.mediaDevices.getUserMedia({ video: { facingMode: 'environment' } });
        const videoElement = document.getElementById('video');
        videoElement.srcObject = stream;
        videoElement.play();
      } catch (error) {
        console.error('Error accessing camera:', error);
      }
    }

    function scanQRCode(videoElement) {
      const canvasElement = document.createElement('canvas');
      const context = canvasElement.getContext('2d');

      canvasElement.width = videoElement.videoWidth;
      canvasElement.height = videoElement.videoHeight;
      context.drawImage(videoElement, 0, 0, canvasElement.width, canvasElement.height);

      const imageData = context.getImageData(0, 0, canvasElement.width, canvasElement.height);
      const code = jsQR(imageData.data, imageData.width, imageData.height);

      if (code) {
        console.log('QR Code scanned:', code.data);
        alert('QR Code scanned: ' + code.data);
      } else {
        console.log('No QR code detected.');
      }
    }

    function startQRScanning(videoElement) {
      setInterval(() => {
        scanQRCode(videoElement);
      }, 1000);
    }

    async function initializeScanner() {
      try {
        await startCamera();
        const videoElement = document.getElementById('video');
        startQRScanning(videoElement);
      } catch (error) {
        console.error('Error initializing scanner:', error);
      }
    }

    initializeScanner();
  </script>
</body>
</html>

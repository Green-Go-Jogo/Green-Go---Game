
  const scanner = new Instascan.Scanner({ video: document.getElementById('preview'), mirror: false });

  // Listener para quando um QR code é detectado
  scanner.addListener('scan', function (content) {
    alert('QR code lido: ' + content);
  });

  // Inicia a câmera e começa a ler QR codes
  Instascan.Camera.getCameras().then(function (cameras) {
    if (cameras.length > 0) {
      // Use a câmera traseira (índice 0)
      scanner.start(cameras[0]);
    } else {
      console.error('Nenhuma câmera encontrada.');
    }
  }).catch(function (e) {
    console.error(e);
  });
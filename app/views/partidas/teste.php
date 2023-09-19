<!DOCTYPE html>
<html>
<head>
  <title>Instascan</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<script src="https://webrtc.github.io/adapter/adapter-latest.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
</head>
<body>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#qrScannerModal">
    Abrir Scanner
  </button>

  <div class="modal fade" id="qrScannerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Scanner de QR Code</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="stopScanner()">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <video id="preview" width="100%"></video>
          <div id="cameraInfo"></div>
        </div>
      </div>
    </div>
  </div>

  <script>
    let scanner = null;

    function stopScanner() {
      if (scanner) {
        scanner.stop();
      }
    }

    function startScanner() {
      Instascan.Camera.getCameras().then(function (cameras) {
        let cameraInfo = document.getElementById('cameraInfo');
        cameraInfo.innerHTML = '';

        if (cameras.length > 0) {
          cameraInfo.innerHTML += '<p>Câmeras disponíveis:</p>';
          cameras.forEach(function (camera, index) {
            cameraInfo.innerHTML += '<p>Câmera ' + index + ': ' + camera.name + '</p>';
          });

          const videoElement = document.getElementById('preview');
          videoElement.style.height = '';  // Limpa o estilo de altura

          // Verifica a orientação da tela para decidir qual câmera abrir
          const isLandscape = window.innerWidth > window.innerHeight;
          const selectedCamera = cameras[1];

          // Inicia o scanner com a câmera selecionada
          scanner.start(selectedCamera);
        } else {
          console.error('Não existe câmera no dispositivo!');
          cameraInfo.innerText = 'Não há câmeras disponíveis no dispositivo.';
        }
      }).catch(function (e) {
        console.error(e);
      });
    }

    $('#qrScannerModal').on('hidden.bs.modal', function () {
      stopScanner();
    });

    $('#qrScannerModal').on('shown.bs.modal', function () {
      scanner = new Instascan.Scanner({
        video: document.getElementById('preview'),
      });

      scanner.addListener('scan', function (content) {
        window.location.href = content;
      });

      startScanner();
    });
  </script>
</body>
</html>

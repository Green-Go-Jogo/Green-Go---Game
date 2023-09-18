<!DOCTYPE html>
<html>
  <head>
    <title>Instascan</title>
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    />
    <script
      type="text/javascript"
      src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    ></script>
    <script
      type="text/javascript"
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    ></script>
    <script
      type="text/javascript"
      src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    ></script>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
  </head>
  <body>
    <button
      type="button"
      class="btn btn-primary"
      data-toggle="modal"
      data-target="#qrScannerModal"
    >
      Abrir Scanner
    </button>

    <div class="modal fade" id="qrScannerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">
              Scanner de QR Code
            </h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
              onclick="stopScanner()"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <video
              id="preview"
              width="100%"
              style="height: 300px"
            ></video>
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

      $('#qrScannerModal').on('hidden.bs.modal', function () {
        stopScanner();
      });

      $('#qrScannerModal').on('shown.bs.modal', function () {
        scanner = new Instascan.Scanner({
          video: document.getElementById('preview'),
        });

        scanner.addListener('scan', function (content) {
          alert('Escaneou o conteudo: ' + content);
          window.open(content, '_blank');
        });

        Instascan.Camera.getCameras().then((cameras) => {
          if (cameras.length > 0) {
            scanner.start(cameras[0]);
          } else {
            console.error('Não existe câmera no dispositivo!');
          }
        });
      });
    </script>
  </body>
</html>

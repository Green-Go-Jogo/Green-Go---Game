
      let scanner = null;

      function initScanner() {
          scanner = new Html5QrcodeScanner('reader', {
              qrbox: {
                  width: 250,
                  height: 250,
              },
              fps: 20,
          });
      }

      function success(result) {
          window.location.href = result;
          scanner.clear();
      }

      function error(err) {
          console.error(err);
      }

      $('#qrScannerModal').on('shown.bs.modal', function () {
          initScanner();
          scanner.render(success, error);
      });

      function stopScanner() {
          if (scanner) {
              scanner.stop().then(ignore => {
                  scanner.clear();
                  scanner = null;
                  $('#qrScannerModal').modal('hide');
              }).catch(err => {
                  console.error(err);
              });
          }
      }
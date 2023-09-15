<script src="../js/html5-qrcode.min.js"></script>
<style>
  .result {
    background-color: green;
    color: #fff;
    padding: 20px;
  }

  .row {
    display: flex;
  }
</style>
<div class="row">
  <div class="col">
    <div style="width: 500px;" id="reader"></div>
  </div>
  <div class="col" style="padding: 30px;">
    <h4>SCAN RESULT</h4>
    <div id="result">Result Here</div>
  </div>
</div>
<script type="text/javascript">
  function onScanSuccess(qrCodeMessage) {
    // Redirecionar para a página da web contida no QR code
    window.location.href = qrCodeMessage;
  }

  function onScanError(errorMessage) {
    // Handle scan error
  }

  var html5QrcodeScanner = new Html5QrcodeScanner(
    "reader", {
      fps: 10,
      qrbox: 250,
      facingMode: "environment" // Use "environment" for rear camera
    });

  html5QrcodeScanner.render(onScanSuccess, onScanError);
</script>

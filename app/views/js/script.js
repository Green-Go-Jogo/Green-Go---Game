const html5QrCode = new Html5Qrcode('reader');

function onScanSuccess(qrCodeMessage) {
    alert(`QR code lido: ${qrCodeMessage}`);
}

function onScanError(errorMessage) {
    console.error(`Erro ao ler QR code: ${errorMessage}`);
}

html5QrCode.start(
    { facingMode: 'environment' }, // Use 'user' to use the front camera
    {
        qrbox: 250
    },
    onScanSuccess,
    onScanError
);

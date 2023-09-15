<!DOCTYPE html>
<html>
<head>
    <title>Leitor de QR Code</title>
</head>
<body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.js"></script>
<script src="html5-qrcode.min.js"></script>

<div style="width: 500px" id="reader"></div>
<div id="my_result"></div>

<script language="JavaScript">
    function onScanSuccess(decodedText, decodedResult) {
    // Handle on success condition with the decoded text or result.
    console.log(`Scan result: ${decodedText}`, decodedResult);
}

    var html5QrcodeScanner = new Html5QrcodeScanner(
	    "reader", { fps: 10, qrbox: 250 });
    html5QrcodeScanner.render(onScanSuccess);

    var html5QrcodeScanner = new Html5QrcodeScanner(
    "reader", { fps: 10, qrbox: 250 });
        
function onScanSuccess(decodedText, decodedResult) {
    // Handle on success condition with the decoded text or result.
    console.log(`Scan result: ${decodedText}`, decodedResult);
    // ...
    html5QrcodeScanner.clear();
    // ^ this will stop the scanner (video feed) and clear the scan area.
}
    
</script>
</body>
</html>

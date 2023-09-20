async function startCamera() {
    try {
        const stream = await navigator.mediaDevices.getUserMedia({ video: true });
        const videoElement = document.getElementById('video');
        videoElement.srcObject = stream;
        videoElement.play();

        // Adicione o código para processar o vídeo e escanear o QR code aqui
    } catch (error) {
        console.error('Erro ao acessar a câmera:', error);
    }
}



function atualizarDados() {
    // Verifique se a variável de sessão PARTIDA é verdadeira
    var partidaAtiva = <?php echo ($_SESSION['PARTIDA'] ? 'true' : 'false'); ?>;
    
    if (partidaAtiva === true) {
        // A variável de sessão PARTIDA é verdadeira, agora você pode chamar o código para verificar o usuário ou fazer outras ações aqui
        $.ajax({
            type: "POST",
            url: "verificar_usuario.php",
            dataType: "json",
            data: {
                userID: <?php echo $_SESSION["ID"]; ?> // Envie o ID do usuário
            },
            success: function (userResponse) {
                if (userResponse.isValid === true) {
                // Redirecionar para a página X se a resposta for verdadeira
                 window.location.href = "../partidas/rankPartida.php?id=" + userResponse.idPartida;
                } else {
                    // A resposta foi false, pode fazer algo diferente aqui, se necessário
                    console.log("Usuário não válido");
                }
            },
            error: function () {
                console.log("Erro ao processar a requisição AJAX do usuário");
            }
        });
    } else {
        // A variável de sessão PARTIDA não é verdadeira, faça algo diferente aqui, se necessário
        console.log("Partida não está ativa");
    }
};

atualizarDados();

// Usar setInterval para chamar a função a cada x milissegundos.
setInterval(atualizarDados, 5000); // Atualizar a cada segundo (1000 ms).
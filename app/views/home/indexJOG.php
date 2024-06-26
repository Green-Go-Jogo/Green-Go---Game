<!DOCTYPE html>
<html lang="pt-br">
<?php
include_once("../../controllers/LoginController.php");

LoginController::manterUsuario();
?>

<head>
  <title>Green GO</title>
  <?php include_once("../../bootstrap/header.php"); ?>
  <link rel="stylesheet" href="csscheer/indexjog.css">
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="csscheer/footer.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>

<style>
  *,
  *:before,
  *:after {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
  }



  .buttons {

    margin-top: 50px;
    text-align: center;
    border-radius: 30px;
    display: flex;
    justify-content: center;
    align-items: center;

  }

  .blob-btn {
    z-index: 1;
    position: relative;
    padding: 40px 92px;
    margin-bottom: 30px;
    text-align: center;
    text-transform: uppercase;
    color: #ffffff;
    font-size: 16px;
    font-weight: bold;
    background-color: #f58c95;
    outline: none;
    border: none;
    transition: color 0.5s;
    cursor: pointer;
    border-radius: 30px;
    font-size: 40px;
  }

  .blob-btn:before {
    content: "";
    z-index: 1;
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    border: 2px solid #f58c95;
    border-radius: 30px;
  }

  .blob-btn:after {
    content: "";
    z-index: -2;
    position: absolute;
    left: 3px;
    top: 3px;
    width: 100%;
    height: 100%;
    transition: all 0.3s 0.2s;
    border-radius: 30px;
  }

  .blob-btn:hover {
    color: #FFFFFF;
    border-radius: 30px;
  }

  .blob-btn:hover:after {
    transition: all 0.3s;
    left: 0;
    top: 0;
    border-radius: 30px;
  }

  .blob-btn__inner {
    z-index: -1;
    overflow: hidden;
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    border-radius: 30px;
    background: #f58c95;
  }

  .blob-btn__blobs {
    position: relative;
    display: block;
    height: 100%;
    filter: url("#goo");
  }

  .blob-btn__blob {
    position: absolute;
    top: 2px;
    width: 25%;
    height: 100%;
    background: #C05367;
    border-radius: 100%;
    transform: translate3d(0, 150%, 0) scale(1.7);
    transition: transform 0.45s;
  }

  @supports (filter: url("#goo")) {
    .blob-btn__blob {
      transform: translate3d(0, 150%, 0) scale(1.4);
    }
  }

  .blob-btn__blob:nth-child(1) {
    left: 0%;
    transition-delay: 0s;
  }

  .blob-btn__blob:nth-child(2) {
    left: 30%;
    transition-delay: 0.08s;
  }

  .blob-btn__blob:nth-child(3) {
    left: 60%;
    transition-delay: 0.16s;
  }

  .blob-btn__blob:nth-child(4) {
    left: 90%;
    transition-delay: 0.24s;
  }

  .blob-btn:hover .blob-btn__blob {
    transform: translateZ(0) scale(1.7);
  }

  @supports (filter: url("#goo")) {
    .blob-btn:hover .blob-btn__blob {
      transform: translateZ(0) scale(1.4);
    }
  }

  .jogo {
    margin-top: 7%;
    text-align: center;
    font-family: Poppins-regular;
    font-size: 18px;

  }

  .home {
    padding: 70px;

  }

  .titulo {
    font-size: 80px;
    font-family: Poppins;
    color: #04574d;
  }

  .subtitulo {
    font-family: Poppins-semibold;
    font-size: 20px;
    color: #C05367;
  }

  .texto {
    font-family: Poppins-regular;
    color: #338A5F;
  }

  .coisas {
    display: flex;
    width: 100%;
    background-color: #D8DCDD;

  }

  .coisas2 {
    display: flex;
    width: 100%;
  }

  .conteudo {
    flex: 1;
    padding: 20px;
    /* Adicione margem esquerda para separar o conteúdo da imagem */
  }

  .imagem {
    flex: 1;
    background-size: cover;
    background-position: center;
    height: 60vh;
    /* Defina a altura desejada para a imagem */
    text-align: right;


  }

  .imagem2 {
    flex: 1;
    background-size: cover;
    background-position: center;
    height: 60vh;
    /* Defina a altura desejada para a imagem */


  }

  .imgqr,
  .imgequipe {
    top: 0;
    right: 0;
    height: auto;
    max-width: 100%
  }


  @media (max-width: 768px) {

    .home {
      padding: 20px;
    }

    .titulo {
      font-size: 60px;
    }

    .coisas,
    .coisas2 {
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center;
    }

    .conteudo {
      margin-bottom: 20px;
    }

    .imagem,
    .imagem2 {
      order: 1;
    }


  }

  @media (max-width: 992px) {

    .titulo {
      font-size: 60px;
    }

    .coisas,
    .coisas2 {
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center;
    }

    .conteudo {
      margin-bottom: 20px;
    }

    .imagem,
    .imagem2 {
      order: 1;
    }

  }
</style>

<?php include_once("../../bootstrap/navJog.php"); ?>

<body>
  <div class="home">
    <p class="jogo">Um jogo para aprender mais sobre as plantas</p>
    <img src="../../public/isologo-greengo.svg" width="100%" class="isologo">
    <a href="../partidas/listPartidas.php">
      <div class="buttons">
        <button class="blob-btn">
          Jogar Agora
          <span class="blob-btn__inner">
            <span class="blob-btn__blobs">
              <span class="blob-btn__blob"></span>
              <span class="blob-btn__blob"></span>
              <span class="blob-btn__blob"></span>
              <span class="blob-btn__blob"></span>
            </span>
          </span>
        </button>
    </a>
    <br />

    <defs>
      <filter id="goo">
        <feGaussianBlur in="SourceGraphic" result="blur" stdDeviation="10"></feGaussianBlur>
        <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0 0 1 0 0 0 0 0 1 0 0 0 0 0 21 -7" result="goo"></feColorMatrix>
        <feBlend in2="goo" in="SourceGraphic" result="mix"></feBlend>
      </filter>
    </defs>
    </svg>
  </div>
  </div>
  <br>

  <div class="coisas">
    <div class="conteudo">
      <span class="titulo">
        Escaneie os <br>QR Codes
      </span>
      <h6 class="subtitulo">Leia as plantas</h6>
      <span class="texto">
        Explore as plantas, ganhe pontos e descubra suas características e histórias únicas enquanto você joga.
      </span>
    </div>
    <div class="imagem"> <img src="../../public/qrcodejog.png" class="imgqr"> </div>
  </div>
  <br>

  <div class="coisas2">
    <div class="imagem2"> <img src="../../public/equipeJog.png" class="imgequipe"> </div>
    <div class="conteudo">
      <span class="titulo">
        Jogue em <br>Equipe
      </span>
      <h6 class="subtitulo">Trabalhem juntos </h6>
      <span class="texto">
        Jogar em equipe é eficiente e divertido. Trabalhar juntos, compartilhar estratégias e celebrar vitórias em conjunto torna a experiência mais satisfatória.
      </span>
    </div>
  </div>
  <br>

  <div class="coisas">
    <div class="conteudo">
      <span class="titulo">
        Responda aos <br>Quizzes
      </span>
      <h6 class="subtitulo">Teste seu conhecimento</h6>
      <span class="texto">
        Desafie seu conhecimento botânico! Participe do nosso Quiz das Plantas e teste o quanto você sabe sobre o reino vegetal.
      </span>
    </div>
    <div class="imagem"> <img src="../../public/quizzjog.png" class="imgequipe"> </div>
  </div>

  <?php include_once("../../bootstrap/footer.php"); ?>
  <script>
    function atualizarDados() {
        // Verifique se a variável de sessão PARTIDA é verdadeira
        var partidaAtiva = <?php echo ($_SESSION['PARTIDA'] ? 'true' : 'false'); ?>;

        if (partidaAtiva === true) {
            // A variável de sessão PARTIDA é verdadeira
            $.ajax({
                type: "POST",
                url: "../plantas/rankingExec.php",
                dataType: "json",
                data: {
                    userID: <?php echo $_SESSION["ID"]; ?> // Envie o ID do usuário
                },
                success: function(userResponse) {
                    if (userResponse.isValid === true) {
                        // Redirecionar para a página se a resposta for verdadeira
                        var mensagemRetorno = "Você não visualizou o ranking da sua última partida!"
                        window.location.href = "../partidas/rankPartida.php?id=" + userResponse.idPartida + "&msgReturn=" + mensagemRetorno;
                    } else {

                    }
                },
                error: function() {
                    console.log("O Rank ainda não foi definido!");
                }
            });
        } else {
            // A variável de sessão PARTIDA não é verdadeira
            console.log("Partida não está ativa");
        }
    };

    atualizarDados();

    // Usar setInterval para chamar a função a cada x milissegundos.
    setInterval(atualizarDados, 15000); // Atualizar a cada segundo (1000 ms).
</script>

</html>

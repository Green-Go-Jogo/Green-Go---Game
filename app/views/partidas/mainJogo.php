<?php
include_once(__DIR__."/../../controllers/PartidaController.php");
include_once(__DIR__."/../../controllers/EquipeController.php");
include_once(__DIR__."/../../controllers/UsuarioController.php");
include_once(__DIR__."/htmlPartida.php");
?>
<?php include_once("../../controllers/LoginController.php");
LoginController::manterUsuario();
LoginController::verificarAcesso([1,2,3]);

$idEquipe = $_GET['ide'];

$idPartida = $_GET['idp'];

$usuarioCont = new UsuarioController();
$usuarios = $usuarioCont->buscarUsuarios($idEquipe, $idPartida); 


$equipeCont = new EquipeController();
$equipe = $equipeCont->buscarPorId($idEquipe); 


$partidaCont = new PartidaController();
$partida = $partidaCont->buscarPorId($idPartida); 

$partida = $partidaCont->buscarPorId($_GET['idp']); 

$tempo = $partida->getTempoPartida(); 

?>


<!DOCTYPE html>
<html lang="en">
<head>

    <title>Jogue!</title>
    <?php include_once("../../bootstrap/header.php");?>
    <link rel="stylesheet" href="../csscheer/jogo.css">


</head>



    <style>

    body {
        background-color: #ebf0f1;
    }
 
.custom-container {
    display: flex;
}

.custom-div {
    padding: 10px;
    position: relative; /* Habilita o posicionamento relativo */
    top: -50px; /* Ajuste conforme necessário para posicionar acima da tabela */
    left: 1200px; /* Ajuste conforme necessário para posicionar à direita */
    /* Você pode ajustar top, right, bottom, left conforme necessário */
}

    .row.row-cols-4 {
    display: flex;
    flex-wrap: wrap;
}

.col-md-4 {
    flex-basis: calc(25% - 20px);
    margin-bottom: 20px;
    padding: 10px; 
}


@media (max-width: 767px) {
    .col-md-4 {
        flex-basis: calc(50% - 20px);
    }

    .container.text-center {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
    }

    .row.row-cols-4 {
        justify-content: center;
    }
}


@media (min-width: 768px) and (max-width: 1280px) {
    .col-md-4 {
        flex-basis: calc(50% - 20px);
    }
}

.input-container {
    display: flex;
    justify-content: space-between;
    width: 400px;
  }

  .input-box {
    background-color: #f0b6bc;
    width: 80px;
    height: 80px;
    border: 2px solid #ccc;
    border-color: #c05367;
    text-align: center;
    font-family: Poppins-regular;
    font-size: 24px;
    display: flex;
    align-items: center; /* Centralizar verticalmente */
    justify-content: center; /* Centralizar horizontalmente */
  }

    </style>

</head>
<body>

<?php LoginController::navBar($_SESSION['TIPO']);?>

<br>

<video id="video" style="display:none;"></video>

    <img src="../../public/divjogo.jpg" id="divjogo"> </img> 
    <div class="text-center" id="timercor"> 
    <img src="../../public/botaotimer.png" id="botaotimer"> </img>
    <div class="circulo" id="timer"><?php echo $tempo.":00"; ?>
    </div></div>
    
    <br><br>


  <h1 class="text-center" id="encontrartitulo">Encontrou </h1>
  <h1 class="text-center" id="encontrartitulo2">uma planta?</h1>

  <div class="d-flex justify-content-center">
  <div class="input-container">
  <div class="input-box" contenteditable="plaintext-only" id="box1"></div>
  <div class="input-box" contenteditable="plaintext-only" id="box2"></div>
  <div class="input-box" contenteditable="plaintext-only" id="box3"></div>
  <div class="input-box" contenteditable="plaintext-only" id="box4"></div>
  </div>

  </div>
  <br>
  <div class="d-flex justify-content-center">
  <button class="btn" id="submitButton">Enviar</button>
  <br>
  </div>

  
<div id="result"></div>
  
  <div class="text-center" id="botoes">

        <a class="btn" href="zona.php">
        <img src="../../public/botaozona.png" id="zona"> </img> </a>

        <button id="startButton" href="camera.php">
        <img src="../../public/botaocamera.png" id="camera"> </img> </button>

        <?php echo "<a class='btn' href='verEquipe.php?ide=".$idEquipe.'&idp='.$idPartida."'>
        <img src='../../public/botaoequipe.png' id='equipe'> </img> </a> " ?>

        </div>
<br>
<br>
<br>
<br>
<br>
<script src="../js/camera.js"></script>
<?php include_once("../../bootstrap/footer.php");?>
</body>
<script>
   const resultDiv = $("#result");

   $(".input-box").on("input", function(event) {
    const inputText = $(this).text();
    const index = $(this).index();

    // Verificar se o texto foi apagado e mover o foco para o campo anterior
    if (inputText === "") {
      if (index > 0) {
        $(".input-box").eq(index - 1).focus();
        $(".input-box").eq(index - 1).text("");
      }
    }

    // Limitar o texto a 1 caractere
    if (inputText.length > 1) {
      $(this).text(inputText[0]);
    }

    // Mover o foco para o próximo campo se houver texto
    if (index < $(".input-box").length - 1 && inputText !== "") {
      $(".input-box").eq(index + 1).focus();
    }
  });

  $(".input-box").on("keydown", function(event) {
    if (event.key === "Backspace" && $(this).text() === "") {
      const index = $(this).index();
      if (index > 0) {
        $(".input-box").eq(index - 1).focus();
        $(".input-box").eq(index - 1).text("");
        event.preventDefault(); // Impedir que o navegador aja como um botão "Backspace" normal
      }
    }
  });

$("#submitButton").on("click", function() {
  const cod = $(".input-box").map(function() {
    return $(this).text();
  }).get().join("");
  
  validateCode(cod);
});

function validateCode(cod) {
    $.ajax({
  type: "POST",
  url: "../plantas/codigoPlantaExec.php",
  data: { cod: cod },
  dataType: "json", // Espera uma resposta JSON
  success: function(userResponse) {
    if (userResponse.isValid === true) {
      window.location.href = "../plantas/visualizarPlanta.php?idp=" + userResponse.idPlanta + "&ide=" + userResponse.idEspecie + "&code=true";
    } else {
      resultDiv.text("Esse código não pertence a uma planta!");           
    }
  },
  error: function() {
    resultDiv.text("Erro na solicitação.");
  }
});
}
</script>
</html>
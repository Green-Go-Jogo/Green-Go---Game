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
$usuarios = $usuarioCont->buscarUsuarios($idEquipe); 


$equipeCont = new EquipeController();
$equipe = $equipeCont->buscarPorId($idEquipe); 


$partidaCont = new PartidaController();
$partida = $partidaCont->buscarPorId($idPartida); 

$partida = $partidaCont->buscarPorId($_GET['idp']); 

$tempo = $partida->getTempoPartida(); 

?>

<?php include_once("../../controllers/LoginController.php");
LoginController::manterUsuario();
LoginController::verificarAcesso([1]);
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

    </style>

</head>
<body>

<?php LoginController::navBar($_SESSION['TIPO']);?>

<br>

    <img src="../../public/divjogo.jpg" id="divjogo"> </img> 
    <div class="text-center" id="timercor"> 
    <img src="../../public/botaotimer.png" id="botaotimer"> </img>
    <div class="circulo" id="timer"><?php echo $tempo.":00"; ?>
    </div></div>
    
    <br><br>


  <h1 class="text-center" id="encontrartitulo">Encontrou </h1>
  <h1 class="text-center" id="encontrartitulo2">uma planta?</h1>

  <div class="d-flex justify-content-center">
  <input type="text" name="codigo_planta" class="form-control"  maxlength="4" id="codigoplanta"></div>
  <br>
  
  <div class="text-center" id="botoes">

        <a class="btn" href="zona.php">
        <img src="../../public/botaozona.png" id="zona"> </img> </a>

        <a class="btn" href="camera.php">
        <img src="../../public/botaocamera.png" id="camera"> </img> </a>

        <a class="btn" href="../../views/partidas/verEquipe.php">
        <img src="../../public/botaoequipe.png" id="equipe"> </img> </a>

        </div>
<br>
<br>
<br>
<br>
<br>

<?php include_once("../../bootstrap/footer.php");?>
</body>
</html>
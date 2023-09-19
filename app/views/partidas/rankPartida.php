<?php
include_once(__DIR__."/../../controllers/PartidaController.php");
include_once(__DIR__."/../../controllers/EquipeController.php");
include_once(__DIR__."/../../controllers/UsuarioController.php");
include_once(__DIR__."/htmlPartida.php");
?>
<?php include_once("../../controllers/LoginController.php");
LoginController::manterUsuario();
LoginController::verificarAcesso([1,2,3]);

 $idPartida = $_GET['id'];

 $partidaCont = new PartidaController();
 $partida = $partidaCont->buscarPorId($idPartida); 

 unset($_SESSION['PLANTAS_LIDAS']);
 unset($_SESSION['PONTOS']);
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>a</title>
    <?php include_once("../../bootstrap/header.php");?>


</head>



    <style>
    .btn:hover {
        color:#f58c95;
        transform: scale(1.05);
        text-decoration: none;
    }

    body {
        background-color: #ebf0f1;
    }

    </style>

</head>
<body >
<nav>

<?php LoginController::navBar($_SESSION['TIPO']);?>
<br>

</nav>
    
    
  <div id="conteudo">
  <?php                    
            PartidaHTML::desenhaRanking($partida);
        ?>
</div> 


</div>
<br>
<br>
<br>
<br>
<br>


<?php include_once("../../bootstrap/footer.php");?>
</body>

</html>
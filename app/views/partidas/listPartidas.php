<?php
include_once(__DIR__."/../../controllers/PartidaController.php");
include_once(__DIR__."/htmlPartida.php");
?>
<?php include_once("../../controllers/LoginController.php");
LoginController::manterUsuario();
LoginController::verificarAcesso([2, 3]);
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>Espécies</title>
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

<?php include_once("../../bootstrap/navADM.php");?>
<br>

</nav>
    
  <h1 class="text-center primeirotextoreg">PARTIDAS</h1>
  <br><br><br>
    
        
        <?php
            $partidaCont = new PartidaController();
            $partidas = $partidaCont->listar(); 
            
            
            PartidaHTML::desenhaPartida($partidas);
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
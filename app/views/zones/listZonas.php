<?php
include_once(__DIR__."/../../connection/Connection.php");
include_once(__DIR__."/../../controllers/ZonaController.php");
include_once(__DIR__."/htmlZona.php");
?>
<?php include_once("../../controllers/LoginController.php");
LoginController::manterUsuario();
LoginController::verificarAcesso([2, 3]);
?>

<!DOCTYPE html>
<html lang="en">
<head>

<title>Zonas</title>
<?php include_once("../../bootstrap/header.php");?>
    
</head>

<nav>

    <?php include_once("../../bootstrap/navADM.php");?>
    
</nav>

    <br>
<h1 class="text-center primeirotextoreg titulo-zonas">ZONAS</h1>
   <main>
</div> <br> <br> <br> <br>
        
        <?php
            $zonaCont = new ZonaController();
            $zonas = $zonaCont->listar(); 
            
            ZonaHTML::desenhaZona($zonas);
        ?>
        </div>  

</div>
</main>
<?php include_once("../../bootstrap/footer.php");?>
</html>
<?php
include_once(__DIR__."/../../connection/Connection.php");
include_once(__DIR__."/../../controllers/ZonaController.php");
include_once(__DIR__."/htmlZona.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once("../../bootstrap/header.php");?>

</head>
<nav>

    <?php include_once("../../bootstrap/navADM.php");?>
    
</nav>
<body>
    
  <h3 class="text-center primeirotextoreg">ZONAS</h3>
   
    <div style="margin: 40px 10px 0px 10px;">
        <a class="btn btn-outline-success" href="adicionarZona.php">Incluir Nova Zona</a><br><br><br>
        
        <?php
            $zonaCont = new ZonaController();
            $zonas = $zonaCont->listar(); 
            
            ZonaHTML::desenhaZona($zonas);
        ?>
        </div>  

</div>
</body>
</html>
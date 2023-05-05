<?php
include_once(__DIR__."/../../connection/Connection.php");
include_once(__DIR__."/../../controllers/PlantaController.php");
include_once(__DIR__."/htmlPlanta.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <?php include_once("../../bootstrap/header.php");?>

</head>

<nav>

    <?php include_once("../../bootstrap/navADM.php");?>
    <br>

</nav>

<body>
    
<a id="primeirotextoreg">
  <h1 class="text-center primeirotextoreg">PLANTAS</h1> </a>
   
    <div style="margin: 40px 10px 0px 10px;">
        <a class="btn btn-outline-success" href="adicionarPlanta.php">Incluir Nova Planta</a><br><br><br>
        

        <?php
            $plantaCont = new PlantaController();
            $plantas = $plantaCont->listar(); 
            
            PlantaHTML::desenhaPlanta($plantas);
        ?>
        </div>  

</div>
</body>
</html>
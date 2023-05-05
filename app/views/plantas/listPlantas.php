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
    
  <h3 class="text-center">PLANTA</h3>
   
    <div style="margin: 40px 10px 0px 10px;">
        <a class="btn btn-outline-success" href="adicionarPlanta.php">Incluir Nova Planta</a><br><br><br>
    
        <p style="font-weight: bold;">RELAÇÃO DAS PLANTAS CADASTRADAS</p>
        

        <?php
            $plantaCont = new PlantaController();
            $plantas = $plantaCont->listar(); 
            
            PlantaHTML::desenhaPlanta($plantas);
        ?>
        </div>  

</div>
</body>
</html>
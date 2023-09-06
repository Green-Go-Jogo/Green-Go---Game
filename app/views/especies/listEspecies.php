<?php
include_once(__DIR__."/../../connection/Connection.php");
include_once(__DIR__."/../../controllers/EspecieController.php");
include_once(__DIR__."/htmlEspecie.php");
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
    
  <h1 class="text-center primeirotextoreg">ESPÉCIES</h1>
   
    <div style="margin: 40px 10px 0px 10px;">

    
</div></div><br><br><br>
    
        
        <?php
            $especieCont = new EspecieController();
            $especies = $especieCont->listar(); 
            
            EspecieHTML::desenhaEspecie($especies);
        ?>
        </div>  

</div>
<?php include_once("../../bootstrap/footer.php");?>
</body>
</html>
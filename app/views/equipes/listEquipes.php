<?php
include_once(__DIR__."/../../connection/Connection.php");
include_once(__DIR__."/../../controllers/EquipeController.php");
include_once(__DIR__."/htmlEquipe.php");
?>
<?php include_once("../../controllers/LoginController.php");
LoginController::manterUsuario();
LoginController::verificarAcesso([2, 3]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Equipes</title>
    <?php include_once("../../bootstrap/header.php");?>


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



    <?php include_once("../../bootstrap/navADM.php");?>
    <br>



    
<a>
  <h1 class="text-center primeirotextoreg">EQUIPES</h1> </a>
  <div style="margin: 40px 10px 0px 10px;"> 
</div><br><br><br>
        

        <?php
            $equipeCont = new EquipeController();
            $equipes = $equipeCont->listar(); 
            
            EquipeHTML::desenhaEquipe($equipes);
        ?>
        </div>  

</div>
<?php include_once("../../bootstrap/footer.php");?>

</html>
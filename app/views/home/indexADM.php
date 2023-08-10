<!DOCTYPE html>
<html lang="pt-br">
<?php include_once("../../controllers/LoginController.php");
LoginController::manterUsuario();
LoginController::verificarAcesso([2,3]);
?>


<head>
    <?php include_once("../../bootstrap/header.php");?>
    <link rel="stylesheet" href="../csscheer/dashboard.css">
    <link rel="stylesheet" href="../csscheer/footer.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head> 

<body>

<?php include_once("../../bootstrap/navProf.php") ?>

<br>
<div class="container text-center">
<a id="titulo"> PORTAL DO <?php if ($_SESSION["TIPO"] == 2) { echo "ADMINISTRADOR";} else {echo "PROFESSOR";} ?></a> <br>

<c id="welcome"> Seja Bem vindo <?php echo $_SESSION['NOME']; ?>! </c> </div> <br><br>


<div class="container text-center">
<div class="row" id="card">
<div class="col">
<div class="card container text-center" style="width: 20rem;">
  <div class="card-body">
  <i class="fa-solid fa-earth-americas" style="color: #ffffff;"></i>
    <a href="..\home\projeto.php" class="btn" style="color: #ffffff;"> Projeto </a>
  </div> </div> </div> <br>

<div class="col">
<div class="card container text-center" style="width: 20rem;">
  <div class="card-body">
  <i class="fa-solid fa-users" style="color: #ffffff;"></i>
    <a href="..\equipes\listEquipes.php" class="btn" style="color: #ffffff;"> Equipes </a>
  </div>
</div> </div> </div> <br>

<div class="row row-cols-4" id="card">
<div class="card container text-center" style="width: 20rem;">
  <div class="card-body">
  <i class="fa-solid fa-seedling" style="color: #ffffff;"></i>
    <a href="..\plantas\listPlantas.php" class="btn" style="color: #ffffff;"> Plantas </a>
  </div>
</div> <br>

<div class="card container text-center" style="width: 20rem;">
  <div class="card-body">
  <i class="fa-solid fa-map-location-dot" style="color: #ffffff;"></i>
    <a href="..\zones\listZonas.php" class="btn" style="color: #ffffff;"> Zonas </a>
  </div>
</div> </div> <br>

<div class="row row-cols-4" id="card">
<div class="card container text-center" style="width: 20rem;" >
  <div class="card-body">
  <i class="fa-solid fa-leaf" style="color: #ffffff;"></i>
    <a href="..\especies\listEspecies.php" class="btn" style="color: #ffffff;"> Espécies </a>
  </div>
</div> <br>

<div class="card container text-center" id="card" style="width: 20rem;">
  <div class="card-body">
  <i class="fa-solid fa-gamepad" style="color: #ffffff;"></i>
    <a href="..\partidas\adicionarPartida.php" class="btn" style="color: #ffffff;"> Partida </a>
  </div>
</div> </div> </div>
    
<?php include_once("../../bootstrap/footer.php");?>

</body>
<script>
    $(document).ready(function() {
      $("#doorIcon").mouseover(function() {
        $(".door-icon").removeClass("fa-door-closed").addClass("fa-door-open");
      });
      
      $("#doorIcon").mouseout(function() {
        $(".door-icon").removeClass("fa-door-open").addClass("fa-door-closed");
      });
    });
  </script>
</html>
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

<style>

html, body {
        height: 100%;
    }

    body {
        display: flex;
        flex-direction: column;
        margin: 0;
        padding: 0;
    }

    main {
        flex: 1;
    }

</style>

<body>

<a class="container text-center" id="titulo"> PORTAL DO PROFESSOR </a> <br><br>

<div class="row row-cols-4" id="card">
<div class="card container text-center" style="width: 20rem;">
  <div class="card-body">
  <i class="fa-solid fa-earth-americas" style="color: #ffffff;"></i>
    <a href="..\home\projeto.php" class="btn" style="color: #ffffff;"> Projeto </a>
  </div>
</div> <br>

<div class="card container text-center" style="width: 20rem;">
  <div class="card-body">
  <i class="fa-solid fa-users" style="color: #ffffff;"></i>
    <a href="..\equipes\listEquipes.php" class="btn" style="color: #ffffff;"> Equipes </a>
  </div>
</div> </div> <br>

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
    <a href="..\zones\listZonas.php" class="btn" style="color: #ffffff;"> Partida </a>
  </div>
</div> </div> <br>

<div class="row row-cols-4" id="card">
<div class="card container text-center" id="card" style="width: 20rem;">
  <div class="card-body">
  <i class="fa-solid fa-user-gear" style="color: #ffffff;"></i>
    <a href="..\zones\listZonas.php" class="btn" style="color: #ffffff;"> Usuários </a>
  </div>
</div> </div> <br>
    

<?php include_once("../../bootstrap/footer.php");?>

</body>

</html>
<?php
include_once(__DIR__."/../../connection/Connection.php");
include_once(__DIR__."/../../controllers/ZonaController.php");
include_once(__DIR__."/htmlZona.php");
?>
<?php 

session_start();

if(isset($_SESSION['adm'])){
    $nomeADM = $_SESSION['adm'];
} 
else if(isset($_SESSION['normal'])){
    header("location: ../users/login.php");
}
else if (!isset($_SESSION['adm']) && !isset($_SESSION['normal'])) {
    header("Location: ../users/login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <?php include_once("../../bootstrap/header.php");?>
    <link rel="stylesheet" href="../csscheer/listzona.css">
    <title style= "color: #04574d;">Zonas</title>

</head>

<nav>

    <?php include_once("../../bootstrap/navADM.php");?>
    
</nav>

    <br>
<h1 class="text-center primeirotextoreg titulo-zonas">ZONAS</h1>
   <main>
   <div class="lista-zonas">
  <div class="text-right" style="padding-right: 10px;">
    <a class="btn incluir" href="adicionarZona.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="90" height="60" fill="#04574d" viewBox="0 0 16 16">
        <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zM8.5 6v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 1 0z"/>
        </svg>
    </a>
</div></div> <br> <br> <br> <br>
        
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
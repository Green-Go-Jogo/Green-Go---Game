<!DOCTYPE html>
<html lang="pt-br">
<?php 

session_start();

if(isset($_SESSION['adm'])){
    $nomeADM = $_SESSION['adm'];
} 
else if(isset($_SESSION['normal'])){
    header("location: users/login.php");
}
else if (!isset($_SESSION['adm']) && !isset($_SESSION['normal'])) {
    header("Location: users/login.php");
    exit;
}
?>


<head>
    <?php include_once("../bootstrap/header.php");?>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/cabecalho.css">

</head> 


    <style>
  /* Estilo para o dropdown */
  .navbar-nav .dropdown {
    background-color: transparent;
  }
  
  /* Estilo para os itens do dropdown */
  .navbar-nav .dropdown-menu {
    background-color: transparent;
  }
  
  /* Estilo para os itens do dropdown quando o mouse passa por cima */
  .navbar-nav .dropdown-menu .dropdown-item:hover {
    background-color: transparent;
  }

  .custom-button {
    background-color: transparent;
    border: none;
  }
  
  .custom-dropdown {
  width: auto !important;
  white-space: nowrap;
}

</style>


<nav class="navbar navbar-expand-lg">
    <a href="indexADM.php" class="navbar-brand">
        <div class="row align-items-center">
            <div id="imgmenu">
                <img class="img-responsive" id="logo">
            </div>
        </div>
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-links"
        aria-controls="navbar-links" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"><img src="../public/menu.svg" id="menuicon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbar-links">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link" href="../views/projetoADM.php">Projeto</a></li>
            <li class="nav-item"><a class="nav-link" href="../views/equipes/listEquipes.php">Equipes</a></li>
            <li class="nav-item"><a class="nav-link" href="../views/plantas/listPlantas.php">Plantas</a></li>
            <li class="nav-item"><a class="nav-link" href="../views/zones/listZonas.php">Zonas</a></li>
            <li class="nav-item"><a class="nav-link" href="../views/especies/listEspecies.php">Espécies</a></li>

            <div class="btn-group d-flex align-items-center">
    <button type="button" class="btn btn-secondary dropdown-toggle custom-button" id="navdropdown" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
        Conta
    </button>
    <ul class="dropdown-menu dropdown-menu-start text-center custom-dropdown">
        <li class="nav-item"><a class="nav-item nav-link" id="botaoentrar" href="users/sair.php"><?php echo $nomeADM; ?></a></li>
        <li class="nav-item"><a class="nav-item nav-link" id="botaoentrar" href="#">perfil</a></li>
        <li class="nav-item"><a class="nav-item nav-link" id="botaoentrar" href="users/sair.php">Sair</a></li>
    </ul>
</div>



        </ul>
    </div>
</nav>


<body>
    <div class="container">
        <div class="row justify-content-md-left">
            <div id="about-area">
                <div class="row">
                    <div class="col" id="textoindex">
                        <h1><br><br>Aprenda <br> com trilhas <br> ecológicas! </h1>
                        <div class="row">
                            <div class="col">
                               
                                <!--SÓ HÁ UM MODO DE JOGO POR HORA
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true">
                                        JOGAR
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="modosolo">Modo solo</a>
                                        <a class="dropdown-item" href="emequipe">Em equipe</a>
                                    </div>
                                </div>
                                -->
                                
                            </div>
                        </div>
                    </div>
                    <div class="img-responsive">
                        <a href="..\controllers\EspecieControllerADM.php?action=EspeciesMapa"><img src="../public/mapa 1.svg" class="img-fluid" alt="logo-index"
                                id="mapa-da-home"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col quadrado">
                <img src="../public/projeto.svg" alt="" id="imagenscaixas">
                <p>Projeto de extensão <br> desenvolvido por estudantes do IFPR</p>
            </div>
            <div class="col quadrado">
                <img src="../public/metodologias.svg" alt="" id="imagenscaixas">
                <p>Educação ambiental <br> através de metodologias ativas</p>
            </div>
            <div class="col quadrado">
                <img src="../public/codigo.svg" alt="" id="imagenscaixas">
                <p>Plataforma web <br>com código aberto e muito amor</p>
            </div>
        </div>
        <div class="finalhome" id="ultimo-cont-index">
            <div class="row justify-content-md-left">
                <div class="col">
                    <img class="img-fluid" src="../public/Group 52.svg" alt="celular-greengo" id="imagem-celular">
                </div>
            </div>
        </div>
    </div>
    <br><br><br>
</body>
<div class="container-fluid" id="rodape">
            
            </div>
</html>
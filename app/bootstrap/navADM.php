<style>
.navbar {
             /* Cor de fundo desejada para a Navbar */
 
            font-size: 16px; /* Tamanho da fonte */
            font-family: Poppins-regular;
        }



.btn-custom {
  border-color: #C05367;
  color: #C05367; 
}

.btn-darkmode {
  display: inline-flex; /* Para alinhar o ícone verticalmente com o texto */
  align-items: center; /* Para alinhar o ícone verticalmente com o texto */
  justify-content: center; 
  background-color: #ebf0f1;
  border-style: none;
  width: 35px;
  height: 35px;
}

.btn-lightmode {
  display: inline-flex; /* Para alinhar o ícone verticalmente com o texto */
  align-items: center; /* Para alinhar o ícone verticalmente com o texto */
  justify-content: center; 
  background-color: #1B1B1B;
  border-style: none;
  width: 35px;
  height: 35px;
}

.btn-nav {
  display: inline-flex; /* Para alinhar o ícone verticalmente com o texto */
  align-items: center; /* Para alinhar o ícone verticalmente com o texto */
  justify-content: center; 
  border-style: none;
  width: 35px;
  height: 35px;
}

.btn-lightmode:hover {
    background-color: #1B1B1B; 
    border-color: #1B1B1B;
    color: #ebf0f1;
}

.btn-darkmode:hover {
    background-color: #ebf0f1; 
    border-color: #ebf0f1;
    color: #1B1B1B;
}

.btn-lightmode:focus, .btn-lightmode:active{
    box-shadow: none;
}

.btn-darkmode:focus, .btn-darkmode:active{
    box-shadow: none;
}

.fa-moon {
    font-size: 21px;
    color: #1B1B1B
}
.fa-sun {
    font-size: 21px;
    color: #ebf0f1;
}

.btn-custom:hover {
  background-color: #f0b6bc; 
  border-color: #f0b6bc;
  color: #fff; 
}

.btn-jogar{
  background-color:#078071;
  color: #fff;
  margin-right: 7px;
}
.btn-jogar:hover {
  background-color: #04574d;
  border-color: #04574d;
  color: #fff !important;
}

.dropdown-menu{
 border-color: #f0b6bc; 

}
.dropdown-item{
color: #C05367;

}
.dropdown-item:hover{
background-color: #f0b6bc; 
color:#fff;
}

#menu {
    width: auto;
    height: 20px;
}

.navbar-toggler {
    box-shadow: none;
    border: none;
    outline: none;
}

#usuario {
    color: #7EC4BB;
    margin-right: 5px;
    display: inline-flex;
    align-items: center;
    justify-content: center; 
    width: 35px;
    height: 35px;
    font-size: 21px;
  }

  #usuario:hover {
    color: #078071;
  }

  .door-icon {
    color: #f0b6bc;
    margin-right: 5px;
    font-size: 21px;
  }
  .door-icon:hover {
    color: #C05367;
  }


</style>

<body onload="carregar_modo()">
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a href="../home/index.php" class="navbar-brand">
            <img  id="logo" src="../../public/logo-green.svg" alt="Logo" width="30" height="30">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarLinks"
            aria-controls="navbarLinks" aria-expanded="false" aria-label="Toggle navigation">
            <img id="menu" src="../../public/menu.svg" alt="">
        </button>

        <div class="collapse navbar-collapse" id="navbarLinks">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" style="color: #338a5f;" href="../home/indexADM.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: #338a5f;" href="../home/projeto.php">Projeto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: #338a5f;" href="../zones/listZonas.php">Zonas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: #338a5f;" href="../especies/listEspecies.php">Espécies</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" style="color: #338a5f;" href="../plantas/listPlantas.php">Plantas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: #338a5f;" href="../equipes/listEquipes.php">Equipes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: #338a5f;" href="../partidas/listPartidas.php">Partidas</a>
                </li>
            </ul>
            
            <div class="ml-auto">
              
           <?php require_once("../../controllers/PartidaController.php");
           $partCont = new PartidaController;
           $partidaNav = $partCont->buscarPartidaPorADM($_SESSION['ID']); 
           if ($partidaNav) {
            $isPartida = "..\partidas\PartidaADM.php?id=".$partidaNav->getIdPartida();
            $txtPartida = "Administrar Partida";
           } else {
            $isPartida = "..\partidas\adicionarPartida.php";            
            $txtPartida = "Criar Partida";
           }
          ?>
                    <a href="<?php echo $isPartida ?>" class="btn btn-jogar"><?php echo $txtPartida; ?></a>
                    <a class="btn btn-nav" href="../users/perfil.php"><i id="usuario" class="fa-solid fa-user-gear"></i></a>
                    <button type="button" id="dark-mode" class="btn btn-darkmode"><i id="logoDarkMode" class="fa-solid fa-moon"></i></button> 
                    <a class="btn btn-nav" href="../users/sairExec.php"><i id="doorIcon" class="door-icon fa-solid fa-door-closed"></i></a>                   
                </div>
                
            </div>
        </div>
    </div>
</nav>

